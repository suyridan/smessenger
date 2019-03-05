import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
state: {
    messages: [],
    selectedConversation: null,
    conversations: [],
    contactSearch: '',
    user: null
},
mutations: {
    newMessagesList(state, messages){
        state.messages = messages;
    },
    addMessage(state, message){
        const conversation = state.conversations.find((conversation) => {
            return conversation.contact_id == message.from_id 
            || conversation.contact_id == message.to_id;
        });

        const author = state.user.id === message.from_id ? 'Tú' : conversation.contact_name;

        conversation.last_message = `${author}: ${message.content}`;
        conversation.last_time = message.created_at;

        if(state.selectedConversation.contact_id == message.to_id 
        || state.selectedConversation.contact_id == message.from_id ){
            state.messages.push(message);
        }
    },
    selectConversation(state, conversation){
        state.selectedConversation = conversation;
    },
    updateSearch(state, newValue){
        state.contactSearch = newValue;
    },
    newConversationsList(state, conversations){
        state.conversations = conversations;
    },
    setUser(state, user){
        state.user = user;
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
                context.commit('newConversationsList',response.data);
            });
    },
    postMessage(context,newMessage){
        const param = {
            to_id: context.state.selectedConversation.contact_id,
            content: newMessage
        };
        axios.post('api/messages/store',param)
            .then((response) => {
                if(response.data.success){
                    const message = response.data.message;
                    message.written_by_me = true;
                    context.commit('addMessage',message);
                }
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