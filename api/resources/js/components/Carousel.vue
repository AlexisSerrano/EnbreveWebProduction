<template>
    <b-carousel
      id="carousel-nota-articulo"
      :interval="5000"
      controls
      background="#ababab"
      img-width="960"
      img-height="540"
    >
      <b-carousel-slide v-for="item in items" :key="item.id">
        <noticia 
          :back="false"
          :resumenFront="orientacion=='horizontal'?true:false"
          :tituloSize="orientacion=='horizontal'?'1.2rem':'.9rem'"
          tagSize=".8rem"
          slot="img"
          :item="item"
          :redesFront="true"
          :tipoItem="tipoItem"
          :resize="resize"
        />
      </b-carousel-slide>
    </b-carousel>
</template>

<script>
import Noticia from './Noticia'
  export default {
    props: {
      items: {
        type: Array,
      },
      orientacion:{
        type:String,
        default:'horizontal'
      },
      tipoItem:{
        type:String
      },
      resize:{
        type:String
      }
    },
    components:{
      Noticia
    }
  }
</script>

<style lang="scss">
  .carousel-caption{
    display: none;
  }
</style>
