import AppForm from '../app-components/Form/AppForm';

Vue.component('servidore-form', {
    mixins: [AppForm],
    props: ['tipodeconexion','grupo'],

    data: function() {
        return {
            form: {
                ip:  '' ,
                puerto:  '' ,
                tipodeconexion_id:  '' ,

            }
        }
    }

});
