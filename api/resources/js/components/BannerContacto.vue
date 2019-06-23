<template>
    <b-container>
        <div id="contacto" class="pt-3 pb-4 px-4"
            :style="`backgroundImage:url(${require('#img/xalapa.jpg')})`"
        >
            <b-img class="mb-2" id="logo" :src="require('#img/logo-gris.png')"/>
            <span id="descripcion">Anúnciate con nosotros: negocios, eventos, artículos de interés general.</span>
            <b-button @click="verContacto" size="sm" variant="danger" class="botonContacto">Contáctanos</b-button>
        </div>
    </b-container>
</template>

<script>
    export default {
        methods:{
            verContacto(){
                window.scrollTo(0, 0);
                this.$router.push('/contacto')
            }
        }
    }
</script>


<style lang="scss" scoped>
    @import '~#sass/_variables.scss';
    #logo{
        width: 7.4rem;
    }
    #contacto{
        background-position: center;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        text-align: center;
    }
    #titulo{
        color: $gray-light;
        font-family: 'Poppins-Bold';
        font-size: 1.875rem;
    }
    #descripcion{
        color: $gray-light;
        font-family: 'Poppins-Medium';
        font-size: 1rem;
    }
    .botonContacto{
        margin-top: .9375rem;
        font-size: .875rem;
        font-family: 'Poppins-SemiBold';
    }
</style>