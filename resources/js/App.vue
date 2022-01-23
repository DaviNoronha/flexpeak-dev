<template>
    <div v-if="user.id">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="navbar-nav">
                    <router-link to="/restrito/" class="nav-item nav-link">Home</router-link>
                    <router-link v-if="user.perfil.nome == 'admin'" to="/restrito/users" class="nav-item nav-link">Usuários</router-link>
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
                    })
                    .catch(error => {
                        console.log(error);
                        this.$toast.danger('Erro ao buscar dados do usuário logado!', 'Erro');
                    });
            },
        }
    }
</script>
