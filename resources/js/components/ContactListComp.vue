<template>
    <b-list-group>
        <contact-comp 
            v-for="conversation in conversations"
            :key="conversation.id"
            :conversation="conversation"
            @click.native="selectConversation(conversation)"
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
            };
        },
        mounted() {
        },
        methods: {
            selectConversation(conversation){
                this.$emit('conversationSelected', conversation);
            }
        }
    }
</script>
