<template>
    <section class="profile-container">
        <div class="profile-container__close" @click="$parent.profileActive = false">X</div>
        <div class="profile-container__form" v-if="!$apollo.loading">
            <form class="profile-form" @submit.prevent="profileFormSubmit">
                <h2>Profile</h2>
                <div class="control">
                    <input type="text" v-model="name" placeholder="Name"/>
                </div>
                <div class="control">
                    <input type="text" v-model="display" placeholder="Display"/>
                </div>
                <div class="control">
                    <input type="color" v-model="color" placeholder="Color"/>
                </div>
                <div class="control">
                    <input type="color" v-model="color_two" placeholder="Color Two"/>
                </div>

                <button>Send</button>
            </form>
        </div>

    </section>
</template>

<script>
    import { ME_QUERY, UPDATE_USER_MUTATION} from "../graphql";

    export default {
        name:'Profile',
        data(){
            return {
                name: '',
                display: '',
                color: '',
                color_two: ''
            }
        },
        methods:{
            profileFormSubmit(){
                this.$apollo.mutate({
                    mutation: UPDATE_USER_MUTATION,
                    variables: {
                        name: this.name,
                        display: this.display,
                        color: this.color,
                        color_two: this.color_two
                    }
                }).then(data => this.$parent.profileActive = false);
            }
        },
        apollo:{
            me:{
                query: ME_QUERY,
                update(data){
                    this.name = data.me.name;
                    this.display = data.me.display;
                    this.color = data.me.color;
                    this.color_two = data.me.color_two;
                }
            }

        },
        mounted() {

        },
    }
</script>

<style lang="scss" scoped>
    @import "global";
    .profile-container{
        color: $white;
        position: absolute;
        top: 0;
        left: 0;
        background: transparentize($darkBlue, .1);
        width: 100vw;
        height: 100vh;
        display:flex;
        justify-content:center;
        align-items: center;

        &__close{
            position: absolute;
            top: 2rem;
            right: 2rem;
            font-size: 5rem;

        }
    }
    form{
        h2{
            font-size:3rem;
            font-weight: 700;
            text-transform: uppercase;
            text-align: center;
        }
        .control{
            margin: 1rem 0;
            input{
                font-size: 2rem;
                border:none;
                padding: .25rem 1rem;
                border-radius: 1rem;
                min-width: 40vw;
            }
        }
        button{
            box-sizing: content-box;
            font-size: 1.5rem;
            font-weight: 700;
            background: $blue;
            color: $darkBlue;
            padding: .25rem 1rem;
            min-width: 40vw;
            border:none;
            border-radius: 1rem;
            text-transform: uppercase;
            cursor:pointer;
            &:hover{
                background: darken($blue, 10);
            }
        }

    }
</style>
