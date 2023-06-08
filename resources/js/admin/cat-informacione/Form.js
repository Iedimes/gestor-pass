import AppForm from '../app-components/Form/AppForm';

Vue.component('cat-informacione-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                credenciales_id:  '' ,
                tipo_debd_id:  '' ,
                nombredebd:  '' ,
                versiones:  '' ,
                ssl:  '' ,
                fecha_vec_dominio:  '' ,
                fecha_vec_ssl:  '' ,

            }
        }
    }

});
