<template>
    <b-row class="h-100">
        <b-col cols="8">
            <b-card
            class="h-100"
            footer="Card Footer"
            footer-tag="footer"
            footer-bg-variant="light"
            footer-border-variant="dark"
            title="Title"
            > 
                <message-conversation-comp>
                    awdadawdadawdaddmm m mm  mm m m 
                </message-conversation-comp>

                <message-conversation-comp written-by-me>
                    Lorem ipsum dolor sit, amet consec 
                </message-conversation-comp>

                <div slot="footer">
                    <b-form class="mb-0">
                        
                        <b-input-group>
                            <b-form-input class="text-center"
                                type="text"
                                placeholder="Escribe un mensaje...">
                            </b-form-input>

                            <b-input-group-append>
                                <b-button variant="primary">Enviar</b-button>
                            </b-input-group-append>
                        
                        </b-input-group>

                    </b-form>
                </div>
            </b-card>
        </b-col>
        <b-col cols="4">
            <b-img rounded="circle" blank width="60" blank-color="#777" alt="img" class="m-1"></b-img>
            <p>Usuario seleccionado</p>
            <hr>
            <b-form-checkbox>
                Desactivar notificaciones
            </b-form-checkbox>   
        </b-col>
    </b-row>    
</template>

<script>
    export default {
        mounted() {
            axios.get('api/index').then(() => console.log(response));
        }
    }
</script>
