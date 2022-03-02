<template>
    <section>
        <div class="container">
            <h1>lista posts</h1>

            <div class="row row-cols-3">
                <div class="col" v-for="post in posts" :key="post.id">
                    <div class="card my-3">
                        <!-- <img src="" class="card-img-top" alt=""> -->
                        <div class="card-body">
                            <h5 class="card-title">{{ post.title }}</h5>
                            <p class="card-text">{{ truncateText(post.content, 70) }}</p>
                        </div>
                        <!-- <ul class="list-group list-group-flush">
                            <li class="list-group-item">An item</li>
                        </ul> -->
                        <!-- <div class="card-body">
                            <a href="#" class="card-link">Card link</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Posts',
    data: function() {
        return {
            posts: []
        };
    },
    methods: {
        getPosts: function() {
            axios.get('/api/posts')
            .then((response)=>{
                // console.log(response.data.results);
                this.posts = response.data.results;
            });
        },
        truncateText: function(text, maxChars) {
            // arg 
            // - text
            // - n chars to show 
 
            if(text.length > maxChars) {
                return text.substr(0, maxChars) + '...';
            }

            return text;
        }
    },
    created: function() {
        this.getPosts();
    }
}
</script>