<template>
    <div class="panel panel-success">
        <div class="panel-heading">
            <router-link :to="{ name: 'TopicDetail', params: { topicId: topic.id } }" v-text="topic.title"></router-link>
        </div>
        <div class="panel-body">
            <span>{{ topic.title }}</span>
            <span>{{ topic.body }}</span><br/>
            <span>By {{ topic.names }}</span>
            <span>{{ topic.created_at | moment("from")  }}</span>
        </div>
        <div class="panel-footer">
            <span>{{ topic.views | largeNumber}}</span>
            <small>Views</small>
        </div>
    </div>
</template>

<script>
export default {
  props: ['topic'],
}
</script>