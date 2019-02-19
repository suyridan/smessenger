<template>
    <b-container class="py-4">
        <b-card
            footer-bg-variant="light"
            footer-border-variant="dark"
            title="Modificar perfil"
            > 
            <b-card-body class="card-body-scroll">
                <b-form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="_token" v-model="csrfToken">
                    <b-form-group
                        id="user_email_group"
                        label="Correo electrónico:"
                        label-for="user_email"
                        description="No puede ser modificado"
                    >
                    <b-form-input
                        id="user_email"
                        type="email"
                        name="email"
                        v-model="user.email"
                        disabled />
                </b-form-group>

                    <b-form-group id="user_pass_group" 
                        label="Nombre:" 
                        label-for="user_name"
                    >
                        <b-form-input
                        id="user_name"
                        type="text"
                        name="name"
                        v-model="user.name"
                        placeholder="Ingresa tu nombre" />
                    </b-form-group>

                    <b-form-group id="user_pass_group" 
                        label="Cambiar contraseña:" 
                        label-for="user_pass"
                        description="Solo si se quiere modificar"
                    >
                        <b-form-input
                        id="user_pass"
                        type="text"
                        name="password"
                        placeholder="******" />
                    </b-form-group>

                    <b-form-group id="user_file_group" 
                        label="Cambiar imagen:"
                        cols="8" 
                        label-for="user_name"
                        description="Solo si se quiere modificar"
                    >
                    <b-img :src="image" rounded="circle" width="50" alt="Imagen actual" />
                        
                        <b-form-file
                            name="image"
                            placeholder="Elige una imagen..."
                            drop-placeholder="Arrastra tu imagen..."
                        />
                    
                    </b-form-group>

                    <b-button type="submit" variant="primary">Guardar</b-button>
                </b-form>
            </b-card-body>
        </b-card>
        
    </b-container>
</template>
<script>
  export default {
    props:{
        user: Object ,
        csrfToken: String
    },
    data() {
        return{
        }
    },
    computed: {
        image(){
            return `users/${this.user.image}`
        }
    }
  }
</script>