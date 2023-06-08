<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TipoDebd\BulkDestroyTipoDebd;
use App\Http\Requests\Admin\TipoDebd\DestroyTipoDebd;
use App\Http\Requests\Admin\TipoDebd\IndexTipoDebd;
use App\Http\Requests\Admin\TipoDebd\StoreTipoDebd;
use App\Http\Requests\Admin\TipoDebd\UpdateTipoDebd;
use App\Models\TipoDebd;
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

class TipoDebdController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTipoDebd $request
     * @return array|Factory|View
     */
    public function index(IndexTipoDebd $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TipoDebd::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'version'],

            // set columns to searchIn
            ['id', 'nombre', 'version']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tipo-debd.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tipo-debd.create');

        return view('admin.tipo-debd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTipoDebd $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTipoDebd $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TipoDebd
        $tipoDebd = TipoDebd::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tipo-debds'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tipo-debds');
    }

    /**
     * Display the specified resource.
     *
     * @param TipoDebd $tipoDebd
     * @throws AuthorizationException
     * @return void
     */
    public function show(TipoDebd $tipoDebd)
    {
        $this->authorize('admin.tipo-debd.show', $tipoDebd);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TipoDebd $tipoDebd
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TipoDebd $tipoDebd)
    {
        $this->authorize('admin.tipo-debd.edit', $tipoDebd);


        return view('admin.tipo-debd.edit', [
            'tipoDebd' => $tipoDebd,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTipoDebd $request
     * @param TipoDebd $tipoDebd
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTipoDebd $request, TipoDebd $tipoDebd)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TipoDebd
        $tipoDebd->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tipo-debds'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tipo-debds');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTipoDebd $request
     * @param TipoDebd $tipoDebd
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTipoDebd $request, TipoDebd $tipoDebd)
    {
        $tipoDebd->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTipoDebd $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTipoDebd $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TipoDebd::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
