/**
 * Dependencies
 */

require('./bootstrap');

import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import store from './store';

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
Vue.component('status-comp', require('./components/StatusComp.vue').default);
Vue.component('profile-edit-comp', require('./components/profile/Edit.vue').default);
Vue.component('contact-form-comp', require('./components/ContactFormComp.vue').default);

/**
 * Instance
 */

const app = new Vue({
    el: '#app',
    store,
    methods: {
        logout(){
            document.getElementById("logout-form").submit();
        }
    }
});
