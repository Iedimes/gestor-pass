<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Verification\BulkDestroyVerification;
use App\Http\Requests\Admin\Verification\DestroyVerification;
use App\Http\Requests\Admin\Verification\IndexVerification;
use App\Http\Requests\Admin\Verification\StoreVerification;
use App\Http\Requests\Admin\Verification\UpdateVerification;
use App\Models\Verification;
use App\Models\AdminUser;
use App\Models\Roleuser;
use Brackets\AdminListing\Facades\AdminListing;
//use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Contracts\Mail\Mailable;

class VerificationsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexVerification $request
     * @return array|Factory|View
     */
    public function index(IndexVerification $request)
    {

        if (Auth::user()->rol->role_id == 2){

        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Verification::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'admin_users_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.verification.index', ['data' => $data]);

        }else{
            $mensaje="No tienes permiso para acceder a este nivel!!!";
            return view('admin.verification.sinpermiso', ['mensaje' => $mensaje]);
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.verification.create');
        if (Auth::user()->rol->role_id == 2){
        $user=AdminUser::all();

        return view('admin.verification.create', compact('user'));
        }else{
            $mensaje="No tienes permiso para acceder a este nivel!!!";
            return view('admin.verification.sinpermiso', ['mensaje' => $mensaje]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreVerification $request
     * @return array|RedirectResponse|Redirector
     */

    public function store(StoreVerification $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['admin_users_id']=  $request->getUsuarioId();

        // Store the Verification
        //$verification = Verification::create($sanitized);

        $verification = Verification::create([
            'admin_users_id' => $sanitized['admin_users_id'],
            'password' => bcrypt($sanitized['password']),

        ]);

        if ($request->ajax()) {
            return ['redirect' => url('admin/verifications'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/verifications');


    }

    /**
     * Display the specified resource.
     *
     * @param Verification $verification
     * @throws AuthorizationException
     * @return void
     */
    public function show(Verification $verification)
    {
        $this->authorize('admin.verification.show', $verification);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Verification $verification
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Verification $verification)
    {
        if (Auth::user()->rol->role_id == 2){
        $this->authorize('admin.verification.edit', $verification);

        $user=AdminUser::all();

        return view('admin.verification.edit', [
            'verification' => $verification,
            'user' => $user,
        ]);
    }else{
        $mensaje="No tienes permiso para acceder a este nivel!!!";
        return view('admin.verification.sinpermiso', ['mensaje' => $mensaje]);
    }
    }


public function resetear($id)
{
    // Recupera el registro de verificación correspondiente al ID recibido
    $registro = Verification::findOrFail($id);
    $cod = $registro->admin_users_id;

    // Recupera el usuario correspondiente al correo electrónico del registro de verificación
    $correo = AdminUser::where('id', $cod)->first();
    $email = $correo->email;

    // Genera una nueva contraseña
    $longitud = 8;
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+=-';
    $nuevaContraseña = str_random($longitud, $caracteres);

    // Hashea la nueva contraseña y actualiza el campo de contraseña del usuario
    $registro->password = bcrypt($nuevaContraseña);
    $registro->save();

    // Envía la nueva contraseña por correo electrónico utilizando PHPMailer
    $subject = 'Nueva contraseña';
    $message = 'La nueva contraseña es: ' . $nuevaContraseña;

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = env('MAIL_HOST');
        $mail->SMTPAuth = true;
        $mail->Username = env('MAIL_USERNAME');
        $mail->Password = env('MAIL_PASSWORD');
        $mail->SMTPSecure = env('MAIL_ENCRYPTION');
        $mail->Port = env('MAIL_PORT');
        $mail->setFrom('recuperacion@muvh.gov.py', 'DGTIC - MUVH');
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Desactiva la verificación del certificado SSL del servidor SMTP
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->send();
        // Agrega un mensaje de éxito a la variable de sesión
        return redirect()->back()->with('reset_success', 'La nueva contraseña ha sido enviada por correo electrónico a ' . $email . '.');
    } catch (Exception $e) {
        // Agrega un mensaje de error a la variable de sesión
        return redirect()->back()->with('reset_error', 'Error al enviar el correo electrónico: ' . $e->getMessage());
    }
}


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateVerification $request
     * @param Verification $verification
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateVerification $request, Verification $verification)
{
    // Sanitize input
    $sanitized = $request->getSanitized();

    // Encriptar la contraseña si se ha proporcionado
    if (isset($sanitized['password'])) {
        $sanitized['password'] = bcrypt($sanitized['password']);
    }

    // Update changed values Verification
    $verification->update($sanitized);

    if ($request->ajax()) {
        return [
            'redirect' => url('admin/verifications'),
            'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
        ];
    }

    return redirect('admin/verifications');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyVerification $request
     * @param Verification $verification
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyVerification $request, Verification $verification)
    {
        $verification->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyVerification $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyVerification $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Verification::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
