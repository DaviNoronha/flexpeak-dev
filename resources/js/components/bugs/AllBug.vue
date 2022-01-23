<template>
    <div class="container">
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ bug.titulo }}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div>
                        {{ bug.descricao }}
                        </div>
                        <div class="row justify-content-center px-3 mt-3">
                            <img class="bug-img" v-for="imagem in bug.imagens" :key="imagem.id" :src="'http://localhost:8000/storage/'+imagem.path">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button v-if="bug.status != 3" type="button" class="btn btn-success" @click="changeStatus">
                            <span v-if="bug.status == 1">Colocar em Correção</span>
                            <span v-if="bug.status == 2">Finalizar Correção</span>
                        </button>
                        <button id="close-modal" type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-mt-4">
            <div class="card-header">
                <h2 class="py-4 text-center">Lista de Bugs</h2>
                <button @click="getBugs()" class="btn btn-primary">Atualizar</button>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="bug in bugs" :key="bug.id">
                        <td>{{ bug.titulo }}</td>
                        <td>
                            {{  bug.descricao.length < 30 ? bug.descricao : bug.descricao.substring(0,30) + "..." }}
                        </td>
                        <td class="text-center">{{ bug.tipo_bug.descricao }}</td>
                        <td class="text-center" style="font-size: 17px">
                            <span v-if="bug.status == 1" class="badge badge-danger">Em Aberto</span>
                            <span v-if="bug.status == 2" class="badge badge-warning">Em Correção</span>
                            <span v-if="bug.status == 3" class="badge badge-success">Corrigido</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" @click="selectBug(bug)">
                                    Mais Detalhes
                                </button>
                                <button class="btn btn-danger" @click="deleteBug(bug.id)">Excluir</button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                bugs: [],
                bug: {}
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
                        if (this.user.perfil.nome == 'admin') {
                            this.bugs = response.data;
                        } else {
                            this.bugs = response.data.filter((bug) => {
                                return bug.tipo_bug.nome == this.user.tipo_bug.nome;
                            });
                            this.bugs = this.bugs.filter((bug) => {
                                if (bug.user_id) {
                                    return bug.user_id == this.user.id;
                                } else {
                                    return true;
                                }
                            });
                        }
                    });
            },
            selectBug(bug) {
                this.bug = bug;
            },
            changeStatus() {
                this.bug.user_id = this.user.id;
                this.axios
                    .put(`http://localhost:8000/api/bugs/${this.bug.id}`, this.bug)
                    .then((response) => {
                        this.getBugs();
                        document.getElementById('close-modal').click();
                    });
            },
            deleteBug(id) {
                this.axios
                    .delete(`http://localhost:8000/api/bugs/${id}`)
                    .then(response => {
                        let i = this.bugs.map(data => data.id).indexOf(id);
                        this.bugs.splice(i, 1)
                    });
            }
        }
    }
</script>

<style>
.bug-img {
    width: 200px;
    margin: 5px;
}
.badge {
    padding: 7px;
    font-weight: 600;
}

</style>
