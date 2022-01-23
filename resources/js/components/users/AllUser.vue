<template>
    <div class="container">
        <h2 class="py-4 text-center">Lista de Usuários</h2>
        <button @click="getUsers()" class="btn btn-primary">Atualizar</button>
        <router-link v-if="true" to="/users/create" class="btn btn-primary">Cadastrar Usuário</router-link>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th class="text-center">Perfil</th>
                <th class="text-center">Tipos de Bug</th>
                <th class="text-center">Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id">
                <td>{{ user.nome }}</td>
                <td class="text-center">{{ user.perfil.descricao }}</td>
                <td class="text-center">{{ user.tipo_bug ? user.tipo_bug.descricao : 'Todos' }}</td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit.users', params: { id: user.id }}" class="btn btn-success">Editar</router-link>
                        <button class="btn btn-danger" @click="deleteUser(user.id)">Excluir</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                users: []
            }
        },
        created() {
            if (this.user.perfil.nome != 'admin') {
                    this.$router.push({ name: 'home' });
            }
            this.getUsers();
        },
        methods: {
            getUsers() {
                this.axios
                    .get('http://localhost:8000/api/users/')
                    .then(response => {
                        this.users = response.data;
                    });
            },
            deleteUser(id) {
                this.axios
                    .delete(`http://localhost:8000/api/users/${id}`)
                    .then(response => {
                        let i = this.users.map(data => data.id).indexOf(id);
                        this.users.splice(i, 1)
                    });
            }
        }
    }
</script>
