<template>
    <b-row class="h-100">
        <b-col cols="8">
            <b-card
            no-body
            class="h-100"
            footer="Card Footer"
            footer-tag="footer"
            footer-bg-variant="light"
            footer-border-variant="dark"
            title="Conversación"
            > 
                <b-card-body class="card-body-scroll">
                    <message-conversation-comp 
                        v-for="message in messages" 
                        :key="message.id"
                        :written-by-me="message.written_by_me"
                        :image="message.written_by_me ? myImage : contactImage">
                        {{ message.content }}
                    </message-conversation-comp>
                </b-card-body>

                    <div slot="footer">
                        <b-form class="mb-0" @submit.prevent="postMessage">
                            
                            <b-input-group>
                                <b-form-input class="text-center"
                                    type="text"
                                    autocomplete="off"
                                    placeholder="Escribe un mensaje..."
                                    v-model="newMessage">
                                </b-form-input>

                                <b-input-group-append>
                                    <b-button type="submit" variant="primary">
                                        Enviar
                                    </b-button>
                                </b-input-group-append>
                            
                            </b-input-group>

                        </b-form>
                    </div>
                
            </b-card>
        </b-col>
        <b-col cols="4">
            <b-img rounded="circle" :src="contactImage" width="60" alt="img" class="m-1"></b-img>
            <p>{{ contactName }}
            </p>
            <hr>
            <b-form-checkbox>
                Desactivar notificaciones
            </b-form-checkbox>   
        </b-col>
    </b-row>    
</template>

<script>
    export default {
        props:{
            contactId: Number,
            contactName: String,
            contactImage: String,
            messages: Array,
            myImage: String
        },
        data(){
            return {
                newMessage: ''
            };
        },
        mounted() {
        },
        methods: {
            /**
             * se tenia metodo de getMessage, se ejecutaba en mounted
             * se pasó a MessengerComp
             */
            postMessage(){
                const param = {
                    to_id: this.contactId,
                    content: this.newMessage
                };
                axios.post('api/messages/store',param)
                    .then((response) => {
                        if(response.data.success){
                            this.newMessage = '';
                            const message = response.data.message;
                            message.written_by_me = true;
                            this.$emit('messageCreated', message);
                        }
                    });
            },
            scrollToButton(){
                const el = document.querySelector('.card-body-scroll');
                el.scrollTop = el.scrollHeight;
            }    
        },
        updated() {
            this.scrollToButton();
        }
        /**
         * Se quita watch() que escuchaba cambios en la variale contact y 
         * ejecutaba de nuevo getMessage
         */
    }
</script>

<style scoped>
    .card-body-scroll{
        max-height: calc(100vh -63px);
        overflow-x: auto;
    } 
</style>

