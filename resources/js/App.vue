<template>
    <div v-if="user.id">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <router-link v-if="user.perfil.nome == 'admin'" to="/users" class="nav-item nav-link">Usuários</router-link>
                </div>
            </div>
        </nav>

        <router-view :user="user"> </router-view>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {}
            }
        },
        created() {
            this.getUser();
        },
        methods: {
            getUser() {
                let id = localStorage.getItem('userId');
                this.axios
                    .get(`http://localhost:8000/api/users/${id}`)
                    .then(response => {
                        this.user = response.data;
                        console.log(this.user);
                    });
            },
        }
    }
</script>
