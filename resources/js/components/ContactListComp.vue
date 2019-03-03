<template>
    <b-list-group>
        <contact-comp 
            v-for="conversation in conversations"
            :key="conversation.id"
            :conversation="conversation"
            @click.native="selectConversation(conversation)"
            :selected="selectConversationId === conversation.id"
        >
        </contact-comp>
    </b-list-group>
</template>

<script>
    export default {
        props: {
            conversations: Array
        },
        data() {
            return {
                selectConversationId : null
            };
        },
        mounted() {
        },
        methods: {
            selectConversation(conversation){
                this.selectConversationId = conversation.id;
                this.$emit('conversationSelected', conversation);
            }
        }
    }
</script>
