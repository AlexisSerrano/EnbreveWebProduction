<template>
    <b-row class="justify-content-around justify-content-lg-start">
        <b-col cols="6" class="mt-3 mt-lg-0" md="5" lg="4" v-for="item in items" :key="item.id">
            <noticia
                tituloSize=".9rem"
                tagSize=".8rem"
                :item="item"
                tipoItem="articulo"
                resize="300"
            />
        </b-col>
    </b-row>
</template>

<script>
    import Noticia from './Noticia'
    export default {
        props:['items'],
        components:{
            Noticia
        }
    }
</script>