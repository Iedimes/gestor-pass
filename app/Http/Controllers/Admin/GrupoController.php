<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Grupo\BulkDestroyGrupo;
use App\Http\Requests\Admin\Grupo\DestroyGrupo;
use App\Http\Requests\Admin\Grupo\IndexGrupo;
use App\Http\Requests\Admin\Grupo\StoreGrupo;
use App\Http\Requests\Admin\Grupo\UpdateGrupo;
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

class GrupoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexGrupo $request
     * @return array|Factory|View
     */
    public function index(IndexGrupo $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Grupo::class)->processRequestAndGet(
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

        return view('admin.grupo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.grupo.create');

        return view('admin.grupo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGrupo $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreGrupo $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Grupo
        $grupo = Grupo::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/grupos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/grupos');
    }

    /**
     * Display the specified resource.
     *
     * @param Grupo $grupo
     * @throws AuthorizationException
     * @return void
     */
    public function show(Grupo $grupo)
    {
        $this->authorize('admin.grupo.show', $grupo);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Grupo $grupo
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Grupo $grupo)
    {
        $this->authorize('admin.grupo.edit', $grupo);


        return view('admin.grupo.edit', [
            'grupo' => $grupo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGrupo $request
     * @param Grupo $grupo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateGrupo $request, Grupo $grupo)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Grupo
        $grupo->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/grupos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/grupos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyGrupo $request
     * @param Grupo $grupo
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyGrupo $request, Grupo $grupo)
    {
        $grupo->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyGrupo $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyGrupo $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Grupo::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
