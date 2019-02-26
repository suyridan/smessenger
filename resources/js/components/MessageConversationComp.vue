<template>
    <b-media :right-align="writtenByMe" vertical-align="center" class="mb-2">
        <b-img rounded="circle" slot="aside" :src="image" width="50" height="50" alt="placeholder" />
        <b-card>
            <slot></slot>    
        </b-card>
    </b-media>  
</template>

<script>
    export default {
        props: {
            writtenByMe: Boolean,
            image: String
        },
        data(){
            return{

            }
        },
        mounted() {
        }
    }
</script>
