<template>
    <b-row class="h-100">
        <b-col cols="8">
            <b-card
            class="h-100"
            footer="Card Footer"
            footer-tag="footer"
            footer-bg-variant="light"
            footer-border-variant="dark"
            title="Conversación"
            > 
                <message-conversation-comp 
                    v-for="message in messages" 
                    :key="message.id"
                    :written-by-me="message.written_by_me">
                    {{ message.content }}
                </message-conversation-comp>
                
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
            <b-img rounded="circle" blank width="60" blank-color="#777" alt="img" class="m-1"></b-img>
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
            contactName: String
        },
        data(){
            return {
                messages: [],
                newMessage: '',
            };
        },
        mounted() {
            this.getMessages();
        },
        methods: {
            getMessages(){
                axios.get(`/api/messages?contact_id=${this.contactId}`)
                .then((response) => {
                        this.messages = response.data;
                    });
            },
            postMessage(){
                const param = {
                    to_id: 2,
                    content: this.newMessage
                };
                axios.post('api/messages/store',param)
                    .then((response) => {
                        if(response.data.success){
                            this.newMessage = '';
                            this.getMessages();
                        }
                    });
            }    
        },
        watch: {
            contactId(value){
                this.getMessages();
            }
        }
    }
</script>
