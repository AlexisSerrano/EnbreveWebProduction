<template>
    <b-container fluid id="container">
        <b-container>
            <b-row id="navbar">
                <b-col class="text-center text-md-left" cols="12" md="9">
                    <b-link href="/" class="links">INICIO</b-link>
                    <b-link to="/sociales" class="links">SOCIALES</b-link>
                    <b-link to="/cultura" class="links">CULTURA</b-link>
                    <b-link to="/articulos" class="links">ARTÍCULOS</b-link>          
                </b-col>
                <transition name="zoom" mode="out-in" v-on:before-enter="focus">
                    <b-col v-if="!buscador" style="animation-duration: 0.3s" key="buscadorClose" md="3" class="buscador d-none d-md-flex">
                        <font-awesome-icon id="openIcon" icon="search" class="iconos" @click="buscador=true"/>
                        <b-tooltip target="openIcon" title="Buscar"></b-tooltip>
                    </b-col>
                    <b-col v-else md="3" style="animation-duration: 0.3s" key="buscadorOpen" class="buscador abierto d-none d-md-flex">
                        <b-form-input ref="buscador" autocomplete="off" @keydown="buscarConRetardo" @keyup.enter="buscar" v-model="busqueda" size="sm" placeholder="Buscar..."></b-form-input>
                        <font-awesome-icon id="closeIcon" icon="times" class="iconos" @click="buscador=false"/>
                        <b-tooltip target="closeIcon" title="Cerrar"></b-tooltip>
                    </b-col>
                </transition>
            </b-row>
        </b-container>
    </b-container>
</template>

<script>
    export default {
        data() {
            return {
                buscador: false,
                busqueda:''
            }
        },
        methods:{
            buscar(){
                if(this.busqueda){
                    window.location = `/busqueda/${this.busqueda}`
                }
            },
            buscarConRetardo(){
                window.intervalo
                clearTimeout(window.intervalo);
                window.intervalo = setTimeout(()=>{
                    this.buscar()
                    clearTimeout(window.intervalo);
                }, 1000);
            },
            focus(){
                if(this.buscador===true){
                    this.$nextTick(function () {
                        this.busqueda=''
                        this.$refs.buscador.focus()
                    })
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '~#sass/_variables.scss';
    #container{
        background-color: $dark;
        height: 3.125rem;
        display: flex;
        align-items: center;
    }
    #navbar{
        height: 1.843rem;
    }
    .links{
        color: $gray-light;
        font-family: 'Poppins-Regular';
        margin-right: 1.25rem;
        font-size: .9rem;
    }
    .links:hover, .active{
        text-decoration: none;
        color: $rojo;
        border-bottom: .125rem solid $rojo;
        padding-bottom: .9375rem;
    }
    .iconos{
        color: $gray-light;
    }
    .iconos:hover{
        cursor: pointer;
    }
    .buscador{
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding-left: .3125rem;
    }
    .abierto{
        border-left: .125rem solid $gray-light;
    }
    .form-control{
        background-color: transparent;
        border: none;
        font-family: 'Poppins-Light';
        font-size: .8125rem;
        color: $gray-light;
    }
    .form-control:focus{
        box-shadow: none;
    }
</style>