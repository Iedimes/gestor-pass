import AppForm from '../app-components/Form/AppForm';

Vue.component('roleuser-form', {
    mixins: [AppForm],
    props: ['role'],
    data: function() {
        return {
            form: {
                admin_users_id: '',
                role_id: '',
            }
        }
    },
});
