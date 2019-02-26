<template>
    <section class="bubbles-container">
        <div>
            <div class="bubble" v-for="message in messages" :key="message.id">
                <header>
                    <div class="user" :style="{borderColor: message.user.color_two, backgroundColor: message.user.color }">{{ message.user.display }}</div>
                    <div class="time">{{ message.created_at }}</div>
                </header>
                <main>{{ message.payload }}</main>
            </div>
        </div>
    </section>
</template>

<script>
    import { MESSAGES_QUERY } from "../graphql";

    export default {
        name:'Bubbles',
        apollo: {
            messages: {
                query: MESSAGES_QUERY,
                variables(){
                    return {
                        id: this.$parent.currentChannel
                    }
                },
                pollInterval: 1000
            }
        },
        mounted() {
        },
        updated(){
            let container = document.querySelector(".bubbles-container");
            container.scrollTop = container.scrollHeight;
        }

    }
</script>

<style lang="scss" scoped>
    @import "global";
    .bubbles-container{
        overflow-y: scroll;
        max-height: 80vh;
        flex-grow:1;
        background: $white;
        color: $darkBlue;

        .bubble{
            display:flex;
            padding: 1rem 20vw;
            font-size: 1.5rem;

            header{
                text-align: center;
                .user{
                    @include userText;
                    background: $darkBlue;
                    border: 3px solid $blue;
                    border-radius: 12px;
                    padding: .5rem 1rem;
                }
                .time{
                    color: #999;

                }
            }
            main{
                box-shadow: -1px 1px 3px 0 rgba(0,0,0, .2);
                background: #fff;
                border-radius: 10px;
                padding: .5rem 1rem;
                margin:0 .5rem;
            }

            &:nth-child(odd){
                flex-direction: row-reverse;

                main {
                    box-shadow: 1px 1px 3px 0 rgba(0, 0, 0, .2);
                }
            }
        }
    }
</style>
