<div class="form-group row align-items-center" :class="{'has-danger': errors.has('usuario'), 'has-success': fields.usuario && fields.usuario.valid }">
    <label for="usuario" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.usuario.columns.usuario') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.usuario" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('usuario'), 'form-control-success': fields.usuario && fields.usuario.valid}" id="usuario" name="usuario" placeholder="{{ trans('admin.usuario.columns.usuario') }}">
        <div v-if="errors.has('usuario')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('usuario') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('contraseña'), 'has-success': fields.contraseña && fields.contraseña.valid }">
    <label for="contraseña" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.usuario.columns.contraseña') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.contraseña" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('contraseña'), 'form-control-success': fields.contraseña && fields.contraseña.valid}" id="contraseña" name="contraseña" placeholder="{{ trans('admin.usuario.columns.contraseña') }}">
        <div v-if="errors.has('contraseña')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('contraseña') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('enlace'), 'has-success': fields.enlace && fields.enlace.valid }">
    <label for="enlace" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.usuario.columns.enlace') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.enlace" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('enlace'), 'form-control-success': fields.enlace && fields.enlace.valid}" id="enlace" name="enlace" placeholder="{{ trans('admin.usuario.columns.enlace') }}">
        <div v-if="errors.has('enlace')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enlace') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('servidor_id'), 'has-success': fields.servidor_id && fields.servidor_id.valid }">
    <label for="servidor_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.usuario.columns.servidor_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.servidor_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('servidor_id'), 'form-control-success': fields.servidor_id && fields.servidor_id.valid}" id="servidor_id" name="servidor_id" placeholder="{{ trans('admin.usuario.columns.servidor_id') }}">
        <div v-if="errors.has('servidor_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('servidor_id') }}</div>
    </div>
</div>


