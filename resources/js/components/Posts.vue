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
                        <div class="card-body">
                            <router-link :to="{ name: 'post-details', params: { slug: post.slug } }" class="card-link">Leggi il post</router-link>
                        </div>
                    </div>
                </div>
            </div>

            <nav>
                <ul class="pagination">
                    <li class="page-item" :class="{ 'disabled' : currentPage == 1 }">
                        <a @click="getPosts(currentPage - 1)" class="page-link" href="#">Previous</a>
                    </li>

                    <li v-for="n in lastPage" :key="n" class="page-item" :class="{ 'active' : currentPage == n }">
                        <a @click="getPosts(n)" class="page-link" href="#">{{ n }}</a>
                    </li>

                    <li class="page-item" :class="{ 'disabled' : currentPage == lastPage }">
                        <a @click="getPosts(currentPage + 1)" class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Posts',
    data: function() {
        return {
            posts: [],
            currentPage: 1,
            lastPage: false
        };
    },
    methods: {
        getPosts: function(pageNumber) {
            axios.get('/api/posts', {
                params: {
                    page: pageNumber
                }
            })
            .then((response)=>{
                // console.log(response.data.results);
                this.posts = response.data.results.data;
                this.currentPage = response.data.results.current_page;
                this.lastPage = response.data.results.last_page;
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
        this.getPosts(1);
    }
}
</script>