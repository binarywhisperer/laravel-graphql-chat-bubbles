import Vue from 'vue';

import Bubbles from './components/Bubbles';
import Channel from './components/Channel';
import Panel from './components/Panel';



const chatBubbles = new Vue({
    el: '#chat-bubbles',
    components: {
        Bubbles,
        Channel,
        Panel
    },
    data(){
        return {
            channel: 1
        }
    }
});
