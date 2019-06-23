<template>
	<div>
		<eb-header class="mb"/>
		<b-container fluid>
			<b-container>
					<separador titulo="contacto" class="mb-3"/>
					<b-row class="justify-content-center mb">
						<b-col md="10" class="text-center">
							<span id="descripcion">Medio de comunicación en línea con información social y cultural de Xalapa, artículos de interés general y cartelera de eventos.</span>
						</b-col>
					</b-row>
					<b-row class="mb justify-content-center">
						<b-col md="4" cols="6" class="d-flex flex-column align-items-center justify-content-center mt-md-0 mt-3">
							<div class="rounded-circle bg-white circulo shadow-sm mb-3">
								<font-awesome-icon rotation="90" size="2x" class="iconos" icon="phone"/>
							</div>
							<span class="titulo-contacto">Llámanos</span>
							<span class="info">(044) 228-424-8919</span>
						</b-col>
						<b-col md="4" cols="6" class="d-flex flex-column align-items-center justify-content-center mt-md-0 mt-3">
							<div class="rounded-circle bg-white circulo shadow-sm mb-3">
								<font-awesome-icon size="2x" class="iconos" icon="envelope"/>
							</div>
							<span class="titulo-contacto">Escríbenos</span>
							<span class="info">info@enbreve.info</span>
							<span class="info">contacto@enbreve.info</span>
						</b-col>
					</b-row>
					<b-row id="formContainer" class="justify-content-center pt-3 pb-4 mb"
						:style="`backgroundImage:url(${require('#img/xalapa.jpg')})`"
					>
						<b-col md="12" class="text-center">
							<span id="titulo">ANÚNCIATE CON NOSOTROS</span>
						</b-col>
						<b-col md="5">
							<b-form>
								<b-form-group id="input-group-nombre" class="label-input" label="Nombre:" label-for="nombre">
									<b-form-input autocomplete="off" size="sm" class="input" id="nombre" required></b-form-input>
								</b-form-group>
								<b-form-group id="input-group-empresa" class="label-input" label="Empresa:" label-for="empresa">
									<b-form-input autocomplete="off" size="sm" class="input" id="empresa" required></b-form-input>
								</b-form-group>
								<b-form-group id="input-group-telefono" class="label-input" label="Teléfono:" label-for="telefono">
									<b-form-input autocomplete="off" size="sm" class="input" id="telefono" required></b-form-input>
								</b-form-group>
							</b-form>
						</b-col>
						<b-col md="5" lg="4" class="ml-0 ml-md-4 d-flex flex-column">
							<b-form>
								<b-form-group id="input-group-email" class="label-input" label="Correo electrónico:" label-for="email">
									<b-form-input autocomplete="off" size="sm" class="input" id="email" type="email" required></b-form-input>
								</b-form-group>
								<b-form-group id="input-group-mensaje" class="label-input" label="Mensaje:" label-for="mensaje">
									<b-form-textarea no-resize autocomplete="off" size="sm" class="input" id="mensaje" rows="5" required></b-form-textarea>
								</b-form-group>
							</b-form>
							<b-button variant="danger" size="sm" class="botonContacto mt-1 px-3 align-self-center">Enviar</b-button>
						</b-col>
					</b-row>
					<b-row class="mb">
						<b-col md="3" cols="6" class="d-flex flex-column align-items-center justify-content-center mt-md-0 mt-3">
							<a href="https://www.facebook.com/enbreve" class="rounded-circle bg-white circulo shadow-sm mb-3">
								<font-awesome-icon class="iconos" size="2x" :icon="{ prefix: 'fab', iconName: 'facebook-f' }"/>
							</a>
							<span class="titulo-contacto">Facebook</span>
						</b-col>
						<b-col md="3" cols="6" class="d-flex flex-column align-items-center justify-content-center mt-md-0 mt-3">
							<a href="https://www.twitter.com/enbreve" class="rounded-circle bg-white circulo shadow-sm mb-3">
								<font-awesome-icon class="iconos" size="2x" :icon="{ prefix: 'fab', iconName: 'twitter' }"/>
							</a>
							<span class="titulo-contacto">Twitter</span>
						</b-col>
						<b-col md="3" cols="6" class="d-flex flex-column align-items-center justify-content-center mt-md-0 mt-3">
							<a href="https://www.instagram.com/enbreve" class="rounded-circle bg-white circulo shadow-sm mb-3">
								<font-awesome-icon class="iconos" size="2x" :icon="{ prefix: 'fab', iconName: 'instagram' }"/>
							</a>
							<span class="titulo-contacto">Instagram</span>
						</b-col>
						<b-col md="3" cols="6" class="d-flex flex-column align-items-center justify-content-center mt-md-0 mt-3">
							<a href="https://www.youtube.com/enbreve" class="rounded-circle bg-white circulo shadow-sm mb-3">
								<font-awesome-icon class="iconos" size="2x" :icon="{ prefix: 'fab', iconName: 'youtube' }"/>
							</a>
							<span class="titulo-contacto">Youtube</span>
						</b-col>
					</b-row>
			</b-container>
		</b-container>
		<eb-terminos/>
	</div>
</template>

<script>
	import EbTerminos from '../components/Terminos'
	import EbHeader from '../components/Header'
	import Separador from '../components/Separador'
	export default {
		components:{
			EbHeader,
			EbTerminos,
			Separador
		}
	}
</script>

<style lang="scss" scoped>
	@import '~#sass/_variables.scss';
	.titulo-contacto{
		font-size: 1.2rem;
		font-family: 'Poppins-Bold';
	}
	.iconos{
		color: $rojo;
		min-width: 2rem;
	}
	.circulo{
		padding: 2.5rem;
		cursor: pointer;
	}
	.circulo:hover{
		transform: translateY(-5px);
	}
	.circulo:hover .iconos{
		color: $dark;	
	}
	#formContainer{
		background-size: cover;
		background-position: center;
		box-shadow: 0rem 0rem 1.125rem 0rem #79797970;
	}
    #titulo{
        color: $gray-light;
        font-family: 'Poppins-Bold';
        font-size: 1.5625rem;
    }
	.info{
		font-family: 'Poppins-Light';
	}
    .botonContacto{
        margin-top: 1.25rem;
        font-size: .875rem;
	}
	.label-input{
		color: $gray-light;
		font-family: 'Poppins-Regular';
	}
	.input{
		background-color: transparent;
		border: .125rem solid $gray-light;
		color: $gray-light;
	}
    .botonContacto{
        font-size: .875rem;
		font-family: 'Poppins-SemiBold';
    }
	#descripcion{
		font-family: 'Poppins-Regular'
	}
</style>
