<template>
    <section>
        <div class="container">
            <h1>{{post.title}}</h1>

            <div v-if="post.category">
                <span class="font-weight-bold">Categoria:</span>
                {{ post.category.name }}
            </div>

            <div class="my-2" v-if="post.tags.length > 0"> 
                <span v-for="tag in post.tags" :key="tag.id" class="badge bg-success mx-1">{{ tag.name }}</span>
            </div>

            <p>{{ post.content }}</p>
        </div>
    </section>
</template>

<script>
export default {
    name: 'PostDetails',
    data: function() {
        return {
            post: false
        };
    },
    methods: {
        getPost: function() {
            axios.get('/api/posts/' + this.$route.params.slug)
            .then((response)=> {
                if(response.data.success) {
                    this.post = response.data.results;
                } else {
                    // redirect to not found 404 page
                    this.$router.push({name: 'not-found'});
                }
            });
        }
    },
    created: function() {
        this.getPost();
    }
}
</script>