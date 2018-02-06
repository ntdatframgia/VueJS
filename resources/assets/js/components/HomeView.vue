<template>
    <div class="container" >
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <category v-for="category in categories" :category="category" :key="category.id"></category>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Category from './views/Category.vue';
    export default {
        components: { Category },

        data() {
            return {
                categories:[]
            }
        },
        mounted() {
            axios.get('api/categories').then((response) => {
                this.categories = response.data;
            });
            let breadcrumb = [{
                name: 'Categories',
                link: '/'
            }]
            this.$emit('update-breadcrumb', breadcrumb)
        }
    }
</script>
