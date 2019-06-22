<template>
    <div>
        <b-container v-if="central">
            <b-row>
                <b-col>
                    <b-img fluid :src="`${url}${central}`"/>
                </b-col>
            </b-row>
        </b-container>
        <b-container v-else-if="izquierdo && derecho">
            <b-row>
                <b-col class="mb-3 mb-md-0" md="6">
                    <b-img fluid :src="`${url}${izquierdo}`"/>
                </b-col>
                <b-col md="6">
                    <b-img fluid :src="`${url}${derecho}`"/>
                </b-col>
            </b-row>
        </b-container>
        <b-img v-else-if="lateral" fluid :src="`${url}${lateral}`"/>
    </div>
</template>

<script>
	import {urlStorage} from '../urlBase'
    export default {
        props:['central','izquierdo','derecho','lateral'],
        data() {
            return {
                url: urlStorage
            }
        },
    }
</script>