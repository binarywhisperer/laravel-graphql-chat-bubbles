import Vue from 'vue';

import ChatBubbles from './components/ChatBubbles';

import { HttpLink } from "apollo-link-http";
import { ApolloClient } from "apollo-client";
import { InMemoryCache } from "apollo-cache-inmemory";
import { ApolloLink } from "apollo-link";

import VueApollo from "vue-apollo";

const httpLink = new HttpLink({
    uri: "/graphql"
});

const apolloClient = new ApolloClient({
    link: httpLink,
    cache: new InMemoryCache()
});

const middlewareLink = new ApolloLink((operation, forward) => {
    operation.setContext({
        headers: {
            authorization: localStorage.getItem("token") || null
        }
    });
    return forward(operation);
});

//const link = middlewareLink.concat(httpLink);

Vue.use(VueApollo);

const apolloProvider = new VueApollo({
    defaultClient: apolloClient
});

Vue.config.productionTip = false;

const chatBubbles = new Vue({
    el: '#chat-bubbles',
    components: {
        ChatBubbles
    },
    apolloProvider,
    data(){
        return {
            channel: 1
        }
    }
});
