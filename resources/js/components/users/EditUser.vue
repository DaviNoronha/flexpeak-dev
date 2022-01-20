<template>
    <div class="container">
        <h2 class="text-center py-4">Editar Usuário</h2>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateUser">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" v-model="user.nome">
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" class="form-control" v-model="user.email">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="text" class="form-control" v-model="user.password">
                    </div>
                    <div class="form-group">
                        <select class="form-select">
                            <option selected>Função do Usuário</option>
                            <option value="1">Visual</option>
                            <option value="2">Sonoro</option>
                            <option value="3">Físico</option>
                            <option value="4">Glitch</option>
                            <option value="5">Financeiro</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
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
            this.axios
                .get(`http://localhost:8000/api/users/${this.$route.params.id}`)
                .then((res) => {
                    this.user = res.data;
                });
        },
        methods: {
            updateUser() {
                this.axios
                    .patch(`http://localhost:8000/api/users/${this.$route.params.id}`, this.user)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>
