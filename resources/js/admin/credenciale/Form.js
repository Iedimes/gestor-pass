import AppForm from '../app-components/Form/AppForm';

Vue.component('credenciale-form', {
    mixins: [AppForm],
    props: ['servidor','tipodeconexion','estados','cat_informaciones','grupo'],
    data: function() {
        return {
            form: {
                usuario:  '' ,
                contraseña:  '' ,
                enlace:  '' ,
                servidor:  '' ,
                tipodeconexion:  '' ,
                estado:  '' ,
                cat_informaciones:  '' ,
                grupo:  '' ,

            }
        }
    }

});
