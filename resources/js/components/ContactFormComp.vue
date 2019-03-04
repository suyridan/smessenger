<template>
    <b-form class="my-3 mx-2">
        <b-form-input class="text-center"
            type="text"
            placeholder="Buscar contacto ..."
            v-model="contactSearch">
        </b-form-input>
    </b-form>
</template>
<script>
    export default {
        computed: {
            contactSearch: {
                get () {
                    return this.$store.state.contactSearch;
                },
                set (value) {
                    this.$store.commit('updateSearch', value);
                }
            }
        }
    }
</script>