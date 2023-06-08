<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Servidore\BulkDestroyServidore;
use App\Http\Requests\Admin\Servidore\DestroyServidore;
use App\Http\Requests\Admin\Servidore\IndexServidore;
use App\Http\Requests\Admin\Servidore\StoreServidore;
use App\Http\Requests\Admin\Servidore\UpdateServidore;
use App\Models\Servidore;
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

class ServidoresController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexServidore $request
     * @return array|Factory|View
     */
    public function index(IndexServidore $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Servidore::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'ip', 'puerto', 'tipodeconexion_id'],

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

        return view('admin.servidore.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.servidore.create');

        return view('admin.servidore.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreServidore $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreServidore $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Servidore
        $servidore = Servidore::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/servidores'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/servidores');
    }

    /**
     * Display the specified resource.
     *
     * @param Servidore $servidore
     * @throws AuthorizationException
     * @return void
     */
    public function show(Servidore $servidore)
    {
        $this->authorize('admin.servidore.show', $servidore);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Servidore $servidore
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Servidore $servidore)
    {
        $this->authorize('admin.servidore.edit', $servidore);


        return view('admin.servidore.edit', [
            'servidore' => $servidore,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateServidore $request
     * @param Servidore $servidore
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateServidore $request, Servidore $servidore)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Servidore
        $servidore->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/servidores'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/servidores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyServidore $request
     * @param Servidore $servidore
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyServidore $request, Servidore $servidore)
    {
        $servidore->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyServidore $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyServidore $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Servidore::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
