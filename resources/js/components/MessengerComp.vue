<template>
    <b-container fluid style="height: calc(100vh - 56px)">
        <b-row>
            <b-col cols="4">
                <contact-form-comp />
                <contact-list-comp 
                v-on:conversationSelected="changeActiveConversation($event)"
                />

            </b-col>
            <b-col cols="8">
                
                <active-conversation-comp
                v-if="selectedConversation"
                />
                
            </b-col>
        </b-row>
    </b-container>
</template>
<script>
export default {    
        props:{
            user: Object
        },
        mounted() {
            this.$store.commit('setUser', this.user);
            this.$store.dispatch('getConversations');
            Echo.private(`user.${this.user.id}`)
            .listen('MessageSent', (data) => {
                const message = data.message;
                message.written_by_me = false;
                this.addMessage(message);
            });
            Echo.join(`smessenger`)
            .here((users) => {
                users.forEach((user) => this.changeStatus(user, true));
            })
            .joining(
                user => this.changeStatus(user, true))
            .leaving(
                user => this.changeStatus(user, false)
            )
            
        },
        methods: {
           changeActiveConversation(conversation){
               this.getMessages();
           },
            changeStatus(user, status){
                const index = this.$store.state.conversations.findIndex((conversation) => {
                    return conversation.contact_id == user.id;
                });
                if (index >= 0){
                    this.$set(this.$store.state.conversations[index],'online', status);
                }   
            }
        },
        computed: {
            myImageUrl(){
                return `/users/${this.user.image}`;
            },
            selectedConversation(){
                return this.$store.state.selectedConversation;
            }
        }
}
</script>