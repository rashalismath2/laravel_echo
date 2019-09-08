<template>
    <div class="container">
        <post v-bind:post="post" v-bind:user="user"></post>

    </div>
</template>

<script>
    import Post from './components/Post.vue'
 
    export default {
        components:{
            'post':Post,

        },     
        props:{
            user:{
                type:Object,
                required:true
            },
            post:{
                type:Object,
                required:true
            }
        }
    }
</script>
