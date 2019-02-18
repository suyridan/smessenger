<template>
        <b-img 
            :title="online ? 'Disponible' : 'Desconectado'"
            rounded="circle" 
            blank width="10" 
            :blank-color="online ? '#00FF00' : 'gray'"  
            alt="img"
        />
</template>
<script>
export default {
    props:{
        online: Boolean
    },
    data(){
        return{

        };
    },
    mounted() {
        
    }
}
</script>
