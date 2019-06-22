import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    showModal:false,
    cartel:''
  },
  mutations: {
    mostrarModal(state,payload){
      state.showModal = true
      state.cartel = payload.cartel
    },
    ocultarModal(state){
      state.showModal = false
      state.cartel = ''
    }
  },
  actions: {

  }
})
