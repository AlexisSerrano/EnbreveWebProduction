<template>
    <b-container>
        <separador :titulo="nombre" class="mb-3"/>
        <b-row>
            <b-col lg="6">
                <carousel :items="principales" :tipoItem="tipoItem" resize="900"/> 
            </b-col>
            <transition name="zoom" mode="out-in">
                <cuadrilla-noticias :items="secundarias" :key="posicion" :tipoItem="tipoItem"/>
            </transition>
        </b-row>
        <b-row v-if="this.slider" class="flex-row-reverse">
            <b-col lg="6 d-flex justify-content-center mt-3">
                <div @click="posicion=1" :class="`${posicion==1?'paginador-activo':''}`" class="paginador-seccion"></div>
                <div @click="posicion=2" :class="`${posicion==2?'paginador-activo':''}`" class="paginador-seccion mx-3"></div>
                <div @click="posicion=3" :class="`${posicion==3?'paginador-activo':''}`" class="paginador-seccion"></div>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
    import Separador from './Separador'
    import Carousel from './Carousel'
    import CuadrillaNoticias from './CuadrillaNoticias'
import { setInterval } from 'timers';
    export default {
        props:['nombre','items','slider','tipoItem'],
        data() {
            return {
                principales: [],
                secundarias:[],
                posicion:1,
                timer:0
            }
        },
        components:{
            Separador,
            Carousel,
            CuadrillaNoticias
        },
        created(){
            this.principales = this.items.slice(0,4)
            this.secundarias = this.items.slice(4,8)
            if(this.slider){
                setInterval(() => {
                    this.timer++
                }, 1000);
            }
        },
        watch:{
            timer(){
                if(this.timer==10){
                    if(this.posicion==3){
                        this.posicion=1
                    }else{
                        this.posicion++
                    }
                }
            },
            posicion(){
                if(this.posicion==1){
                    this.secundarias = this.items.slice(4,8)
                }else if(this.posicion==2){
                    this.secundarias = this.items.slice(8,12)
                }else if(this.posicion==3){
                    this.secundarias = this.items.slice(12,16)
                }
                this.timer=0
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '~#sass/_variables.scss';
    .paginador-seccion{
        background-color: $gray;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        cursor: pointer;
    }
    .paginador-activo{
        background-color: $dark;
    }
</style>