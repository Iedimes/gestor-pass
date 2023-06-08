<div class="form-group row align-items-center" :class="{'has-danger': errors.has('usuario'), 'has-success': fields.usuario && fields.usuario.valid }">
    <label for="usuario" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credenciale.columns.usuario') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.usuario" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('usuario'), 'form-control-success': fields.usuario && fields.usuario.valid}" id="usuario" name="usuario" placeholder="{{ trans('admin.credenciale.columns.usuario') }}">
        <div v-if="errors.has('usuario')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('usuario') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('contraseña'), 'has-success': fields.contraseña && fields.contraseña.valid }">
    <label for="contraseña" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credenciale.columns.contraseña') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.contraseña" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('contraseña'), 'form-control-success': fields.contraseña && fields.contraseña.valid}" id="contraseña" name="contraseña" placeholder="{{ trans('admin.credenciale.columns.contraseña') }}">
        <div v-if="errors.has('contraseña')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('contraseña') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('enlace'), 'has-success': fields.enlace && fields.enlace.valid }">
    <label for="enlace" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credenciale.columns.enlace') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.enlace" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('enlace'), 'form-control-success': fields.enlace && fields.enlace.valid}" id="enlace" name="enlace" placeholder="{{ trans('admin.credenciale.columns.enlace') }}">
        <div v-if="errors.has('enlace')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enlace') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fecha'), 'has-success': fields.fecha && fields.fecha.valid }">
    <label for="fecha" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credenciale.columns.fecha') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.fecha" :config="datePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('fecha'), 'form-control-success': fields.fecha && fields.fecha.valid}" id="fecha" name="fecha" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('fecha')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fecha') }}</div>
    </div>
</div>

 <div class="form-group row align-items-center" :class="{'has-danger': errors.has('servidor_id'), 'has-success': fields.servidor_id && fields.servidor_id.valid }">
    <label for="servidor_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credenciale.columns.servidor_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
<multiselect
            v-model="form.servidor"
            :options="servidor"
            :multiple="false"
            track-by="id"
            label="ip"
            :taggable="true"
            tag-placeholder=""
            placeholder="">
        </multiselect>          <div v-if="errors.has('servidor_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('servidor_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tipodeconexion_id'), 'has-success': fields.tipodeconexion_id && fields.tipodeconexion_id.valid }">
    <label for="tipodeconexion_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credenciale.columns.tipodeconexion_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
<multiselect
            v-model="form.tipodeconexion"
            :options="tipodeconexion"
            :multiple="false"
            track-by="id"
            label="nombre"
            :taggable="true"
            tag-placeholder=""
            placeholder="">
        </multiselect>             <div v-if="errors.has('tipodeconexion_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tipodeconexion_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('estado_id'), 'has-success': fields.estado_id && fields.estado_id.valid }">
    <label for="estado_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credenciale.columns.estado_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
<multiselect
            v-model="form.estado"
            :options="estados"
            :multiple="false"
            track-by="id"
            label="nombre"
            :taggable="true"
            tag-placeholder=""
            placeholder="">
        </multiselect>         <div v-if="errors.has('estado_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('estado_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('grupo_id'), 'has-success': fields.grupo_id && fields.grupo_id.valid }">
    <label for="grupo_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.credenciale.columns.grupo_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
<multiselect
            v-model="form.grupo"
            :options="grupo"
            :multiple="false"
            track-by="id"
            label="nombre"
            :taggable="true"
            tag-placeholder=""
            placeholder="">
        </multiselect>         <div v-if="errors.has('grupo_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('grupo_id') }}</div>
    </div>
</div>


