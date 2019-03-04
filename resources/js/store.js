import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
state: {
    messages: [],
    selectedConversation: null,
    conversations: [],
    contactSearch: ''
},
mutations: {
    newMessagesList(state, messages){
        state.messages = messages;
    },
    addMessage(state, messages){
        state.messages.push(message);
    },
    selectConversation(state, conversation){
        state.selectedConversation = conversation;
    },
    updateSearch(state, newValue){
        state.contactSearch = newValue;
    },
    newConversationsList(state, conversations){
        state.conversations = conversations;
    }
},
actions: {
    getMessages(context, conversation){
        context.commit('selectConversation', conversation);
        axios.get(`/api/messages?contact_id=${conversation.contact_id}`)
            .then(response => {
                context.commit('newMessagesList',response.data);
        });
    },
    getConversations(context){
        axios.get('api/conversations')
            .then((response) => {
                context.commit('newContactsList',response.data);
            });
    }
},
getters: {
    conversationsFiltered(state){
        return state.conversations.filter(
            (conversation) => 
                conversation.contact_name
                .toLowerCase()
                .includes(state.contactSearch.toLowerCase())
        );
    }
}
})