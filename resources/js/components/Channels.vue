<template>
    <div class="channels-container">
        <header>
            <figure>
                <img src="/logo.png"/>
            </figure>
        </header>
        <main>
            <ul>
                <li v-for="channel in channels" :key="`channels${channel.id}`" :class="{active: ($parent.currentChannel == channel.id)}"@click="selectChannel(channel.id)"># {{ channel.name }}</li>
                <!--<hr>
                <li v-for="user in users" :key="`user${user.id}`" @click="selectUser(user.id)">{{ user.display }}</li>-->
            </ul>
        </main>
    </div>
</template>

<script>
    import { USERS_QUERY, CHANNELS_QUERY } from "../graphql";

    export default {
        name:'Channels',
        props:['currentChannel'],
        apollo: {
            users:{
                query: USERS_QUERY
            },
            channels: {
                query: CHANNELS_QUERY
            }
        },
        methods:{
            selectChannel(id){
                this.$parent.setCurrentChannel(id);
            },
            selectUser(id){
                alert(id);
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss" scoped>
    @import "global";
    .channels-container{
        position: relative;
        display:flex;
        flex-direction: column;
        background: $darkBlue;
        color: transparentize($blue, .3);
        height: 100vh;
        box-shadow: 0 0 10px 1px rgba(0,0,0,.5);
        min-width: 300px;
        header{
            border-bottom:1px solid $darkBlue;
            background: $blue;
            display:flex;
            figure{
                max-width: 300px;
                img{
                    width: 100%;
                }
            }
        }
        main{
            border-top:1px solid $blue;
            flex-grow: 1;
            padding: 10px 1vw 0 1vw;
            ul{
                font-size: 1.25rem;
                text-transform: uppercase;
                padding: 0;
                margin:0;
                list-style: none;
                li{
                    cursor:pointer;
                    margin: 5px 0;
                    &.active,
                    &:hover{
                        color:$blue;
                    }
                }
            }
        }
    }
</style>
