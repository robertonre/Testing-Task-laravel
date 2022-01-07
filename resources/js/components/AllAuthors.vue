<template>
    <div>
        <h2 class="text-center">Products List</h2>

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
                        <router-link :to="{name: '/show-author/', params: { id: author.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteProduct(author.id)">Delete</button>
                    </div>
                </td>

            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['authors'],
        data() {
            return {
                // authors: [],
            }
        },
        created() {

            console.log(this.authors)

            //     this.axios
        //         .get('/api/authors/', {
        //             params: {
        //                 'api_token': `D2cUUs72YY0LPMTC1gWin08LgnIFgYGVyJst0DIV3aMy7JnoGE34Gn93Ffii06xG0CLJR5uvHUKn5aA6`
        //             }
        //         })
        //         .then(response => {
        //             this.authors = response.data;
        //             console.log(this.authors)
        //         });
        },
        methods: {
            deleteProduct(id) {
                this.axios
                    .delete(`http://localhost:8000/delete-author/${id}`)
                    .then(response => {
                        let i = this.authors.map(data => data.id).indexOf(id);
                        this.authors.splice(i, 1)
                    });
            }
        }
    }
</script>