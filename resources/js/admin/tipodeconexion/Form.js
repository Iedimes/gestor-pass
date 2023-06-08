import AppForm from '../app-components/Form/AppForm';

Vue.component('tipodeconexion-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                
            }
        }
    }

});