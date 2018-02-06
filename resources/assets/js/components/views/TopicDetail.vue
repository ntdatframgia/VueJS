<template>
    <div v-if="detailTopic" class="panel panel-success">
       <div class="panel-heading">
           <h2>{{ detailTopic.title }}</h2>
       </div>
       <div class="panel-body">
            <span>{{ detailTopic.body}} </span><br/>
            <span>by {{ detailTopic.names }}</span>
            <span>{{ detailTopic.time }}</span>
       </div>
       <div class="panel-footer">
           <span>{{ detailTopic.views}}</span>
           <small>Lượt xem</small>
       </div>
    </div>
    
</template>

<script>
export default {
    data: function() {
    return {
        detailTopic:null,
        }
    },
    created() {
      this.detailTopic = JSON.parse(localStorage.getItem(window.KEY) || '[]');
      console.log(this.detailTopic);
    },
    mounted() {
            this.getDetails(this.$route.params.topicId);
    },
    watch: {
            detailTopic: function() {
                let breadcrumb = this.detailTopic.breadcrumb
                this.$emit('update-breadcrumb', breadcrumb)
            }
        },
    methods: {
    getDetails: function (id) {
        axios.get('/api/topics/' + id).then((response) => {
            this.detailTopic = response.data;
        })
    }
  }
}
</script>
