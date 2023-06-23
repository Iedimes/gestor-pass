import AppForm from '../app-components/Form/AppForm';

Vue.component('roleuser-form', {
    mixins: [AppForm],
    props: ['rol'],
    data: function() {
        return {
            form: {
                admin_users_id: '',
                role_id: '',
            }
        }
    },
    methods: {
        updateRole(selected) {
            this.form.role_id = selected.id;
        },
    }
});
