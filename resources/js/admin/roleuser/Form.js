import AppForm from '../app-components/Form/AppForm';

Vue.component('roleuser-form', {
    mixins: [AppForm],
    props: ['rol','persona'],
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
        updatePersona(selected) {
            this.form.admin_users_id = selected.id;
        }
    }
});
