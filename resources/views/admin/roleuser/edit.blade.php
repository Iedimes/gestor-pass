@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.roleuser.actions.edit', ['name' => $roleuser->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <roleuser-form
                :action="'{{ $roleuser->resource_url }}'"
                :data="{{ $roleuser->toJson() }}"
                :role="{{ $role->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ $roleuser->nombre->full_name }}
                    </div>

                    <div class="card-body">
                        @include('admin.roleuser.components.form-elementsE')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

        </roleuser-form>

        </div>

</div>

@endsection
