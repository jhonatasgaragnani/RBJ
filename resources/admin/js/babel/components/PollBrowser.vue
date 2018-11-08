<script>
    import axios from 'axios'
    export default {
        props: {
            polls: {
                type: Array,
                required: true
            },
            canedit: {
                type: Boolean,
                required: true
            },
            candelete: {
                type: Boolean,
                required: true
            },
        },
        data() {
            return {
                pollsD: [],
                poll: {
                    name: '',
                    question: ''
                }
            }
        },
        mounted() {
            this.pollsD = this.polls
        },
        methods: {
            remove(poll) {
                let removedPoll = JSON.parse(JSON.stringify(poll))
                let vm = this

                if (!poll.hasOwnProperty('id')) return

                axios.delete('/api/admin/radio/polls/remove/' + removedPoll.id)
                    .then(res => {
                        vm.pollsD.splice(vm.pollsD.indexOf(poll), 1)
                    })
                    .catch(console.log)
            },
            add() {
                let poll = JSON.parse(JSON.stringify(this.poll))
                let vm = this

                if (!poll.name.trim() || !poll.question.trim()) return

                axios.post('/api/admin/radio/polls/add', poll)
                    .then(res => {
                        vm.pollsD.push(res.data)
                        vm.poll = {
                            name: '',
                            question: ''
                        }
                    })
                    .catch(console.log)
            }
        }
    }
</script>

<template>
    <div>
        <h3>Criar enquete</h3>

        <div class="row">
            <form @submit.prevent="add">
                <div class="form-group col-md-5">
                    <label>Nome</label>
                    <input type="text" class="form-control" placeholder="Digite um nome para a enquete" v-model="poll.name">
                </div>
                <div class="form-group col-md-5">
                    <label>Questão</label>
                    <input type="text" class="form-control" placeholder="Digite uma questão para a enquete" v-model="poll.question">
                </div>
                <div class="form-group col-md-2">
                    <label>&nbsp;</label>
                    <button class="btn btn-success" style="display: block">Salvar</button>
                </div>
            </form>
        </div>

        <table class="table table-hover table-striped table-bordered data-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Questão</th>
                <th>Opções</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="poll in pollsD">
                <td>{{ poll.id }}</td>
                <td>{{ poll.name }}</td>
                <td>{{ poll.question }}</td>
                <td>{{ poll.options.length }}</td>
                <td>
                    <a v-if="canedit"
                       class="btn btn-sm btn-primary"
                       data-toggle="tooltip"
                       data-placement="top"
                       title="Editar"
                       :href="'/admin/radio/polls/edit/'+poll.id">
                        <span class="fa fa-edit"></span>
                    </a>
                    <a v-if="candelete"
                       class="btn btn-sm btn-danger"
                       data-toggle="tooltip"
                       data-placement="top"
                       title="Deletar"
                       @click="remove(poll)">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Questão</th>
                <th>Opções</th>
                <th>Ações</th>
            </tr>
            </tfoot>
        </table>
    </div>
</template>