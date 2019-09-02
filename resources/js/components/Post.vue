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
                    <button class="btn btn-success btn-md" type="submit">Comment</button>
                </form>
            </div>

               <img style="vertical-align:text-top" src="https://img.icons8.com/bubbles/50/000000/see-male-account.png">
                <div class="card-text d-inline-block">
                    <!-- <strong>{{$comment->user->name}} Said..</strong>
                    <p>{{$comment->body}}</p>
                    <span>{{$comment->updated_at->toDateString()}}</span> -->
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
                commentBox:''
            }
        },
        created(){
            this.getComments
        },
        methods:{
            getcomments(){
                this.$http.get('/api/post/'+this.post.id+"/comment").then((response)=>{
                    console.log(response);
                }).catch(function(error){
                    console.log("error "+error);
                })
            },
            postcomments(){
                this.$http.post(`/api/post/${this.post.id}/comment`,{
                    body:this.commentBox,
                    api_token:''
                })
            },
        }

    }

</script>