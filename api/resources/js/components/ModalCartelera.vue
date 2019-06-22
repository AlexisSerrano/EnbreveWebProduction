<template>
    <b-modal
        centered
        v-model="$store.state.showModal" 
        id="bv-modal-example"
        hide-footer
        no-close-on-backdrop
        no-close-on-esc
        @close="$store.commit('ocultarModal')"
    >
        <template slot="modal-title">
            <span id="tituloModal">{{$store.state.cartel.titulo}}</span>
        </template>
        <div class="d-block text-center">
        <b-img fluid :src="`${url}${$store.state.cartel.imagen}`"></b-img>
        </div>
        <b-button id="buttonClose" class="mt-3" variant="danger" block @click="$store.commit('ocultarModal')">Cerrar cartel</b-button>
    </b-modal>
</template>

<script>
	import {urlStorage} from '../urlBase'
    export default {
        data() {
            return {
                url: urlStorage
            }
        },
    }
</script>

<style lang="scss" scoped>
    #buttonClose{
        font-family: 'Poppins-SemiBold';
    }
    #tituloModal{
      font-family: 'Poppins-SemiBold';  
    }
</style>

