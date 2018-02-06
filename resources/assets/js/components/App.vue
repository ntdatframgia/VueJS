<template>
	<div class="container">
		<h1>
			SPA-FORUM <small> với Laravel + Vue.js</small>
		</h1>
		<breadcrumb :breadcrumb="breadcrumb"></breadcrumb>
		<router-view @update-breadcrumb="updateBreadcrumb"></router-view>
	</div>
</template>
<script>
const KEY ="spa-laravel";
import Breadcrumb from './Breadcrumb.vue';
export default {
	components: { Breadcrumb },
	data () {
		return {
			breadcrumb: []
		}
	},
	methods: {
		updateBreadcrumb (breadcrumb) {
			this.breadcrumb = breadcrumb
		}
	}
}
</script>
