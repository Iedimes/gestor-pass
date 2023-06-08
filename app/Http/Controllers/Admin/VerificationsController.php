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
        $user=AdminUser::all();

        return view('admin.verification.create', compact('user'));
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
        $this->authorize('admin.verification.edit', $verification);

        $user=AdminUser::all();

        return view('admin.verification.edit', [
            'verification' => $verification,
            'user' => $user,
        ]);
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
