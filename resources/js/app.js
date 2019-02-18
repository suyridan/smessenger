/**
 * Dependencies
 */

require('./bootstrap');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue);

Vue.prototype.$http = window.axios;

/**
 * Vue components
 */

Vue.component('messenger-comp', require('./components/MessengerComp.vue').default);
Vue.component('contact-comp', require('./components/ContactComp.vue').default);
Vue.component('contact-list-comp', require('./components/ContactListComp.vue').default);
Vue.component('active-conversation-comp', require('./components/ActiveConversationComp.vue').default);
Vue.component('message-conversation-comp', require('./components/MessageConversationComp.vue').default);

/**
 * Instance
 */

const app = new Vue({
    el: '#app',
    methods: {
        logout(){
            document.getElementById("logout-form").submit();
        }
    }
});
