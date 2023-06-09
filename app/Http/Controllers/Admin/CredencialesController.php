<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Credenciale\BulkDestroyCredenciale;
use App\Http\Requests\Admin\Credenciale\DestroyCredenciale;
use App\Http\Requests\Admin\Credenciale\IndexCredenciale;
use App\Http\Requests\Admin\Credenciale\StoreCredenciale;
use App\Http\Requests\Admin\Credenciale\UpdateCredenciale;
use App\Models\Credenciale;
use App\Models\Servidor;
use App\Models\Tipodeconexion;
use App\Models\Grupo;
use App\Models\Estado;
use App\Models\CatInformacione;
use App\Models\AdminUser;
use App\Models\Verification;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class CredencialesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCredenciale $request
     * @return array|Factory|View
     */
    // public function index(IndexCredenciale $request)
    // {


    //     // create and AdminListing instance for a specific model and
    //     $data = AdminListing::create(Credenciale::class)->processRequestAndGet(
    //         // pass the request with params
    //         $request,

    //         // set columns to query
    //         ['id', 'usuario', 'contraseña', 'enlace', 'servidor_id', 'tipodeconexion_id', 'estado_id', 'grupo_id'],

    //         // set columns to searchIn
    //         ['id', 'usuario', 'contraseña', 'enlace']
    //     );

    //     if ($request->ajax()) {
    //         if ($request->has('bulk')) {
    //             return [
    //                 'bulkItems' => $data->pluck('id')
    //             ];
    //         }
    //         return ['data' => $data];
    //     }

    //     return view('admin.credenciale.index', ['data' => $data]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */



    public function create()
    {
        $this->authorize('admin.credenciale.create');

        $estados = Estado::all();
        $tipodeconexion = Tipodeconexion::all();
        $servidor = Servidor::all();
        $grupo = Grupo::all();
        $cat_informaciones = CatInformacione::all();
        return view('admin.credenciale.create',compact('estados','tipodeconexion','servidor','cat_informaciones','grupo'));

    }

    // public function usuario()
    // {
    //     $x = "Probando";

    //     return view('brackets/admin-auth::admin.homepage.index', compact('x'));


    // }

    public function usuario(IndexCredenciale $request)
    {
    $userCount = AdminUser::count();
    $serviceCount = Grupo::count();
    $credencialeCount = Credenciale::count();

    $data = AdminListing::create(Credenciale::class)->processRequestAndGet(
        $request,
        ['id', 'usuario', 'contraseña', 'enlace', 'servidor_id', 'tipodeconexion_id', 'estado_id', 'grupo_id'],
        ['id', 'usuario', 'contraseña', 'enlace']
    );

    if ($request->ajax()) {
        if ($request->has('bulk')) {
            return [
                'bulkItems' => $data->pluck('id')
            ];
        }
        return ['data' => $data];
    }

    return view('brackets/admin-auth::admin.homepage.index', ['data' => $data,
    'userCount' => $userCount,'serviceCount' => $serviceCount,'credencialeCount'=> $credencialeCount ]);
}


    // public function usuario()
    // {
    //     //$this->authorize('admin.credenciale.create');
    //     $userCount= AdminUser::count();
    //     return view('brackets/admin-auth::admin.homepage.index', compact('userCount'));
    // }


