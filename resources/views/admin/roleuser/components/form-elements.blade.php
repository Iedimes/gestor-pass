<div class="form-group row align-items-center" :class="{'has-danger': errors.has('admin_users_id'), 'has-success': fields.admin_users_id && fields.admin_users_id.valid }">
    <label for="admin_users_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.roleuser.columns.admin_users_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        {{-- <input type="text" v-model="form.admin_users_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('admin_users_id'), 'form-control-success': fields.admin_users_id && fields.admin_users_id.valid}" id="admin_users_id" name="admin_users_id" placeholder="{{ trans('admin.roleuser.columns.admin_users_id') }}"> --}}
        <multiselect
    v-model="form.admin_users_id"
    :options="persona"
    :multiple="false"
    track-by="id"
    label="full_name"
    :taggable="true"
    tag-placeholder=""
    placeholder=""
    name="admin_users_id"
    @input="updatePersona">
</multiselect>
        <div v-if="errors.has('admin_users_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('admin_users_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('role_id'), 'has-success': fields.role_id && fields.role_id.valid }">
    <label for="role_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.roleuser.columns.role_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        {{-- <input type="text" v-model="form.role_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('role_id'), 'form-control-success': fields.role_id && fields.role_id.valid}" id="role_id" name="role_id" placeholder="{{ trans('admin.roleuser.columns.role_id') }}"> --}}
        <multiselect
        v-model="form.role"
        :options="rol"
        :multiple="false"
        track-by="id"
        label="name"
        :taggable="true"
        tag-placeholder=""
        placeholder=""
        name="role_id"
        @input="updateRole">
    </multiselect>
        <div v-if="errors.has('role_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('role_id') }}</div>
    </div>
</div>
