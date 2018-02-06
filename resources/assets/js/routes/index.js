import Vue from 'vue'
import Router from 'vue-router'

// Views
import HomeView from '../components/HomeView'
import ListTopic from '../components/views/ListTopic';
import TopicDetail from '../components/views/TopicDetail';
import NotFound from '../components/views/NotFound'

Vue.use(Router)

export default new Router({
	routes: [
		{ path: '/', name: 'Home', component: HomeView },
		{ path: '/category/:categoryId', name: 'ListTopic', component: ListTopic },
		{ path: '/topic/:topicId', name: 'TopicDetail', component: TopicDetail, props: true },
		{ path: '*', component: NotFound}
    ],

    mode: 'history'
})
