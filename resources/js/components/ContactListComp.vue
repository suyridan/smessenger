<template>
    <div>
        <b-form class="my-3 mx-2">
                <b-form-input class="text-center"
                    type="text"
                    placeholder="Buscar contacto ...">
                </b-form-input>
        </b-form>

        <b-list-group>
            <!-- <contact-comp variant="dark">
            </contact-comp>            

            <contact-comp variant="">
            </contact-comp>

            <contact-comp variant="secondary">
            </contact-comp> -->

            <contact-comp 
                v-for="conversation in conversations"
                :key="conversation.id"
                :conversation="conversation"
            >
            </contact-comp>

        </b-list-group>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                conversations: []
            };
        },
        mounted() {
            this.getConversations();
        },
        methods: {
            getConversations(){
                axios.get('api/conversations')
                    .then((response) => {
                        this.conversations = response.data;
                    });
            }
        }
    }
</script>
