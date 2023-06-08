<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tipodeconexion\BulkDestroyTipodeconexion;
use App\Http\Requests\Admin\Tipodeconexion\DestroyTipodeconexion;
use App\Http\Requests\Admin\Tipodeconexion\IndexTipodeconexion;
use App\Http\Requests\Admin\Tipodeconexion\StoreTipodeconexion;
use App\Http\Requests\Admin\Tipodeconexion\UpdateTipodeconexion;
use App\Models\Tipodeconexion;
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

class TipodeconexionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTipodeconexion $request
     * @return array|Factory|View
     */
    public function index(IndexTipodeconexion $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Tipodeconexion::class)->processRequestAndGet(
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

        return view('admin.tipodeconexion.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tipodeconexion.create');

        return view('admin.tipodeconexion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTipodeconexion $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTipodeconexion $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Tipodeconexion
        $tipodeconexion = Tipodeconexion::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tipodeconexions'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tipodeconexions');
    }

    /**
     * Display the specified resource.
     *
     * @param Tipodeconexion $tipodeconexion
     * @throws AuthorizationException
     * @return void
     */
    public function show(Tipodeconexion $tipodeconexion)
    {
        $this->authorize('admin.tipodeconexion.show', $tipodeconexion);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tipodeconexion $tipodeconexion
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Tipodeconexion $tipodeconexion)
    {
        $this->authorize('admin.tipodeconexion.edit', $tipodeconexion);


        return view('admin.tipodeconexion.edit', [
            'tipodeconexion' => $tipodeconexion,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTipodeconexion $request
     * @param Tipodeconexion $tipodeconexion
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTipodeconexion $request, Tipodeconexion $tipodeconexion)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Tipodeconexion
        $tipodeconexion->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tipodeconexions'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tipodeconexions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTipodeconexion $request
     * @param Tipodeconexion $tipodeconexion
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTipodeconexion $request, Tipodeconexion $tipodeconexion)
    {
        $tipodeconexion->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTipodeconexion $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTipodeconexion $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Tipodeconexion::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
