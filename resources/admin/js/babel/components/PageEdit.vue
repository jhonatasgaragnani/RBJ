<script>
    import axios from 'axios'
    export default {
        props: {
            page: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                metas: [],
                newMeta: {
                    name: '',
                    content: ''
                }
            }
        },
        mounted () {
            this.metas = this.page.metas
        },
        methods: {
            salvar(meta) {
                let vm = this
                let newMeta = JSON.parse(JSON.stringify(meta))

                if (!newMeta.hasOwnProperty('name') || !newMeta.hasOwnProperty('content')) return

                axios.put('/api/admin/settings/meta/' + newMeta.id, newMeta)
                    .then(res => {
                        meta = res.data
                    })
                    .catch(console.log)
            },
            criar() {
                let vm = this
                let newMeta = JSON.parse(JSON.stringify(vm.newMeta))

                if (!newMeta.hasOwnProperty('name') || !newMeta.hasOwnProperty('content')) return

                axios.post('/api/admin/settings/meta/add/' + vm.page.id, newMeta)
                    .then(res => {
                        vm.metas.push(res.data)
                        vm.newMeta = {
                            name: '',
                            content: ''
                        }
                    })
                    .catch(console.log)
            }
        }
    }
</script>

<template>
    <div>

        <div class="row">
            <form @submit.prevent="criar">
                <div class="col-md-5 col-sm-10">
                    <div class="form-group has-feedback">
                        <label for="'newMeta-name'">Nome</label>
                        <input type="text"
                               id="'newMeta-name'"
                               name="'newMeta-name'"
                               class="form-control"
                               v-model="newMeta.name">
                    </div>
                </div>
                <div class="col-md-5 col-sm-10">
                    <div class="form-group has-feedback">
                        <label for="'newMeta-content'">Conteudo</label>
                        <input type="text"
                               id="'newMeta-content'"
                               name="'newMeta-content'"
                               class="form-control"
                               v-model="newMeta.content">
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="form-group has-feedback">
                        <div class="form-group"><label style="display: block;">&nbsp;</label>
                            <button type="submit" class="btn btn-success" style="display: block;">
                                Adicionar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="row" v-for="meta in metas">
            <form @submit.prevent="salvar(meta)">
                <div class="col-md-10 col-sm-10">
                    <div class="form-group has-feedback">
                        <label :for="'meta-'+meta.name">Meta {{ meta.name }}</label>
                        <input type="text"
                               :id="'meta-'+meta.name"
                               :name="'meta-'+meta.name"
                               class="form-control"
                               v-model="meta.content">
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="form-group has-feedback">
                        <div class="form-group"><label style="display: block;">&nbsp;</label>
                            <button type="submit" class="btn btn-primary" style="display: block;">
                                Salvar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>