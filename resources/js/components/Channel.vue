<template>
    <div class="channel-container">
        <header>
            General <span @click="showChannels = !showChannels">\/</span>
            <ul v-if="showChannels">
                <li>LFG</li>
                <li>Trade Chat</li>
                <li class="divider"></li>
                <li>Billy Sandberg</li>
                <li>Jules Longmire</li>
                <li>Meta Worldpeace</li>
            </ul>
        </header>
        <main>Welcome. Stay a while and read.</main>
    </div>
</template>

<script>
    export default {
        name:'Channel',
        props:['channel'],
        data(){
            return {
                showChannels: false
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss" scope>
    @import "global";
    .channel-container{
        display: flex;
        align-items: center;
        background: $white;
        color: $blue;
        padding: 0 5vw;
        header{
            position: relative;
            font-size: 3rem;
            font-weight: 700;
            ul{
                position: absolute;
                top: 0;
                transform: translateY(3.5rem);
                left: 0;
                box-sizing: border-box;
                border: 1px solid $blue;
                list-style: none;
                padding: 1rem;
                margin:0;
                font-size: 1.5rem;
                background: $white;
                color: $blue;
                li.divider{
                    border-top: 1px solid rgba(0,0,0,.2);
                    margin: .25rem 0;
                }
                li{
                    border-radius: 15px;
                }
            }
        }
        main{
            flex-grow: 1;
            padding: 0 5vw;
            font-size: 1.5rem;
        }
    }
</style>
