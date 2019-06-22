<template>  
    <b-container>
        <b-row>
            <b-col id="separador">
                <hr/>
                <h1 id="titulo" class="text-nowrap" :style="color?`color:${color}`:''">{{titulo?titulo.toUpperCase():''}}</h1>
                <hr/>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
    export default {
        props:['titulo','color']
    }
</script>

<style lang="scss" scoped>
    @import '~#sass/_variables.scss';
	#separador{
		color: $dark;
		font-family: 'Poppins-ExtraBold';
		display: flex;
		justify-content: center;
        align-items: center;
        padding: 0;
	}
	hr{
        background-color: $rojo;
        border: .1875rem solid $rojo;
        width: 100%;
    }
    #titulo{
        font-size: 1.875rem;
        margin: 0rem .9375rem;
    }
</style>