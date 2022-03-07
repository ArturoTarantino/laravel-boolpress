<template>
    <section>
        <div class="container">
            <h1>Contacts</h1>

            <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Indirizzo email</label>
                    <input v-model="email" type="email" class="form-control" id="email">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input v-model="name" type="text" class="form-control" id="name">
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Messaggio</label>
                    <textarea v-model="message" id="message" class="form-control" cols="30" rows="10"></textarea>
                </div>

                <button @click.prevent="sendMessage()" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Contacts',
    data: function() {
        return {
            email: '',
            name: '',
            message: ''
        };
    },
    methods: {
        sendMessage: function() {
            axios.post('/api/leads/store', {
                email: this.email,
                name: this.name,
                message: this.message
            })
            .then((response)=>{

            });
        }
    }
}
</script>