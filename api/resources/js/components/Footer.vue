<template>
    <b-container fluid id="container" class="py-4">
        <b-container>
            <b-row>
                <b-col lg="3" class="enbreve align-items-lg-start align-items-center mb-lg-0 mb-3">
                    <b-img id="logo" src="http://enbreve.info/img/logo-gris.png"/>
                    <span class="texto text-center text-lg-left descripcion">Medio de comunicación en línea con información social y cultural de Xalapa, artículos de interés general y cartelera de eventos.</span>
                </b-col>
                <b-col md="4" lg="3" class="seccion mt-md-0 mt-2">
                    <span class="titulos">CONTACTO</span>
                    <div class="contacto">
                        <font-awesome-icon size="2x" class="iconos" icon="envelope"/>
                        <div class="texto">
                            <span>info@enbreve.info<br/>contacto@enbreve.info</span>
                        </div>
                    </div>
                    <div class="contacto">
                        <font-awesome-icon rotation="90" size="2x" class="iconos" icon="phone"/>
                        <div class="texto">
                            <span>(044) 228-424-8919<br/>enBreve@gmail.com</span>
                        </div>
                    </div>
                </b-col>
                <b-col md="4" lg="3" class="seccion">
                    <span class="titulos">CATEGORÍAS</span>
                    <a class="links" href="/">INICIO</a>
                    <a class="links" href="/sociales">SOCIALES</a>
                    <a class="links" href="/cultura">CULTURA</a>
                    <a class="links" href="/articulos">ARTÍCULOS</a>
                </b-col>
                <b-col md="4" lg="3" class="seccion mt-md-0 mt-2">
                    <span class="titulos">SÍGUENOS EN:</span>
                    <div>
                        <a href="https://www.facebook.com/enbreve" target="_blank">
                            <font-awesome-icon size="2x" class="iconos redes" :icon="{ prefix: 'fab', iconName: 'facebook-f' }"/>
                        </a>
                        <a href="https://www.twitter.com/enbreve" target="_blank">
                            <font-awesome-icon size="2x" class="iconos redes" :icon="{ prefix: 'fab', iconName: 'twitter' }"/>
                        </a>
                        <a href="https://www.instagram.com/enbreve" target="_blank">
                            <font-awesome-icon size="2x" class="iconos redes" :icon="{ prefix: 'fab', iconName: 'instagram' }"/>
                        </a>
                        <a href="https://www.youtube.com/enbreve" target="_blank">
                            <font-awesome-icon size="2x" class="iconos redes" :icon="{ prefix: 'fab', iconName: 'youtube' }"/>
                        </a>
                    </div>
                    <b-button href="/contacto" variant="danger" size="sm" class="botonContacto">Contáctanos</b-button>
                </b-col>
            </b-row>
        </b-container>
    </b-container>
</template>

<style lang="scss" scoped>
    @import '~#sass/_variables.scss';
    #container{
        background-color: $gray-dark;
        display: flex;
        align-items: center;
    }
    .seccion{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .enbreve{
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }
    .titulos{
        color: $gray-light;
        font-family: 'Poppins-ExtraBold';
        font-size: 1.1rem;
        margin-bottom: .5rem;
    }
    .links{
        color: $gray !important;
        font-family: 'Poppins-Bold';
        text-decoration:none;
        font-size:.875rem;
        margin-bottom: .1875rem;
    }
    .links:hover{
        color: $rojo !important;
    }
    .iconos{
        color: $gray-light;
        margin-right: .9375rem;
        padding: .2rem;
    }
    .redes:hover{
        color:$rojo;
    }
    .texto{
        color: gray;
        font-family: 'Poppins-Light';
        font-size:.875rem; 
    }
    .descripcion{
        margin-top: .625rem;
    }
    .contacto{
        display: flex;
        align-items: center;
        margin-bottom: 1.25rem;
    }
    .botonContacto{
        // background-color:$rojo;
        margin-top: 1.875rem;
        font-size: .875rem;
        font-family: 'Poppins-SemiBold';
    }
    #logo{
        width: 8rem;
    }
</style>