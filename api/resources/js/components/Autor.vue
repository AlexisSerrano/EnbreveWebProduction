<template>
    <div class="d-flex align-items-center">
        <b-img rounded="circle" fluid id="foto" :src="`${url}${datosAutor.foto}`" class="shadow-sm mr-1"/>
        <div class="d-flex flex-column mr-1">
            <i id="nombre">{{`${datosAutor.nombre} ${datosAutor.primer_ap} ${datosAutor.segundo_ap}`}}</i>
            <i id="puesto">{{datosAutor.descripcion}}</i>
        </div>
        <div id="redes-autor" class="d-flex ml-2 pl-1 py-1">
            <a v-if="datosAutor.facebook" :href="datosAutor.facebook" class="redes facebook" target="_blank">
                <font-awesome-icon class="iconos-redes" size="lg" :icon="{ prefix: 'fab', iconName: 'facebook-f' }"/>
            </a>
            <a v-if="datosAutor.twitter" :href="datosAutor.twitter" class="redes twitter" target="_blank">
                <font-awesome-icon class="iconos-redes" size="lg" :icon="{ prefix: 'fab', iconName: 'twitter' }"/>
            </a>
            <a v-if="datosAutor.instagram" :href="datosAutor.instagram" class="redes instagram" target="_blank">
                <font-awesome-icon class="iconos-redes" size="lg" :icon="{ prefix: 'fab', iconName: 'instagram' }"/>
            </a>
        </div>
    </div>
</template>

<script>
	import {urlStorage} from '../urlBase'
    export default {
        props:['datosAutor'],
        data() {
            return {
                url: urlStorage
            }
        },
    }
</script>

<style lang="scss" scoped>
    @import '~#sass/_variables.scss';
    #foto{
        width: 2.5rem;
        padding: .125rem;
    }
    #nombre{
        font-family: 'Poppins-Medium';
        font-size: .8rem;
    }
    #puesto{
        font-family: 'Poppins-Regular';
        font-size: .6rem;
        color: $gray;
    }
    #redes-autor{
        border-left: .125rem solid $gray;
    }
    .redes{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 1.25rem;
        width: 1.25rem;
        color: $gray-light;
        margin-right: .25rem;
    }
    .iconos-redes{
        padding: .2125rem;
    }
	.facebook{
		background-color: #3b5998;
	}
	.twitter{
		background-color: #00aced;
    }
    .instagram{
        background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
    }
    .youtube{
        background-color: #ff0000;
    }
</style>