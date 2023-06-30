<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Roleuser\BulkDestroyRoleuser;
use App\Http\Requests\Admin\Roleuser\DestroyRoleuser;
use App\Http\Requests\Admin\Roleuser\IndexRoleuser;
use App\Http\Requests\Admin\Roleuser\StoreRoleuser;
use App\Http\Requests\Admin\Roleuser\UpdateRoleuser;
use App\Models\Roleuser;
use App\Models\Role;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Auth;
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

class RoleusersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRoleuser $request
     * @return array|Factory|View
     */
    public function index(IndexRoleuser $request)
    {
        if (Auth::user()->rol->role_id == 2){
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Roleuser::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'admin_users_id', 'role_id'],

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

        return view('admin.roleuser.index', ['data' => $data]);
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
        if (Auth::user()->rol->role_id == 2){
        $this->authorize('admin.roleuser.create');
        $rol = Role::all();
        $admin= AdminUser::all();

        return view('admin.roleuser.create', compact('rol', 'admin'));
    }else{
        $mensaje="No tienes permiso para acceder a este nivel!!!";
        return view('admin.verification.sinpermiso', ['mensaje' => $mensaje]);
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoleuser $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRoleuser $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['role_id']=  $request->getRolId();

        // Store the Roleuser
        $roleuser = Roleuser::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/roleusers'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/roleusers');
    }

    /**
     * Display the specified resource.
     *
     * @param Roleuser $roleuser
     * @throws AuthorizationException
     * @return void
     */
    public function show(Roleuser $roleuser)
    {
        $this->authorize('admin.roleuser.show', $roleuser);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Roleuser $roleuser
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Roleuser $roleuser)
    {
        if (Auth::user()->rol->role_id == 2){
        $this->authorize('admin.roleuser.edit', $roleuser);
        $role = Role::all();


        return view('admin.roleuser.edit', [
            'roleuser' => $roleuser,
            'role' => $role,
        ]);
    }else{
        $mensaje="No tienes permiso para acceder a este nivel!!!";
        return view('admin.verification.sinpermiso', ['mensaje' => $mensaje]);
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleuser $request
     * @param Roleuser $roleuser
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRoleuser $request, Roleuser $roleuser)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['role_id']=  $request->getRolId();

        // Update changed values Roleuser
        $roleuser->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/roleusers'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/roleusers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRoleuser $request
     * @param Roleuser $roleuser
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRoleuser $request, Roleuser $roleuser)
    {
        $roleuser->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRoleuser $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRoleuser $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Roleuser::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
