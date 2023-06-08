<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Servidor\BulkDestroyServidor;
use App\Http\Requests\Admin\Servidor\DestroyServidor;
use App\Http\Requests\Admin\Servidor\IndexServidor;
use App\Http\Requests\Admin\Servidor\StoreServidor;
use App\Http\Requests\Admin\Servidor\UpdateServidor;
use App\Models\Servidor;
use App\Models\Tipodeconexion;
use App\Models\Grupo;
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


class ServidorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexServidor $request
     * @return array|Factory|View
     */
    public function index(IndexServidor $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Servidor::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'grupo_id', 'ip', 'puerto', 'tipodeconexion_id'],

            // set columns to searchIn
            ['id', 'ip', 'puerto']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.servidor.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.servidor.create');
        $tipodeconexion = Tipodeconexion::all();
        $grupo = Grupo::all();
        return view('admin.servidor.create',compact('tipodeconexion','grupo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreServidor $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreServidor $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['tipodeconexion_id']=  $request->getTipodeconexionId();
        $sanitized ['grupo_id']=  $request->getGrupoId();

        // Store the Servidor
        $servidor = Servidor::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/servidors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/servidors');
    }

    /**
     * Display the specified resource.
     *
     * @param Servidor $servidor
     * @throws AuthorizationException
     * @return void
     */
    public function show(Servidor $servidor)
    {
        $this->authorize('admin.servidor.show', $servidor);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Servidor $servidor
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Servidor $servidor)
    {
        $this->authorize('admin.servidor.edit', $servidor);
        $tipodeconexion = Tipodeconexion::all();
        $grupo = Grupo::all();


        return view('admin.servidor.edit', ['servidor'  => $servidor,
        'tipodeconexion'=> $tipodeconexion,
        'grupo'=> $grupo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateServidor $request
     * @param Servidor $servidor
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateServidor $request, Servidor $servidor)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['tipodeconexion_id']=  $request->getTipodeconexionId();
        $sanitized ['grupo_id']=  $request->getGrupoId();
        // Update changed values Servidor
        $servidor->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/servidors'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/servidors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyServidor $request
     * @param Servidor $servidor
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyServidor $request, Servidor $servidor)
    {
        $servidor->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyServidor $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyServidor $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Servidor::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
