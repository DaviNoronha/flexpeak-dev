<template>
    <div class="container">
        <h3 class="text-center py-4">Registrar Bug</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addBug">
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" class="form-control" v-model="bug.titulo">
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <input type="text" class="form-control" v-model="bug.descricao">
                    </div>
                    <div class="form-group">
                        <label>Imagem</label>
                        <input type="text" class="form-control" v-model="bug.imagem">
                    </div>
                    <div class="form-group">
                        <select class="form-select">
                            <option selected>Tipo de Bug</option>
                            <option value="1">Visual</option>
                            <option value="2">Sonoro</option>
                            <option value="3">Físico</option>
                            <option value="4">Glitch</option>
                            <option value="5">Financeiro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-select">
                            <option selected>Perfil</option>
                            <option value="1">Em Aberto</option>
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
                bug: {}
            }
        },
        methods: {
            addBug() {
                this.axios
                    .post('http://localhost:8000/api/bugs', this.product)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
