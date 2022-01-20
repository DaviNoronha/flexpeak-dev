<template>
    <div class="container">
        <h2 class="py-4 text-center">Lista de Bugs</h2>
        <button @click="getBugs()" class="btn btn-primary">Atualizar</button>
        <router-link v-if="true" to="/bugs/create" class="btn btn-primary">Registrar Bug</router-link>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Actions</th>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Mais Detalhes
                        </button>
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Bug</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Descrição do Bug
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Mudar Status</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
