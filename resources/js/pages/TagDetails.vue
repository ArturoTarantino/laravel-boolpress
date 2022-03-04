<template>
    <section>
        <div class="container">
            <h1>Tag: {{ tag.name }}</h1>

            <h2>Posts correlati</h2>
            <div class="list-group">
                <router-link :to="{ name: 'post-details', params: {slug: post.slug}}" v-for="post in tag.posts" :key="post.id" class="list-group-item list-group-item-action">
                    {{ post.title }}
                </router-link>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'TagDetails',
    data: function() {
        return {
            tag: false
        };
    },
    methods: {
        getTag: function() {
            axios.get('/api/tags/' + this.$route.params.slug)
            .then((response)=>{
                this.tag = response.data.results;
            });
        }
    },
    created: function() {
        this.getTag();
    }
}
</script>