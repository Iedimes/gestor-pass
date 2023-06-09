@extends('brackets/admin-ui::admin.layout.default')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

@section('body')



<div class="card">
  <div class="card-header">
  <h3 class="card-title mb-0 text-primary font-weight-bold text-uppercase">Bienvenido/a,  @if(!is_null(config('admin-auth.defaults.guard')))
      <span class="hidden-md-down">{{ Auth::guard(config('admin-auth.defaults.guard'))->check() ? Auth::guard(config('admin-auth.defaults.guard'))->user()->full_name : 'Anonymous' }}</span>
    @else
      <span class="hidden-md-down">{{ Auth::check() ? Auth::user()->full_name : 'Anonymous' }}</span>
    @endif
    </h3>  </div>
  <div class="card-body">
 <div class="row">
  <div class="col-md-4">
    <div class="card bg-green text-white rounded-3 shadow-sm">
      <div class="card-body text-center">
        <div class="icon-container">
          <i class="bi bi-person-fill"></i>
        </div>
        <h5 class="card-title fw-bold mb-3" style="font-size: 40px">{{ $userCount}}</h5>
        <p class="card-text fs-5">TOTAL DE USUARIOS</p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card bg-gray text-white rounded-3 shadow-sm">
      <div class="card-body text-center">
        <div class="icon-container">
          <i class="bi bi-gear-fill"></i>
        </div>
        <h5 class="card-title fw-bold mb-3" style="font-size: 40px">{{ $serviceCount}}</h5>
        <p class="card-text fs-5">TOTAL DE SERVICIOS</p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card bg-dark text-white rounded-3 shadow-sm">
      <div class="card-body text-center">
        <div class="icon-container">
          <i class="bi bi-credit-card-2-front-fill"></i>
        </div>
        <h5 class="card-title fw-bold mb-3" style="font-size: 40px">{{ $credencialeCount}}</h5>
        <p class="card-text fs-5">TOTAL DE CREDENCIALES</p>
      </div>
    </div>
  </div>
</div>

<style>
  .icon-container-right {
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    opacity: 0.5;
  }

  .icon-container-right i {
    font-size: 60px;
  }

  .card {
    height: 300px;
  }
</style>
  </div>
</div>

<credenciale-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/credenciales') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.credenciale.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/credenciales/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.credenciale.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">

                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>
                                        <th class="bulk-checkbox">
                                            <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                            <label class="form-check-label" for="enabled">
                                                #
                                            </label>
                                        </th>

                                        <th is='sortable' :column="'enlace'">{{ trans('admin.credenciale.columns.enlace') }}</th>
                                        <th is='sortable' :column="'servidor_id'">{{ trans('admin.credenciale.columns.servidor_id') }}</th>
                                        <th is='sortable' :column="'tipodeconexion_id'">{{ trans('admin.credenciale.columns.tipodeconexion_id') }}</th>
                                        <th is='sortable' :column="'estados_id'">{{ trans('admin.credenciale.columns.estados_id') }}</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="11">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/credenciales')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/credenciales/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                        <td class="bulk-checkbox">
                                            <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id"  :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                            <label class="form-check-label" :for="'enabled' + item.id">
                                            </label>
                                        </td>

                                        <td>@{{ item.grupo.nombre }}</td>


                                        <td>@{{ item.enlace }}</td>
                                        <td>@{{ item.servidor.ip }}</td>
                                        <td v-if="item.estado.id == 1" ><span class="badge bg-warning">@{{ item.estado.nombre }}</span></td>
                                        <td v-if="item.estado.id == 2" ><span class="badge bg-primary">@{{ item.estado.nombre }}</span></td>
                                        <td v-if="item.estado.id == 3" ><span class="badge bg-success">@{{ item.estado.nombre }}</span></td>


                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/show'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-search"></i></a>
                                                </div>


                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/credenciales/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.credenciale.actions.create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </credenciale-listing>

@endsection
