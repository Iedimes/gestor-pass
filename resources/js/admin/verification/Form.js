import AppForm from '../app-components/Form/AppForm';

Vue.component('verification-form', {
    mixins: [AppForm],
    props: ['user'],
    data: function() {
        return {
            form: {
                admin_users_id:  '' ,
                password:  '' ,

            }
        }
    }

});
