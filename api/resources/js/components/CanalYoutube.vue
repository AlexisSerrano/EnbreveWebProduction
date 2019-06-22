<template>
    <b-container fluid id="container">
        <b-container>
            <separador titulo="EnBreve Youtube" color="#f9f9f9" class="mb-1"/>
            <b-row id="carouselContainer">
                <b-col md="6">
                    <div class="mb-2">
                        <b-embed
                            type="iframe"
                            aspect="16by9"
                            src="http://www.youtube.com/embed?listType=user_uploads&list=francoescamilla"
                            allowfullscreen
                        ></b-embed>
                    </div>
                </b-col>
            </b-row>
        </b-container>
    </b-container>
</template>

<script>
import Separador from './Separador'
    export default {
        props:['items'],
        components:{
            Separador
        }
    }
</script>

<style lang="scss" scoped>
    @import '~#sass/_variables.scss';
    #container{
        background-color: $gray-dark;
        padding: .625rem 0rem;
    }
    #carouselContainer{
        display: flex;
        justify-content: center;
    }
</style>