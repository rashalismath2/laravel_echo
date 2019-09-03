<template>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-8 text-sucess">{{this.post.title}}</h1>
            <label class="mr-2">{{new Date(this.post.updated_at).toLocaleDateString()}}</label>
            <span class="badge badge-success">Published</span>
            
            <hr class="my-4">
            <p>{{this.post.description}}</p>
            <hr class="my-4">

            <div class="form-group">
                <form action="" method="post">
                    <label for="my-textarea">Comments</label>
                    <textarea v-model="commentBox" id="my-textarea" placeholder="Comment.." class="form-control" name="" rows="3"></textarea>
                    <button v-on:click.prevent="postComments" class="btn btn-success btn-md" type="submit">Comment</button>
                </form>
            </div>

            <div class="comments">
                <div v-for="comment in comments" class="comment mb-2" v-bind:key="comment.id">
                    <img style="vertical-align:text-top" src="https://img.icons8.com/bubbles/50/000000/see-male-account.png">
                    <div class="card-text d-inline-block">
                        <strong>{{comment.user.name}} Said..</strong>
                        <p class="m-0 p-0">{{comment.body}}</p>
                        <span>Commented on: {{new Date(comment.updated_at).toLocaleDateString()}}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import {bus} from "../app";

    export default {
        props:{
            post:{
                type:Object,
                required:true
            },
            user:{
                type:Object,
                required:true
            }
        },
        data(){
            return {
                commentBox:'',
                comments:[]
            }
        },
        created(){
            this.getComments()
        },
        methods:{
            getComments(){
                axios.get('/api/post/'+this.post.id+`/comment?api_token=${this.user.api_token}`).then((response)=>{
                    this.comments=response.data;
                    console.log(response);
                }).catch(function(error){
                    console.log("error "+error);
                })
            },
            postComments(){
                axios.post(`/api/post/${this.post.id}/comment`,{
                    body:this.commentBox,
                    api_token:this.user.api_token
                })
                .then((response)=>{
                    this.comments.unshift(response.data[0]);
                    this.commentBox=""
                })
                .catch((error)=>{
                    console.log("Error in submitting comment "+error);
                })
            },
        }

    }

</script>