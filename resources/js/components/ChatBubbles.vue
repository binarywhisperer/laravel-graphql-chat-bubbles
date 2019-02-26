<template>
    <section class="chat-bubbles">
        <div class="chat-bubbles__channels">
            <channels></channels>
        </div>
        <div class="chat-bubbles__chat">
            <channel-header></channel-header>
            <messages></messages>
            <panel></panel>
        </div>
    </section>
</template>

<script>
    import Messages from './Messages';
    import ChannelHeader from './ChannelHeader';
    import Channels from './Channels';
    import Panel from './Panel';
    import Profile from './Profile';

    import gql from 'graphql-tag';
    import { USERS_QUERY } from "../graphql";

    export default {
        name:'ChatBubbles',
        components:{
            Messages,
            ChannelHeader,
            Channels,
            Panel,
            Profile
        },
        data(){
            return {
                currentChannel: 1
            }
        },
        apollo: {
            users:{
                query: USERS_QUERY
            }
        },
        methods:{
          setCurrentChannel(id){
              this.currentChannel = id;
          }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss" scoped>
    .chat-bubbles{
        position:absolute;
        width: 100vw;
        height: 100vh;
        display: flex;
        align-items: stretch;

        &__channels{
            height: 100vh;
        }

        &__chat{
            flex-grow: 1;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

    }

</style>
