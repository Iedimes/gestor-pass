@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.cat-servicio.actions.edit', ['name' => $catServicio->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <cat-servicio-form
                :action="'{{ $catServicio->resource_url }}'"
                :data="{{ $catServicio->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.cat-servicio.actions.edit', ['name' => $catServicio->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.cat-servicio.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </cat-servicio-form>

        </div>
    
</div>

@endsection