public function verificarContrasena(Request $request)
{
    $login = $request->input('login');
    $contrasena = $request->input('contrasena');
    $credencial = $request->input('credencial');
    $credenciales = $request->input('credenciales');

    // verificar si el usuario loqueado es el mismo que se encuentra en la tabla verifications
    $controlar = Verification::where('admin_users_id', $login)->first();

    // verificar si se encontró un registro en la tabla verifications
    if ($controlar) {
        // Obtener la contraseña encriptada desde la base de datos
        $encriptada = $controlar->password;

        // verificar si la contraseña es correcta utilizando la tabla de verificaciones
        if (Hash::check($contrasena, $encriptada)) {
            // si la contraseña es correcta, obtener la contraseña de la tabla correspondiente
            $credencial;
            $credenciale=Credenciale::where('id', $credencial)->first();
            $var=decrypt($credenciale->contraseña);
            $contrasenaUsuario = $var;



            // después de verificar y obtener la contraseña

            $request->session()->flash('contrasena_dev', $contrasenaUsuario);

            // redirigir de vuelta a la vista
            //return redirect()->back();
            return redirect()->back()->with('success', 'Contraseña verificada correctamente.');


        } else {
            // si la contraseña es incorrecta, devolver un mensaje de error
            return redirect()->back()->withErrors(['contrasena' => 'La contraseña es incorrecta.']);
        }
    } else {
        // si no se encontró un registro en la tabla verifications, devolver un mensaje de error
        return redirect()->back()->withErrors(['contrasena' => 'No se encontró un registro de verificación para este usuario.']);
    }
}




    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCredenciale $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCredenciale $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['estado_id']=  $request->getEstadoId();
        $sanitized ['tipodeconexion_id']=  $request->getTipodeconexionId();
        $sanitized ['servidor_id']=  $request->getServidorId();
        $sanitized ['grupo_id']=  $request->getGrupoId();
        // Store the Credenciale
        //$credenciale = Credenciale::create($sanitized);

        $credenciale = Credenciale::create([
            'usuario' => $sanitized['usuario'],
            'enlace' => $sanitized['enlace'],
            'fecha' => $sanitized['fecha'],
            'servidor_id' => $sanitized['servidor_id'],
            'tipodeconexion_id' => $sanitized['tipodeconexion_id'],
            'estado_id' => $sanitized['estado_id'],
            'grupo_id' => $sanitized['grupo_id'],

            'contraseña' => encrypt($sanitized['contraseña']),

        ]);

        if ($request->ajax()) {
            return ['redirect' => url('admin/credenciales'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/credenciales');
    }

    /**
     * Display the specified resource.
     *
     * @param Credenciale $credenciale
     * @throws AuthorizationException
     * @return void
     */
    public function show(Credenciale $credenciale, IndexCredenciale $request)
    {

        $login = auth()->id();
        $id=$credenciale->id;
        // create and AdminListing instance for a specific model and
         $data = AdminListing::create(Credenciale::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
           // ['id', 'usuario', 'contraseña', 'enlace', 'servidor_id', 'tipodeconexion_id', 'estados_id', 'grupo_id'],
            ['id', 'usuario', 'contraseña', 'enlace', 'servidor_id', 'tipodeconexion_id', 'estado_id', 'cat_informaciones_id', 'grupo_id'],

            // set columns to searchIn
            ['id', 'usuario', 'contraseña', 'enlace']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.credenciale.show', ['data' => $data, 'credenciale' => $credenciale, 'login' => $login]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Credenciale $credenciale
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Credenciale $credenciale)
    {
        $this->authorize('admin.credenciale.edit', $credenciale);
        $estados = Estado::all();
        $tipodeconexion = Tipodeconexion::all();
        $servidor = Servidor::all();
        $grupo = Grupo::all();
        $cat_informaciones = CatInformacione::all();



        return view('admin.credenciale.edit', [
            'credenciale' => $credenciale,
            'estados'=> $estados,
            'tipodeconexion'=> $tipodeconexion,
            'servidor'=> $servidor,
            'grupo'=> $grupo,
            'cat_informaciones'=>$cat_informaciones,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCredenciale $request
     * @param Credenciale $credenciale
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCredenciale $request, Credenciale $credenciale)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['estado_id']=  $request->getEstadoId();
        $sanitized ['tipodeconexion_id']=  $request->getTipodeconexionId();

        //$sanitized ['servidor_id']=  $request->getServidorId();
        $sanitized ['grupo_id']=  $request->getGrupoId();
        //$sanitized ['cat_informaciones_id']=  $request->getCatInformacioneId();


        // Update changed values Credenciale
        $credenciale->update($sanitized);


        if ($request->ajax()) {
            return [
                'redirect' => url('admin/credenciales'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/credenciales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCredenciale $request
     * @param Credenciale $credenciale
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCredenciale $request, Credenciale $credenciale)
    {
        $credenciale->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCredenciale $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCredenciale $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Credenciale::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
