<template>
    <b-container fluid id="container">
        <b-container>
            <b-row>
                <b-col cols="8" lg="4" md="5" class="seccion">
                    <font-awesome-icon class="iconos" icon="calendar-check"/>
                    <span>{{datetime}}</span>
                </b-col>
                <b-col lg="2" class="seccion d-none d-lg-flex justify-content-center">
                    <b-img v-if="iconoClima" id="iconoClima" fluid :src="`http://openweathermap.org/img/w/${iconoClima}.png`"></b-img>
                    <!-- <font-awesome-icon class="iconos" icon="cloud-sun"/> -->
                    <span>{{temperaturaMin}}°C / {{temperaturaMax+3}}°C</span>
                </b-col>

                <b-col cols="4" md="3" id="redes-seccion" class="seccion justify-content-md-center justify-content-end">
                    <a href="https://www.facebook.com/enbreve" class="redes" target="_blank">
                        <font-awesome-icon class="iconos-redes" size="lg" :icon="{ prefix: 'fab', iconName: 'facebook-f' }"/>
                    </a>
                    <a href="https://www.twitter.com/enbreve" class="redes" target="_blank">
                        <font-awesome-icon class="iconos-redes" size="lg" :icon="{ prefix: 'fab', iconName: 'twitter' }"/>
                    </a>
                    <a href="https://www.instagram.com/enbreve" class="redes" target="_blank">
                        <font-awesome-icon class="iconos-redes" size="lg" :icon="{ prefix: 'fab', iconName: 'instagram' }"/>
                    </a>
                    <a href="https://www.youtube.com/enbreve" class="redes" target="_blank">
                        <font-awesome-icon class="iconos-redes" size="lg" :icon="{ prefix: 'fab', iconName: 'youtube' }"/>
                    </a>
                </b-col>
                <b-col md="4" lg="3" class="seccion d-none d-md-flex justify-content-end">
                    <a href="/contacto" class="links">Contáctanos</a>
                </b-col>
            </b-row>
        </b-container>
    </b-container>
</template>

<script>
import moment from 'moment'
import axios from 'axios'
    export default {
        data() {
            return {
                datetime: moment().locale('es').format('LLL'),
                temperaturaMin:'',
                temperaturaMax:'',
                iconoClima:''
            }
        },
        async created(){
            setInterval(() => {
                this.datetime = moment().locale('es').format('LLL')
            }, 1000);
            try {
                let {data} = await axios.get('https://api.openweathermap.org/data/2.5/weather?id=3526617&appid=819ca6d6d53493d0a05b2eacb6039365')
                this.temperaturaMin = Math.round(parseFloat(data.main.temp_min)-273.15);
                this.temperaturaMax = Math.round(parseFloat(data.main.temp_max)-273.15);
                this.iconoClima = data.weather[0].icon
            } catch (error) {
                console.log(error)
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '~#sass/_variables.scss';
    #container{
        background-color: $gray-light;
        padding: .4375rem 0rem;
        font-family: 'Poppins-Medium';
        font-size: .875rem;
        border-bottom: .125rem solid $dark;
        display: flex;
        align-items: center;
    }
    .seccion{
        display: flex;
        align-items: center;
    }
    .iconos{
        color: $rojo;
        margin-right: .3125rem;
    }
    .redes{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 1.875rem;
        width: 1.875rem;
        color: $dark;
    }
    .redes:hover{
        background-color: $rojo;
        color: $gray-light;
    }
    .iconos-redes{
        padding: .0625rem;
    }
    .links{
        margin-right: .625rem;
        color: $dark;
        cursor: pointer;
    }
    .links:hover{
        text-decoration: none;
        color: $rojo !important;
    }
    #iconoClima{
        width: 1.875rem;
    }
</style>