<template>
    <section class="bubbles-container">
        <div class="bubble">
            <header>
                <div class="user">testcase</div>
                <div class="time">11:02pm</div>
            </header>
            <main>lorem ipsum ipsum morellorem ipsum ipsum morellorem ipsum ipsum morellorem ipsum ipsum morellorem ipsum ipsum morel</main>
        </div>
    </section>
</template>

<script>
    export default {
        name:'Bubbles',
        props:['channel'],
        apollo:{

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss" scope>
    @import "global";
    .bubbles-container{
        background: $white;
        color: $darkBlue;

        .bubble{
            display:flex;
            padding: 1rem 20vw;
            font-size: 2rem;

            header{
                text-align: center;
                .user{
                    @include userText;
                    background: $darkBlue;
                    border: 2px solid $blue;
                    border-radius: 10px;
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
