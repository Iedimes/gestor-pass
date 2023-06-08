import AppForm from '../app-components/Form/AppForm';

Vue.component('grupo-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                
            }
        }
    }

});