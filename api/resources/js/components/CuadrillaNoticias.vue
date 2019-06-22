<template>
    <b-col lg="6" id="cuadrilla-noticias">
        <b-col md="6" class="mt-3 mt-lg-0" v-for="item in items" :key="item.id">
            <noticia 
                :tituloSize="tituloSize"
                :tagSize="tagSize"
                :item="item"
                :tipoItem="tipoItem"
                resize="300"
            />
        </b-col>
    </b-col>
</template>

<script>
    import Noticia from './Noticia'
    export default {
        props:['items','tipoItem'],
        components:{
            Noticia
        },
        computed:{
            tagSize(){
                return this.$mq === 'md' || this.$mq==='lg'?'.6rem':'.8rem'
            },
            tituloSize(){
               return this.$mq==='xs'?'1.2rem':this.$mq==='sm'?'1rem':this.$mq==='md'?'.7rem':'.8rem' 
            }
        }
    }
</script>

<style lang="scss" scoped>
    #cuadrilla-noticias{
        display: flex;
        align-content: space-between;
        flex-wrap: wrap;
        padding: 0;
    }
</style>
