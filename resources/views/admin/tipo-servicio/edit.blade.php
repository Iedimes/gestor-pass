@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tipo-servicio.actions.edit', ['name' => $tipoServicio->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <tipo-servicio-form
                :action="'{{ $tipoServicio->resource_url }}'"
                :data="{{ $tipoServicio->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.tipo-servicio.actions.edit', ['name' => $tipoServicio->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.tipo-servicio.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </tipo-servicio-form>

        </div>
    
</div>

@endsection