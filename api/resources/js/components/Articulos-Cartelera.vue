<template>
    <b-container>
        <b-row>
            <b-col lg="9" class="mb-lg-0 mb-3">
                <separador class="mb-2" :titulo="'artículos'"/>
                <transition name="fade" mode="out-in">
                    <tercia-articulos :items="articulosSlider" :key="posicion"/>
                </transition>
                <b-col class="d-flex justify-content-center mt-3">
                    <div @click="posicion=1" :class="`${posicion==1?'paginador-activo':''}`" class="paginador-seccion"></div>
                    <div @click="posicion=2" :class="`${posicion==2?'paginador-activo':''}`" class="paginador-seccion mx-3"></div>
                    <div @click="posicion=3" :class="`${posicion==3?'paginador-activo':''}`" class="paginador-seccion"></div>
                </b-col>
            </b-col>
            <b-col lg="3" class="mt-3 mt-lg-0">
                <separador class="mb-2" :titulo="'cartelera'"/>
                    <b-row class="justify-content-center">
                        <b-col cols="7" md="5" lg="12">
                            <carousel :items="cartelera" orientacion="vertical" tipoItem="cartelera" resize="300"/> 
                        </b-col>
                    </b-row>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
    import Separador from './Separador'
    import Carousel from './Carousel'
    import TerciaArticulos from './TerciaArticulos'
    export default {
        components:{
            Separador,
            TerciaArticulos, 
            Carousel
        },
        props:['articulos','cartelera'],
        data() {
            return {
                posicion: 1,
                articulosSlider:[],
                timer:0
            }
        },
        created(){
            this.articulosSlider = this.articulos.slice(0,3)
            setInterval(() => {
                this.timer++
            }, 1000);
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
                    this.articulosSlider = this.articulos.slice(0,3)
                }else if(this.posicion==2){
                    this.articulosSlider = this.articulos.slice(3,6)
                }else if(this.posicion==3){
                    this.articulosSlider = this.articulos.slice(6,9)
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
