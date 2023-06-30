@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.cat-informacione.actions.edit', ['name' => $catInformacione->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <cat-informacione-form
                :action="'{{ $catInformacione->resource_url }}'"
                :data="{{ $catInformacione->toJson() }}"
                :tipo_servicios="{{ $tipo_servicios->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.cat-informacione.actions.edit', ['name' => $catInformacione->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.cat-informacione.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

        </cat-informacione-form>

        </div>

</div>

@endsection
