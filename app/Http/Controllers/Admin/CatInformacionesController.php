<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CatInformacione\BulkDestroyCatInformacione;
use App\Http\Requests\Admin\CatInformacione\DestroyCatInformacione;
use App\Http\Requests\Admin\CatInformacione\IndexCatInformacione;
use App\Http\Requests\Admin\CatInformacione\StoreCatInformacione;
use App\Http\Requests\Admin\CatInformacione\UpdateCatInformacione;
use App\Models\CatInformacione;
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

class CatInformacionesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCatInformacione $request
     * @return array|Factory|View
     */
    public function index(IndexCatInformacione $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CatInformacione::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'credenciales_id', 'tipo_debd_id', 'nombredebd', 'versiones', 'ssl', 'fecha_vec_dominio', 'fecha_vec_ssl','tipo_servicios_id'],

            // set columns to searchIn
            ['id', 'nombredebd', 'versiones', 'ssl']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.cat-informacione.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.cat-informacione.create');

        return view('admin.cat-informacione.create');
    }

    public function createdetail($id)
    {
        $this->authorize('admin.cat-informacione.create');

        return view('admin.cat-informacione.create', compact('id'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCatInformacione $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCatInformacione $request)
    {
        // Sanitize input
       $sanitized = $request->getSanitized();

        // Store the CatInformacione
        $catInformacione = CatInformacione::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/credenciales/'.$request->credenciales_id.'/show'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/cat-informaciones');
    }

    /**
     * Display the specified resource.
     *
     * @param CatInformacione $catInformacione
     * @throws AuthorizationException
     * @return void
     */
    public function show(CatInformacione $catInformacione)
    {
        $this->authorize('admin.cat-informacione.show', $catInformacione);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CatInformacione $catInformacione
     * @throws AuthorizationException
     * @return Factory|View
     */
    // public function edit(CatInformacione $catInformacione)
    // {
    //     $this->authorize('admin.cat-informacione.edit', $catInformacione);


    //     return view('admin.cat-informacione.edit', [
    //         'catInformacione' => $catInformacione,
    //     ]);
    // }

    public function modificar($id)
{
    $catInformacione = CatInformacione::where('credenciales_id', $id)->first();

    if (is_null($catInformacione)) {
        abort(404);
    }

    $this->authorize('admin.cat-informacione.edit', $catInformacione);

    return view('admin.cat-informacione.edit', [
        'catInformacione' => $catInformacione,
    ]);
}
    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCatInformacione $request
     * @param CatInformacione $catInformacione
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCatInformacione $request, CatInformacione $catInformacione)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CatInformacione
        $catInformacione->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/credenciales/'.$request->credenciales_id.'/show'),
            'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/cat-informaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCatInformacione $request
     * @param CatInformacione $catInformacione
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCatInformacione $request, CatInformacione $catInformacione)
    {
        $catInformacione->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCatInformacione $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCatInformacione $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CatInformacione::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
