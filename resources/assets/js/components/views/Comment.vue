<style scoped>
.thumbnail {
    padding:0px;
}
.panel {
	position:relative;
}
.panel>.panel-heading:after,.panel>.panel-heading:before{
	position:absolute;
	top:11px;left:-16px;
	right:100%;
	width:0;
	height:0;
	display:block;
	content:" ";
	border-color:transparent;
	border-style:solid solid outset;
	pointer-events:none;
}
.panel>.panel-heading:after{
	border-width:7px;
	border-right-color:#f7f7f7;
	margin-top:1px;
	margin-left:2px;
}
.panel>.panel-heading:before{
	border-right-color:#ddd;
	border-width:8px;
}
</style>
<template>
<div class="row">
	<div class="col-sm-11" style="margin-left:30px">
		<textarea  ref="commentBox"  @keyup.enter="postComment" class="form-control " v-model="message" rows="2" id="comment">{{ message }}</textarea>
		<input type="hidden" name="userId" value="1" v-model="userId"/>
	</div>
	<div class="listComment" v-for="comment in comments">
		<div class="col-sm-1" style="margin-top:15px; margin-left:30px">
			<div class="thumbnail">
				<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
			</div>
		</div>
		<div class="col-sm-10" style="margin-top:15px">
			<div class="panel panel-default">
				<div class="panel-heading">
				<strong>myusername</strong> <span class="text-muted">{{ comment.created_at | moment("from") }}</span>
					</div>
				<div class="panel-body">
					{{ comment.body }}
				</div>
			</div>
		</div>
	</div>
	<a v-if="display" @click="loadMore()"style="float:left; margin-left:50px;" href="javascript:void(0)">Load more...</a>
</div>
</template>

<script>
	export default {
		data ()
		{
			return {
				message : '',
				userId : 1,
				comments: [],
				pagination: [],
				page: 1,
				display: true,
			}
		},
		mounted()
		{
			this.getComments(this.page);
		},
		methods: {
			getComments : function (page) {
				axios.get('/api/comments/' + this.$route.params.topicId).then((response) => {
					this.comments = response.data.data;
					this.pagination = response.data;
					this.page = response.current_page;
					if (this.pagination.last_page == 1) {
						this.display = false;
					}
				});
			},

			postComment : function () {
				let that = this;
				let comments = this.comments;
				axios.post('/api/comments', {
					body: this.message,
					user_id : this.userId,
					topic_id : this.$route.params.topicId,
				}).then(function (response) {
					comments.unshift(response.data);
					that.message = "";
				})
			},

			loadMore : function () {
				let that = this;
				that.page = that.pagination.current_page+1;
				axios.get('/api/comments/' + this.$route.params.topicId + '?page=' + that.page).then((response) => {
					that.comments = that.comments.concat(response.data.data);
					that.pagination = response.data;
					that.page = response.data.current_page;
					if (that.page == response.data.last_page) {
						that.display = false;
					}
				});
			}
		}
	}
</script>