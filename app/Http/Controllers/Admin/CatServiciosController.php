<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CatServicio\BulkDestroyCatServicio;
use App\Http\Requests\Admin\CatServicio\DestroyCatServicio;
use App\Http\Requests\Admin\CatServicio\IndexCatServicio;
use App\Http\Requests\Admin\CatServicio\StoreCatServicio;
use App\Http\Requests\Admin\CatServicio\UpdateCatServicio;
use App\Models\CatServicio;
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

class CatServiciosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCatServicio $request
     * @return array|Factory|View
     */
    public function index(IndexCatServicio $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CatServicio::class)->processRequestAndGet(
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

        return view('admin.cat-servicio.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.cat-servicio.create');

        return view('admin.cat-servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCatServicio $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCatServicio $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CatServicio
        $catServicio = CatServicio::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/cat-servicios'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/cat-servicios');
    }

    /**
     * Display the specified resource.
     *
     * @param CatServicio $catServicio
     * @throws AuthorizationException
     * @return void
     */
    public function show(CatServicio $catServicio)
    {
        $this->authorize('admin.cat-servicio.show', $catServicio);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CatServicio $catServicio
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CatServicio $catServicio)
    {
        $this->authorize('admin.cat-servicio.edit', $catServicio);


        return view('admin.cat-servicio.edit', [
            'catServicio' => $catServicio,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCatServicio $request
     * @param CatServicio $catServicio
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCatServicio $request, CatServicio $catServicio)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CatServicio
        $catServicio->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/cat-servicios'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/cat-servicios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCatServicio $request
     * @param CatServicio $catServicio
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCatServicio $request, CatServicio $catServicio)
    {
        $catServicio->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCatServicio $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCatServicio $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CatServicio::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
