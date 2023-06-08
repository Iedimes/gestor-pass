import AppForm from '../app-components/Form/AppForm';

Vue.component('servidor-form', {
    mixins: [AppForm],
    props: ['grupo', 'tipodeconexion'],

    data: function() {
        return {
            form: {
                grupo:  '' ,
                ip:  '' ,
                puerto:  '' ,
                tipodeconexion:  '' ,

            }
        }
    }

});
