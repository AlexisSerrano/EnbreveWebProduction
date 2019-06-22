<template>
    <b-container fluid id="container" class="py-3">
        <b-container>
            <b-row>
                <b-col class="texto">
                    <span>EnBreve © 2019 Todos los derechos reservados.</span>
                    <span class="terminos">Términos de uso y Politicas de privacidad.</span>
                </b-col>
            </b-row>
        </b-container>
    </b-container>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>
    @import '~#sass/_variables.scss';
    #container{
        background-color: $dark;
        display: flex;
        align-items: center;
    }
    .texto{
        color: white;
        font-family: 'Poppins-Light';
        font-size: .875rem;
        text-align: center;
    }
    .terminos{
        color: $rojo;
    }
</style>