<template>
    <section class="panel-container">
        <main>
            <form class="panel-form" @submit.prevent="panelFormSubmit">
                <div class="control">
                    <input type="text" v-model="payload" placeholder="Say something..."/>
                    <button>Send</button>
                </div>
            </form>
        </main>
        <footer>
            <a href="/test">test</a>
            <span @click="activateProfile(true)">profile</span>
            <a href="https://github.com/binarywhisperer/laravel-graphql-chat-bubbles">github</a>
        </footer>
        <div class="profile">
            <profile v-if="profileActive"></profile>
        </div>
    </section>
</template>

<script>
    import { SEND_MESSAGE_MUTATION } from "../graphql";
    import Profile from "./Profile";

    export default {
        name:'Panel',
        components:{
            Profile
        },
        data(){
          return {
              payload: '',
              profileActive: false
          }
        },
        methods:{
            activateProfile(active){
                this.profileActive = active;
            },
            panelFormSubmit(){
                this.$apollo.mutate({
                    mutation: SEND_MESSAGE_MUTATION,
                    variables: {
                        payload: this.payload,
                        channel_id: this.$parent.currentChannel

                    }
                }).then(data => this.payload = '');
            }
        },
        mounted() {

        },
    }
</script>

<style lang="scss" scoped>
    @import "global";
    .panel-container{
        height: 15vh;
        background: $darkBlue;
        color: $white;

        main{
            padding: 1.5rem 0;
            display: flex;
            justify-content: center;

            form{

                input{
                    font-size: 2rem;
                    border:none;
                    padding: .25rem 1rem;
                    border-radius: 1rem;
                    min-width: 40vw;
                }
                button{
                    text-transform: uppercase;
                    font-size: 2rem;
                    background: $blue;
                    color: $darkBlue;
                    border:none;
                    box-shadow: none;
                    padding: .25rem 1rem;
                    border-radius: 1rem;

                    &:hover{
                        background:darken($blue, 10);
                    }
                }
            }
        }

        footer{
            display:flex;
            justify-content: flex-end;
            span,
            a{
                cursor:pointer;
                font-size:1.5rem;
                margin:.5rem 1rem;
                color:$blue;
                text-decoration: none;
            }
        }
    }
</style>
