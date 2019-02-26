<template>
    <div class="channel-header">
            <div v-if="!$apollo.loading" class="channel-header__name">{{ channels[0].name }}</div>
            <div v-if="!$apollo.loading" class="channel-header__purpose">{{ channels[0].purpose }}</div>
    </div>
</template>

<script>
    import { CHANNEL_QUERY } from "../graphql";
    import gql from "graphql-tag";

    export default {
        name:'ChannelHeader',
        apollo: {
            channels: {
                query: CHANNEL_QUERY,
                variables(){
                    return {
                        id:  this.$parent.currentChannel
                    }
                }
            }
        },
        methods:{

        },
        mounted() {
            console.log('Channel Header mounted.')
        }
    }
</script>

<style lang="scss" scoped>
    @import 'global';
    .channel-header{
        height: 5vh;
        padding: 0 5vw;
        background: $blue;
        color: $darkBlue;
        display:flex;
        align-items: center;
        &__name{
            font-size: 2rem;
        }

        &__purpose{
            padding: 5px 5vw;
        }
    }
</style>
