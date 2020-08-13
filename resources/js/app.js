/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')
window.Vue = require('vue');
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)
Vue.component('message-component',require('./components/Message.vue').default)
Vue.prototype.$userId = document.querySelector("meta[name='user_id']").getAttribute('content');
/**(
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:{
        message:'',
        chat:{
            message:[],
            user:[],
            isActive:[],
            time:[]
        }
    },
    methods:{
        send(){
            if (this.message.length != 0){
                var id = window.location.href.split('/').pop();
                this.chat.message.push(this.message)
                this.chat.isActive.push(true)
                this.chat.time.push(this.getTime())
                axios.post('/chat',{
                    user_id:id,
                    message: this.message,
                })
                    .then(response =>{
                        this.chat.user.push(response.data)
                })
                    .catch(error=>{
                        console.log(error);
                    });
                this.message = ''
            }
        },
        getTime(){
            let time = new Date().toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })
            return time;
        }
    },
    mounted() {
        Echo.channel('chat-message')
            .listen('.chat-messages-'+this.$userId, (e) => {
                this.chat.message.push(e.message)
                this.chat.user.push(e.user)
                this.chat.isActive.push(false)
                this.chat.time.push(this.getTime())
            });
    }
});
