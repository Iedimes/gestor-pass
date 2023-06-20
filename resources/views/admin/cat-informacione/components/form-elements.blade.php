<div class="form-group row align-items-center" :class="{'has-danger': errors.has('credenciales_id'), 'has-success': fields.credenciales_id && fields.credenciales_id.valid }">
    <label for="credenciales_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cat-informacione.columns.credenciales_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.credenciales_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('credenciales_id'), 'form-control-success': fields.credenciales_id && fields.credenciales_id.valid}" id="credenciales_id" name="credenciales_id" placeholder="{{ trans('admin.cat-informacione.columns.credenciales_id') }}">
        <div v-if="errors.has('credenciales_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('credenciales_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tipo_debd_id'), 'has-success': fields.tipo_debd_id && fields.tipo_debd_id.valid }">
    <label for="tipo_debd_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cat-informacione.columns.tipo_debd_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tipo_debd_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tipo_debd_id'), 'form-control-success': fields.tipo_debd_id && fields.tipo_debd_id.valid}" id="tipo_debd_id" name="tipo_debd_id" placeholder="{{ trans('admin.cat-informacione.columns.tipo_debd_id') }}">
        <div v-if="errors.has('tipo_debd_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tipo_debd_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombredebd'), 'has-success': fields.nombredebd && fields.nombredebd.valid }">
    <label for="nombredebd" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cat-informacione.columns.nombredebd') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombredebd" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombredebd'), 'form-control-success': fields.nombredebd && fields.nombredebd.valid}" id="nombredebd" name="nombredebd" placeholder="{{ trans('admin.cat-informacione.columns.nombredebd') }}">
        <div v-if="errors.has('nombredebd')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombredebd') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('versiones'), 'has-success': fields.versiones && fields.versiones.valid }">
    <label for="versiones" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cat-informacione.columns.versiones') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.versiones" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('versiones'), 'form-control-success': fields.versiones && fields.versiones.valid}" id="versiones" name="versiones" placeholder="{{ trans('admin.cat-informacione.columns.versiones') }}">
        <div v-if="errors.has('versiones')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('versiones') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ssl'), 'has-success': fields.ssl && fields.ssl.valid }">
    <label for="ssl" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cat-informacione.columns.ssl') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        {{-- <input type="text" v-model="form.ssl" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ssl'), 'form-control-success': fields.ssl && fields.ssl.valid}" id="ssl" name="ssl" placeholder="{{ trans('admin.cat-informacione.columns.ssl') }}"> --}}
        <select name="ssl" id="ssl" v-model="form.ssl" class="form-control">
            <option value="SI">SI</option>
            <option value="NO">NO</option>
        </select>
        <div v-if="errors.has('ssl')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ssl') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fecha_vec_dominio'), 'has-success': fields.fecha_vec_dominio && fields.fecha_vec_dominio.valid }">
    <label for="fecha_vec_dominio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cat-informacione.columns.fecha_vec_dominio') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.fecha_vec_dominio" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('fecha_vec_dominio'), 'form-control-success': fields.fecha_vec_dominio && fields.fecha_vec_dominio.valid}" id="fecha_vec_dominio" name="fecha_vec_dominio" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('fecha_vec_dominio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fecha_vec_dominio') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fecha_vec_ssl'), 'has-success': fields.fecha_vec_ssl && fields.fecha_vec_ssl.valid }">
    <label for="fecha_vec_ssl" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cat-informacione.columns.fecha_vec_ssl') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.fecha_vec_ssl" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('fecha_vec_ssl'), 'form-control-success': fields.fecha_vec_ssl && fields.fecha_vec_ssl.valid}" id="fecha_vec_ssl" name="fecha_vec_ssl" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('fecha_vec_ssl')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fecha_vec_ssl') }}</div>
    </div>
</div>


