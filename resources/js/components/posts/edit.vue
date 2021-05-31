<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Edit Post</div>
                    <div class="card-body">
                        <form @submit.prevent="PostUpdate">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input 
                                    type="text"
                                    class="form-control"
                                    placeholder="Masukkan Title"
                                    v-model="post.title">
                                
                                <div v-if="validation.title">
                                    <div class="alert alert-danger mt-1" role="alert"> 
                                        {{ validation.title[0] }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kontent">Kontent</label>
                                <textarea
                                    class="form-control"
                                    rows="5"
                                    placeholder="Masukkan Kontent"
                                    v-model="post.content"></textarea>
                                
                                <div v-if="validation.content">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.content[0] }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-md btn-success">Update</button>
                                <button type="reset" class="btn btn-md btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            post: {}, 
            validation: []
        }
    }, 

    created() {
        let uri = `http://localhost:8000/api/posts/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.post = response.data.data;
        });
    },

    methods: {
        PostUpdate() {
            let uri = `http://localhost:8000/api/posts/update/${this.$route.params.id}`;
            this.axios.post(uri, this.post)
                .then((response) => {
                    this.$router.push({
                        name: 'posts'
                    }).cathc(error => {
                        this.validation = error.response.data.data;
                    })
                })
        }
    }
}
</script>