<template>
    <div class="container">
        <h2 class="text-center py-4">Editar Usuário</h2>
        <form @submit.prevent="updateUser">
            <div class="row">
                <div class="form-group col-12">
                    <label>Nome</label>
                    <input type="text" class="form-control" v-model="user.nome">
                </div>
                <div class="form-group col-12">
                    <label>E-mail</label>
                    <input type="text" class="form-control" v-model="user.email">
                </div>
                <div class="form-group col-sm-6">
                    <label>Perfil</label>
                    <select class="form-control" v-model="user.perfil_id">
                        <option selected>Selecione um perfil</option>
                        <option v-for="perfil in perfis" :key="perfil.id" :value="perfil.id">{{ perfil.descricao }}</option>
                    </select>
                </div>
                <div class="form-group col-sm-6" v-if="user.perfil_id != perfil_admin.id">
                    <label>Tipo de Bug</label>
                    <select class="form-control" v-model="user.tipo_bug_id">
                        <option selected>Selecione um tipo de bug</option>
                        <option v-for="tipo_bug in tipo_bugs" :key="tipo_bug.id" :value="tipo_bug.id">{{ tipo_bug.descricao }}</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                user: {
                    nome: '',
                    email: '',
                    password: '',
                    password_repeat: '',
                    tipo_bug_id: '',
                    perfil_id: '',

                },
                tipo_bugs: [],
                perfis: [],
                perfil_admin: {}
            }
        },
        created() {
            if (this.user.perfil.nome != 'admin') {
                this.$router.push({ name: 'home' });
            }
            this.axios
                .get(`http://localhost:8000/api/users/${this.$route.params.id}`)
                .then((response) => {
                    this.user = response.data;
                });
                this.getTipoBugs();
                this.getPerfis();
        },
        methods: {
            updateUser() {
                this.axios
                    .put(`http://localhost:8000/api/users/${this.$route.params.id}`, this.user)
                    .then((response) => {
                        this.$router.push({ name: 'users' });
                    });
            },
            getTipoBugs() {
                this.axios
                    .get('http://localhost:8000/api/tipo-bugs/')
                    .then(response => {
                        this.tipo_bugs = response.data;
                    });
            },
            getPerfis() {
                this.axios
                    .get('http://localhost:8000/api/perfis/')
                    .then(response => {
                        this.perfis = response.data;
                        this.getPerfilAdmin();
                    });
            },
            getPerfilAdmin() {
                this.perfil_admin = this.perfis.find((perfil) => {
                    return perfil.nome == 'admin';
                });
            },
        }
    }
</script>
