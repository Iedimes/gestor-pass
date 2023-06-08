@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.verification.actions.edit', ['name' => $verification->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <verification-form
                :action="'{{ $verification->resource_url }}'"
                :data="{{ $verification->toJson() }}"
                :user="{{$user->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{$verification->user->full_name}}



                    </div>

                    <div class="card-body">
                        @include('admin.verification.components.form-elementsE')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

        </verification-form>

        </div>

</div>

@endsection
