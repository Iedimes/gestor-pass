<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TipoServicio\BulkDestroyTipoServicio;
use App\Http\Requests\Admin\TipoServicio\DestroyTipoServicio;
use App\Http\Requests\Admin\TipoServicio\IndexTipoServicio;
use App\Http\Requests\Admin\TipoServicio\StoreTipoServicio;
use App\Http\Requests\Admin\TipoServicio\UpdateTipoServicio;
use App\Models\TipoServicio;
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

class TipoServiciosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTipoServicio $request
     * @return array|Factory|View
     */
    public function index(IndexTipoServicio $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TipoServicio::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre'],

            // set columns to searchIn
            ['id', 'nombre']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tipo-servicio.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tipo-servicio.create');

        return view('admin.tipo-servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTipoServicio $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTipoServicio $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TipoServicio
        $tipoServicio = TipoServicio::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tipo-servicios'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tipo-servicios');
    }

    /**
     * Display the specified resource.
     *
     * @param TipoServicio $tipoServicio
     * @throws AuthorizationException
     * @return void
     */
    public function show(TipoServicio $tipoServicio)
    {
        $this->authorize('admin.tipo-servicio.show', $tipoServicio);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TipoServicio $tipoServicio
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TipoServicio $tipoServicio)
    {
        $this->authorize('admin.tipo-servicio.edit', $tipoServicio);


        return view('admin.tipo-servicio.edit', [
            'tipoServicio' => $tipoServicio,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTipoServicio $request
     * @param TipoServicio $tipoServicio
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTipoServicio $request, TipoServicio $tipoServicio)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TipoServicio
        $tipoServicio->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tipo-servicios'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tipo-servicios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTipoServicio $request
     * @param TipoServicio $tipoServicio
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTipoServicio $request, TipoServicio $tipoServicio)
    {
        $tipoServicio->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTipoServicio $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTipoServicio $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TipoServicio::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
