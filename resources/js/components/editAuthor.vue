<template>
    <div>
        <h3 class="text-center">Vue</h3>
        <div class="row">
            <div class="col-md-6">
                <div v-if="message !== null" class="alert alert-success">
                    {{ message }}
                </div>
                <form @submit.prevent="updateProduct">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>First Name <span class="requiredSpan">*</span></label>
                                <input type="text" class="form-control" v-model="author.first_name">
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Last Name <span class="requiredSpan">*</span></label>
                                <input type="text" class="form-control" v-model="author.last_name">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Email address </label>
                                <input type="text" class="form-control" v-model="author.email">
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Phone </label>
                                <input type="text" class="form-control" v-model="author.phone">
                            </div>
                        </div>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-outline-primary form-control">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['api_token', 'author_id'],
        data() {
            return {
                author: {},
                message: null,
            }
        },
        created() {
            const params = new URLSearchParams([['api_token', this.api_token]]);
            const axios = require('axios');
            axios
                .get(`/api/author/${this.author_id}`, {params})
                .then((res) => {
                    this.author = res.data;
                });
        },
        methods: {
            updateProduct() {
                const params = new URLSearchParams([['api_token', this.api_token]]);
                const axios = require('axios');
                axios
                    .post(`/update-author/${this.author_id}`, this.author, {params})
                    .then((res) => {
                        this.message = "Author Updated !";
                    });
            }
        }
    }
</script>