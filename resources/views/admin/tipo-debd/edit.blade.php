@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tipo-debd.actions.edit', ['name' => $tipoDebd->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <tipo-debd-form
                :action="'{{ $tipoDebd->resource_url }}'"
                :data="{{ $tipoDebd->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.tipo-debd.actions.edit', ['name' => $tipoDebd->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.tipo-debd.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </tipo-debd-form>

        </div>
    
</div>

@endsection