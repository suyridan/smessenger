<template>
    <b-container fluid style="height: calc(100vh - 56px)">
        <b-row>
            <b-col cols="4">
                
                <contact-list-comp v-on:conversationSelected="changeActiveConversation($event)"></contact-list-comp>

            </b-col>
            <b-col cols="8">
                
                <active-conversation-comp
                v-if="selectedConversation"
                :contact-id="selectedConversation.contact_id"
                :contact-name="selectedConversation.contact_name"
                >

                </active-conversation-comp>
                
            </b-col>
        </b-row>
    </b-container>
</template>
<script>
export default {
        data(){
            return {
                selectedConversation: null
            };
        },
        mounted() {
        },
        methods: {
           changeActiveConversation(conversation){
               this.selectedConversation = conversation;
           }
        }
    }
</script>