<template>
	<div>
		<topic v-for="topic in topics" :topic="topic" :key="topic.id"></topic>
		<pagination :pagination="pagination" @click.native="getTopics(pagination.current_page)" ></pagination>
	</div>
</template>
<script>
	import Topic from './Topic.vue';
	import Pagination from './Pagination.vue';

	export default {
		components: { Topic, Pagination},

		data ()
		{
			return {
				topics: [],
				counter: 0,
            	pagination: {
	                total: 2,
	                per_page: 1,
	                from: 1,
	                to: 2,
	                current_page: 1
            	},
	            offset: 2
			}
		},
		created() {
			this.getTopics(this.pagination.current_page);
		},

		mounted()
		{
			if(localStorage.getItem(window.KEY) !== null ) {
				let locaPage = localStorage.getItem(window.KEY);
				this.getTopics(locaPage);
			}
		},
		watch: {
			topics: function() {
				let breadcrumb = this.topics[0].breadcrumb
	    		        breadcrumb.pop()
				this.$emit('update-breadcrumb', breadcrumb)
			}
		},

		methods: {
			getTopics: function (page) {
				axios.get('/api/categories/' + this.$route.params.categoryId + '/topics?page='+page)
				.then((response) => {
					this.topics = response.data.data;
                    this.pagination = response.data;
                    localStorage.setItem(window.KEY, page);
				})
			}
		}
	}
</script>