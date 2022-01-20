<template>
    <div class="container">
        <h2 class="py-4 text-center">Lista de Bugs</h2>
        <button @click="getBugs()" class="btn btn-primary">Atualizar</button>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Status</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="bug in bugs" :key="bug.id">
                <td>{{ bug.titulo }}</td>
                <td>{{ bug.descricao }}</td>
                <td v-if="bug.status == 1">Em Aberto</td>
                <td v-if="bug.status == 2">Em Correção</td>
                <td v-if="bug.status == 3">Corrigido</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'show', params: { id: bug.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteBug(bug.id)">Delete</button>
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
                bugs: []
            }
        },
        created() {
            this.getBugs();
        },
        methods: {
            getBugs() {
                this.axios
                    .get('http://localhost:8000/api/bugs/')
                    .then(response => {
                        this.bugs = response.data;
                    });
            }
        }
    }
</script>
