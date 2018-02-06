<template>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3><strong>
				<router-link :to="{ name: 'ListTopic', params: { categoryId: category.id , categoryName: category.name } }" v-text="category.name"></router-link>
            </strong></h3>
        </div>
        <div class="panel-body">
            <strong>{{ category.description }}</strong>
        </div>
        <div class="panel-footer">
            <span>{{ category.numberOfTopics }}</span>
            <small>Topic</small>
        </div>    </div>
</template>

<script>
export default {
    props: ['category']
}
</script>