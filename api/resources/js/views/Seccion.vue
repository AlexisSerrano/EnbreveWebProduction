<template>
   <div v-if="ready">
	   <eb-header class="mb"/>
		<banner :central="banners[0].imagen" class="mb"/>
		<seccion-container v-if="!busqueda" :items="principales" :nombre="seccion" class="mb" :tipoItem="seccion=='articulos'?'articulo':'noticia'"/>
		<b-container>
			<b-row>
				<b-col lg="9">
					<h5 v-if="busqueda">
						{{generales.length==0?`No existen resultados para: `:'Resultados encontrados para: '}}{{busqueda}}
					</h5>
					<hr v-if="busqueda"/>
					<b-row>
						<transition-group name="fade" tag="span" class="d-flex flex-wrap w-100">
							<b-col md="6" lg="4" class="mb" v-for="item in generales" :key="item.id">
								<noticia
									ref="noticias"
									:tituloSize="tituloSize"
									:tagSize="tagSize"
									:item="item"
									:tipoItem="seccion=='articulos'?'articulo':'noticia'"
									resize="300"
								/>
							</b-col>
						</transition-group>
					</b-row>
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
		</b-container>

		<banner :izquierdo="banners[4].imagen" :derecho="banners[5].imagen" class="mb"/>

		<eb-footer/>

		<eb-terminos/>
   </div>
</template>

<script>
	import axios from 'axios'
	import EbFooter from '../components/Footer'
	import EbHeader from '../components/Header'
	import EbTerminos from '../components/Terminos'
	import Banner from '../components/Banner'
	import Noticia from '../components/Noticia'
	import SeccionContainer from '../components/Seccion'
	import {urlApi} from '../urlBase'
	export default {
		name:'seccion',
		components:{
			EbHeader,
			EbFooter,
			EbTerminos,
			Banner,
			Noticia,
			SeccionContainer
		},
		props:['seccion','busqueda'],
		data() {
			return {
				ready:false,
				banners: {},
				principales:[],
				generales:[],
				cantidadNotas:23,
				consultando:true,
				limiteNotas:100,
				pagina:1,
			}
		},
		async mounted(){
			await this.getItems()
			window.onscroll = () =>
			{
				if(this.$refs.noticias && this.$refs.noticias.length>=12 && this.consultando==false){
					let lengthRefs = this.$refs.noticias.length-12
					let element = this.$refs.noticias[lengthRefs].$el
					var y = 0;
					while (element.offsetParent) {
						y += element.offsetTop;
						element = element.offsetParent;
					}
					if(window.scrollY>=y){
						this.consultando = true
						this.getItems()
					}
				}
			}
			await this.getBanners()
			this.ready = true
		},
		beforeDestroy(){
			window.onscroll = null
		},
		methods:{
			async getBanners(){
				let banners = await axios.post(`${urlApi}/getBannersHome`,{
					arregloBanners:[8,9,10,11,12,13],
				})
				this.banners = banners.data
			},
			async getItems(){
				let {data} = await axios.post(`${urlApi}/${this.busqueda?'getBusqueda':this.seccion=='articulos'?'getAllArticulos':'getAllNoticiasSeccion'}`,{
					pagina:this.pagina,
					seccion:this.seccion=='sociales'?1:this.seccion=='cultura'?2:this.seccion=='articulos'?'articulos':'',
					busqueda:this.busqueda
				})
				if(data.length>0){
					if(this.pagina==1 && !this.busqueda){
						this.principales = data.slice(0,8)
						this.generales = data.slice(8,data.length)
					}else{
						this.generales.push(...data)
					}
				}else{
					window.onscroll = null
				}
				this.pagina++
				this.consultando = false
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

<style lang="scss" scoped>
	@import '~#sass/_variables.scss';
	.banners{
		position: -webkit-sticky;
		position: sticky;
		top: 0rem;
	}
	hr{
		background-color: $rojo;
		border: .125rem solid $rojo;
		width: 100%;
		margin-top: .625rem;
    }
</style>

