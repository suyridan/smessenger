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
                        :image="message.written_by_me ? myImage : selectedConversation.contact_image">
                        {{ message.content }}
                    </message-conversation-comp>
                </b-card-body>

                    <div slot="footer">
                        <b-form class="mb-0" @submit.prevent="postMessage">
                            
                            <b-input-group>
                                <b-form-input
                                    type="text"
                                    autocomplete="off"
                                    placeholder="Escribe un mensaje..."
                                    v-model="newMessage"
                                    ref='inputMessage'>
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
            <b-img rounded="circle" :src="selectedConversation.contact_image" width="60" alt="img" class="m-1"></b-img>
            <p>{{ selectedConversation.contact_name }}
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
        data(){
            return {
                newMessage: ''
            };
        },
        methods: {
            postMessage(){
                this.$store.dispatch('postMessage', this.newMessage);
                this.newMessage = '';
            },
            scrollToButton(){
                const el = document.querySelector('.card-body-scroll');
                el.scrollTop = el.scrollHeight;
            },
            focusNewMessage(){ 
                this.$refs.inputMessage.focus();
            }
        },
        updated() {
            this.scrollToButton();
            this.focusNewMessage();
        },
        computed: {
            messages() {
                return this.$store.state.messages;
            },
            selectedConversation(){
                return this.$store.state.selectedConversation;
            },
            myImage() {
                return `/users/${this.$store.state.user.image}`;
            }
        }
    }
</script>

<style scoped>
    .card-body-scroll{
        max-height: calc(100vh -63px);
        overflow-x: auto;
    } 
</style>

