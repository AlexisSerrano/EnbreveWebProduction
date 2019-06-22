<template>
   <div v-if="ready">
		<eb-header class="mb"/>
		<banner :central="banners[0].imagen" class="mb"/>
		<b-container fluid>
			<b-container>
				<b-row>
					<b-col lg="9" class="d-flex flex-column">
						<h1 class="mb-0" id="titulo">{{item.titulo}}</h1>
						<span id="resumen" class="mb-1"  v-html="item.resumen"></span>
						<div id="fecha" class="mb-2">
							<font-awesome-icon class="iconos" icon="calendar-check"/>
							<span>{{fechaCreacion}}</span>
						</div>
						<social-sharing 
							:url="`http://enbreve.info/interior/${tipoItem}/${id}`"
							:title="item.titulo"
							hashtags="enbreve"
							twitter-user="enbreve"
							inline-template>
							<div class="d-flex mb-2">
								<network network="facebook" class="redes-interior facebook mr-1">
									<font-awesome-icon class="iconos-redes-back" size="lg" :icon="{ prefix: 'fab', iconName: 'facebook-f' }"/>
								</network>
								<network network="twitter" class="redes-interior twitter">
									<font-awesome-icon class="iconos-redes-back" size="lg" :icon="{ prefix: 'fab', iconName: 'twitter' }"/>
								</network>
							</div>
						</social-sharing>
						<b-carousel
						class="mb-3"
						id="carousel-interior"
						fade
						:interval="5000"
						:controls="fotos.length>1?true:false"
						:indicators="fotos.length>1?true:false"
						background="#ababab"
						img-width="960"
						img-height="540"
						style="text-shadow: 1px 1px 2px #333;"
						>
							<b-carousel-slide v-for="(foto,index) in fotos" :key="index"
							:img-src="foto"
							/>
						</b-carousel>
						<div class="mb-3" v-if="video">
							<b-embed
								type="iframe"
								aspect="16by9"
								:src="video"
								allowfullscreen
							></b-embed>
						</div>
						<!-- <span id="pie-foto" class="mb-3">Laboriosam quasi qui quaerat doloremque maiores optio nesciunt ipsam. </span> -->
						<autor v-if="tipoItem=='articulo'" :datosAutor="item" class="mb-3"/>
						<span id="descripcion" v-html="item.contenido"></span>
					</b-col>
					<b-col lg="3">
						<b-row class="flex-lg-column banners">
							<b-col>
								<banner :lateral="banners[1].imagen" class="mb"/>
							</b-col>
							<b-col>
								<banner :lateral="banners[2].imagen" class="mb"/>
							</b-col>
							<b-col>
								<banner :lateral="banners[3].imagen" class="mb"/>
							</b-col>
						</b-row>
					</b-col>
				</b-row>
				<separador :titulo="tipoItem=='noticia'?'Notas relacionadas':'Artículos relacionados'" class="separador mb"/>
				<b-row>
					<b-col md="6" lg="3" class="mb" v-for="relacionada in relacionadas" :key="relacionada.id">
						<noticia
							:tituloSize="tituloSize"
							:tagSize="tagSize"
							:item="relacionada"
							resize="600"
							:tipoItem="tipoItem=='articulo'?'articulo':'noticia'"
						/>
					</b-col>
				</b-row>
			</b-container>
		</b-container>

		<banner :izquierdo="banners[4].imagen" :derecho="banners[5].imagen" class="mb"/>

		<eb-footer/>

		<eb-terminos/>
   </div>
</template>

<script>
	import axios from 'axios'
	import EbHeader from '../components/Header'
	import EbFooter from '../components/Footer'
	import EbTerminos from '../components/Terminos'
	import Banner from '../components/Banner'
	import Noticia from '../components/Noticia'
	import Separador from '../components/Separador'
	import {urlApi} from '../urlBase'
	import Autor from '../components/Autor'
	import moment from 'moment'
	import {urlStorage} from '../urlBase'
	export default {
		components:{
			EbHeader,
			EbFooter,
			EbTerminos,
			Banner,
			Noticia,
			Separador,
			Autor
		},
		props:['tipoItem','id'],
		data() {
			return {
				ready:false,
				item:{},
				banners: {},
				fechaCreacion:'',
				url:urlStorage,
				fotos:[],
				video:''
			}
		},
		async created(){
			//traemos la noticia o articulo
			let tipoItem = this.tipoItem
			let urlGetItem = tipoItem=='noticia'?'/getNoticia':'/getArticulo'
			let {data} = await axios.post(`${urlApi}${urlGetItem}`,{
				id:this.id,
			})
			this.item = tipoItem=='noticia'?data.noticia:data.articulo
			let urlPrincipal = this.resize(this.item.imagen)
			this.fotos.push(urlPrincipal)
			if(tipoItem=='noticia'){
				let fotos = Object.values(data.multimedia.fotos)
				let urls = fotos.map(elemento=>{
					return this.resize(elemento.url)
				})
				this.fotos.push(...urls)
				this.video = data.multimedia.video?data.multimedia.video.url:null
			}
			this.fechaCreacion = moment(this.item.created_at).locale('es').format('LLL')
			this.relacionadas = data.relacionadas
			//traemos los banners
			let banners = await axios.post(`${urlApi}/getBannersHome`,{
				arregloBanners:[15,16,17,18,19,20],
			})
			this.banners = banners.data
			this.ready = true
		},
		methods:{
			resize(imagen){
				let partes = imagen.split('.')
				let src = partes[0]
				let formato = partes[1]
				return `${this.url}${src}_900.${formato}`
			}
		},
        computed:{
            tagSize(){
                return this.$mq === 'md' || this.$mq==='lg'?'.6rem':'.8rem'
            },
            tituloSize(){
               return this.$mq==='xs'?'1.2rem':this.$mq==='sm'?'1rem':this.$mq==='md'?'.7rem':'.8rem' 
            }
        }
	}
</script>

<style lang="scss">
	@import '~#sass/_variables.scss';
    .redes-interior{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 1.875rem;
        width: 1.875rem;
		color: $gray-light;
		cursor: pointer;
	}
	.facebook{
		background-color: #3b5998;
	}
	.twitter{
		background-color: #00aced;
	}
    .iconos-redes{
        padding: .125rem;
	}
</style>


<style lang="scss" scoped>
	@import '~#sass/_variables.scss';
	#titulo{
		font-size: 1.875rem;
		color: $dark;
		font-family: 'Poppins-ExtraBold';
	}
	#resumen{
		font-family: 'Poppins-Medium';
		color: $dark;
	}
	#descripcion{
		font-family: 'Poppins-Regular';
		font-size: .9rem;
		color: $dark;
	}
    .iconos{
        color: $gray;
        margin-right: .3125rem;
    }
	#fecha{
		font-family: 'Poppins-Regular';
		font-size: .875rem;
		color: $gray;
	}
	#pie-foto{
		font-family: 'Poppins-Light';
		color: $gray;
		font-size: .85rem;
	}
	.banners{
		position: -webkit-sticky;
		position: sticky;
		top: 0rem;
	}
</style>

