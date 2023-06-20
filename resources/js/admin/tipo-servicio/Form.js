import AppForm from '../app-components/Form/AppForm';

Vue.component('tipo-servicio-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                
            }
        }
    }

});