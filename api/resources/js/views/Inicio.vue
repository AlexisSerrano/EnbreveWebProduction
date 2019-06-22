<template>
   <div v-if="ready" id="homeContainer">
		<eb-header class="mb"/>
		
		<banner :central="items.banners[0].imagen" class="mb"/>

		<seccion :items="items.seccion[0]" nombre="sociales" :slider="true" class="mb" tipoItem="noticia"/>

		<banner :izquierdo="items.banners[1].imagen" :derecho="items.banners[2].imagen" class="mb"/>

		<canal-youtube :items="items.seccion[0]" class="mb"/>

		<seccion :items="items.seccion[1]" nombre="cultura"  :slider="true" class="mb" tipoItem="noticia"/>

		<banner :izquierdo="items.banners[3].imagen" :derecho="items.banners[4].imagen" class="mb"/>

		<banner-contacto class="mb"/>

		<modal-cartelera v-if="$store.state.showModal"/>

		<articulos-cartelera :articulos="items.articulos" :cartelera="items.carteles" class="mb"/>

		<banner :izquierdo="items.banners[5].imagen" :derecho="items.banners[6].imagen" class="mb"/>

		<eb-footer/>

		<eb-terminos/>
   </div>
</template>

<script>
	import axios from 'axios'
	import EbHeader from '../components/Header'
	import EbFooter from '../components/Footer'
	import EbTerminos from '../components/Terminos'
	import CanalYoutube from '../components/CanalYoutube'
	import Seccion from '../components/Seccion'
	import Banner from '../components/Banner'
	import BannerContacto from '../components/BannerContacto'
	import ArticulosCartelera from '../components/Articulos-Cartelera'
	import {urlApi} from '../urlBase'
	import ModalCartelera from '../components/ModalCartelera'
	export default {
		components:{
			EbHeader,
			EbFooter,
			EbTerminos,
			Seccion,
			Banner,
			BannerContacto,
			CanalYoutube,
			ArticulosCartelera,
			ModalCartelera
		},
		data() {
			return {
				ready:false,
				items: {}
			}
		},
		async created(){
			let {data} = await axios.post(`${urlApi}/getItemsHome`,{
				arregloBanners:[1,2,3,4,5,6,7],
				secciones:[
					{
						seccion:1,
						cantidadNotas:16
					},
					{
						seccion:2,
						cantidadNotas:16
					}
				],
				cantidadArticulos:9,
				cantidadCarteles:4
			})
			this.items = data
			this.ready = true
		}
	}
</script>

<style lang="scss" scoped>
	@import '~#sass/_variables.scss';
	.banner{
		height: 7.625rem;
		color: $gray-light;
		background-color: $gray-dark;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.derecho{
		margin-left: .625rem;
	}
	.izquierdo{
		margin-right: .625rem;
	}
</style>

