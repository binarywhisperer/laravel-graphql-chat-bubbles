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
            <span>profile</span>
            <a href="https://github.com/binarywhisperer/laravel-graphql-chat-bubbles">github</a>
        </footer>
    </section>
</template>

<script>
    export default {
        name:'Panel',
        methods:{
            panelFormSubmit(){
                alert('submitted');
            }
        },
        mounted() {

        },
    }
</script>

<style lang="scss" scope>
    @import "global";
    .panel-container{
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
                    color: $white;
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
            justify-content: center;
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
