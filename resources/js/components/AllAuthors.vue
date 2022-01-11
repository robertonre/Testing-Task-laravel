<template>
    <div>
        <h2 class="text-center">Vue List</h2>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="author in authors" :key="author.id">

                <th scope="row">{{author.id}}</th>
                <td>{{author.first_name}}</td>
                <td>{{author.last_name}}</td>
                <td>{{author.email ? author.email : ''}}</td>
                <td>{{author.phone ? author.phone : ''}}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a :href="'show-author/'+author.id" class="btn btn-info">View/Edit</a>
                        <a :href="'delete-author/'+author.id" onclick="return confirm('Are you sure you want to delete this author?');" class="btn btn-danger">Delete</a>

                    </div>
                </td>

            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['api_token'],
        data() {
            return {
                authors: [],
                author: {
                    id: '',
                    first_name: '',
                    last_name: '',
                    email: '',
                    phone: '',
                }, author_id: ''
            }
        },
        created() {

            this.fetchAuthors()
        },

        methods: {
            fetchAuthors(){

                const params = new URLSearchParams([['api_token', this.api_token]]);
                const axios = require('axios');
                axios.get('api/authors',{params})
                    .then(response => {
                        this.authors = response.data;
                    });

            },

        }

    }
    //
    //         console.log(this.authors)
    //
    //         //     this.axios
    //     //         .get('/api/authors/', {
    //     //             params: {
    //     //                 'api_token': `D2cUUs72YY0LPMTC1gWin08LgnIFgYGVyJst0DIV3aMy7JnoGE34Gn93Ffii06xG0CLJR5uvHUKn5aA6`
    //     //             }
    //     //         })
    //     //         .then(response => {
    //     //             this.authors = response.data;
    //     //             console.log(this.authors)
    //     //         });
    //     },

</script>