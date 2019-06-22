<template>
    <div @mouseenter="back?hover=true:''"  @mouseleave="hover=false" id="container">
        <b-img 
            @click="tipoItem=='cartelera'?$store.commit('mostrarModal',{cartel:item}):verNoticia()"
            :src="srcImagen"
            fluid
            id="imagen"
        />
        <div id="textContainer" @click="tipoItem!='cartelera'?verNoticia():$store.commit('mostrarModal',{cartel:item})">
            <div v-if="!hover && titulo" 
                id="titulo" 
                :style="`font-size:${tituloSize};`">
                {{item.titulo.length>95?`${item.titulo.slice(0,95)} ...`:item.titulo}}
            </div>
            <div v-if="resumenFront" id="resumen" :style="`font-size:${resumenFrontSize}`"
                v-html="item.resumen.length>205?`${item.resumen.slice(0,205)} ...`:item.resumen"
            >
            </div>
        </div>
        <div v-if="!hover" id="tag" :style="`font-size:${tagSize}`">Espectaculos</div>
        <social-sharing v-if="redesFront" 
            :url="`http://enbreve.info/interior/${tipoItem}/${item.id}`"
            :title="item.titulo"
            hashtags="enbreve"
            twitter-user="enbreve"
            inline-template>
            <div id="redes-front">
                <network network="facebook" class="redes-share">
                    <font-awesome-icon class="iconos-redes" size="lg" :icon="{ prefix: 'fab', iconName: 'facebook-f' }"/>
                </network>
                <network network="twitter" class="redes-share">
                    <font-awesome-icon class="iconos-redes" size="lg" :icon="{ prefix: 'fab', iconName: 'twitter' }"/>
                </network>
            </div>
        </social-sharing>
        <transition name="zoom">
            <div v-if="hover" @click.self="verNoticia" id="back" style="animation-duration: 0.3s">
                <social-sharing 
                    :url="`http://enbreve.info/interior/${tipoItem}/${item.id}`"
                    :title="item.titulo"
                    hashtags="enbreve"
                    twitter-user="enbreve"
                    inline-template>
                <div id="redes-back">
                    <network network="facebook" class="redes-back-share">
                        <font-awesome-icon class="iconos-redes-back" size="lg" :icon="{ prefix: 'fab', iconName: 'facebook-f' }"/>
                    </network>
                    <network network="twitter" class="redes-back-share">
                        <font-awesome-icon class="iconos-redes-back" size="lg" :icon="{ prefix: 'fab', iconName: 'twitter' }"/>
                    </network>
                </div>
                </social-sharing>
                <span @click="verNoticia" id="resumen-back" :style="`font-size:${resumenBackSize};`"
                    v-html="item.resumen.length>170?`${item.resumen.slice(0,170)} ...`:item.resumen"
                >
                </span>
            </div>
        </transition> 
    </div>
</template>

<script>
	import {urlStorage} from '../urlBase'
    export default {
        props: {
            back: {
                type: Boolean,
                default: true
            },
            item:{
                type:Object
            },
            tagSize:{
                type:String
            },
            tituloSize:{
                type:String
            },
            resumenFront:{
                type:Boolean,
                default:false
            },
            redesFront:{
                type:Boolean,
                default:false
            },
            titulo:{
                type:Boolean,
                default:true
            },
            tipoItem:{
                type:String
            },
            resize:{
                type:String
            }
        },
        data() {
            return {
                hover: false,
                url:urlStorage,
                srcImagen:''
            }
        },
        created(){
            let partes = this.item.imagen.split('.')
            let src = partes[0]
            let formato = partes[1]
            this.srcImagen = `${this.url}${src}_${this.resize}.${formato}`
        },
        methods:{
            verNoticia(){
                window.location = `/${this.tipoItem}/${this.item.id}`
            }
        },
        computed:{
            resumenBackSize(){
                return this.$mq==='xs'?'1rem':this.$mq==='sm'?'.8rem':this.$mq==='md'?'.6rem':'.7rem' 
            },
            resumenFrontSize(){
                return this.$mq==='md' || this.$mq==='lg'?'.8125rem':this.$mq==='sm'?'1rem':'.9rem'
            }
        }
    }
</script>

<style lang="scss">
    @import '~#sass/_variables.scss';
    .redes-share{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 1.875rem;
        width: 1.875rem;
        color: $dark;
        background-color: rgba(31,33,36,.7);
        color: $gray-light;
        margin-left: .25rem;
        cursor: pointer;
    }
    .redes-share:hover{
        background-color: rgba(205,29,41,.7);
        color: $gray-light;
    }
    .redes-back-share{
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        margin-bottom: .25rem;
        background-color: rgba(31,33,36,.7);
        margin-left: .25rem;
        color: $gray-light;
        height: 1.5625rem;
        width: 1.5625rem;
    }
    .redes-back-share:hover{
        background-color: rgba(205,29,41,.7);
        color: $gray-light;
    }
    .iconos-redes{
        padding: .0625rem;
    }
    .iconos-redes-back{
        padding: .1562rem;
    }
</style>


<style lang="scss" scoped>
    @import '~#sass/_variables.scss';
    #container{
        background-color: $dark;
        position: relative;
    }
    #textContainer{
        position: absolute;
        bottom: 0;
        width: 100%;
        color: $gray-light;
        font-family: 'Poppins-Bold';
    }
    #titulo{
        background-color: rgba(205,29,41,.8);
        padding: .25rem .5rem;
        line-height: 1.3;
        cursor: pointer;
    }
    #resumen{
        background-color: rgba(31,33,36,.8);
        padding: .25rem .5rem;
        cursor: pointer;
    }
    #tag{
        position: absolute;
        top: .3125rem;
        left: .3125rem;
        background-color: $rojo;
        color: $gray-light;
        font-family: 'Poppins-SemiBold';
        padding: .25rem .5rem;
    }
    #redes-front{
        position: absolute;
        top: .3125rem;
        right: .3125rem;
        display: flex;
        z-index: 2;
    }
    #redes-back{
        display: flex;
        justify-content: center;
        z-index: 2;
    }
    #back{
        position: absolute;
        top: 0;
        height: 100%;
        width: 100%;
        color: $gray-light;
        background-color: rgba(31,33,36,.9);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-family: 'Poppins-Regular';
        padding: .625rem;
        text-align: center;
        cursor: pointer;
    }
    #resumen-back{
        cursor: pointer;
    }
    #imagen{
        cursor: pointer;
    }
</style>