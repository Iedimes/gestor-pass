import AppForm from '../app-components/Form/AppForm';

Vue.component('tipo-debd-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                version:  '' ,
                
            }
        }
    }

});