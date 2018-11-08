<script>
    import axios from 'axios'
    export default {
        props: {
            pages: {
                type: Array,
                required: true
            },
            canedit: Boolean,
            candelete: Boolean
        },
        data() {
            return {
                newPage: {
                    name: '',
                    description: ''
                },
                pagesD: []
            }
        },
        mounted () {
            this.pagesD = this.pages
        },
        methods: {
            create() {
                let vm = this
                let page = JSON.parse(JSON.stringify(vm.newPage))

                if (!page.hasOwnProperty('name') || !page.hasOwnProperty('description')) return

                axios.post('/api/admin/settings/meta/add', page)
                    .then(res => {
                        vm.pagesD.push(res.data)
                        vm.newPage = {
                            name: '',
                            description: ''
                        }
                    })
                    .catch(err => {
                        console.log(err)
                        vm.newPage = {
                            name: '',
                            description: ''
                        }
                    })
            },
            remove(page) {
                let removedPage = JSON.parse(JSON.stringify(page))
                let vm = this

                if (!page.hasOwnProperty('id')) return

                axios.delete('/api/admin/settings/meta/remove/' + removedPage.id)
                    .then(res => {
                        vm.pagesD.splice(vm.pagesD.indexOf(page), 1)
                    })
                    .catch(console.log)
            }
        }
    }
</script>

<template>
    <div>
        <div class="row">
            <form @submit.prevent="create">
                <div class="col-md-5">
                    <div class="form-group has-feedback">
                        <label for="new-name">Nome</label>
                        <input type="text"
                               id="new-name"
                               name="new-name"
                               class="form-control"
                               v-model="newPage.name">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group has-feedback">
                        <label for="new-description">Descriçao</label>
                        <input type="text"
                               id="new-description"
                               name="new-description"
                               class="form-control"
                               v-model="newPage.description">
                    </div>
                </div>
                <div class="col-md-2">
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

        <table class="table table-hover table-striped table-bordered data-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Metas</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="page in pagesD">
                <td>{{ page.id }}</td>
                <td>{{ page.name }}</td>
                <td>{{ page.metas.length }}</td>
                <td>
                    <a v-if="canedit"
                       class="btn btn-sm btn-primary"
                       data-toggle="tooltip"
                       data-placement="top"
                       title="Editar"
                       :href="'/admin/settings/meta/edit/'+page.id">
                        <span class="fa fa-edit"></span>
                    </a>
                    <a v-if="candelete"
                       class="btn btn-sm btn-danger"
                       data-toggle="tooltip"
                       data-placement="top"
                       title="Deletar"
                       @click="remove(page)">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Metas</th>
                <th>Ações</th>
            </tr>
            </tfoot>
        </table>
    </div>
</template>