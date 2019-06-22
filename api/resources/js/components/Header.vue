<template>
    <div id="headerContainer">
        <top-header/>
        <b-container fluid>
            <b-container id="logoContainer">
                <b-img id="logo" src="http://enbreve.info/img/logo.png" class="py-3"></b-img>
            </b-container>
        </b-container>
       <navbar/>  
    </div>
</template>

<script>
import TopHeader from './TopHeader'
import Navbar from './Navbar'
    export default {
		components:{
            TopHeader,
            Navbar
		}
    }
</script>

<style lang="scss" scoped>
    #headerContainer{
        background-color: white;
    }
    #logoContainer{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #logo{
        width: 11rem;
    }
</style>