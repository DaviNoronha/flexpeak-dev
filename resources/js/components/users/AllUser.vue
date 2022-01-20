<template>
    <div class="container">
        <h2 class="py-4 text-center">Lista de Usuários</h2>
        <button @click="getUsers()" class="btn btn-primary">Atualizar</button>
        <router-link v-if="true" to="/create" class="btn btn-primary">Registrar Usuário</router-link>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Perfil</th>
                <th>Tipos de Bug</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id">
                <td>{{ user.nome }}</td>
                <td>{{ user.perfil.descricao }}</td>
                <td>{{ user.tipo_bug ? user.tipo_bug.descricao : 'Todos' }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: user.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteUser(user.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: []
            }
        },
        created() {
            this.getUsers();
        },
        methods: {
            getUsers() {
                this.axios
                    .get('http://localhost:8000/api/users/')
                    .then(response => {
                        this.users = response.data;
                    });
            }
        }
    }
</script>
