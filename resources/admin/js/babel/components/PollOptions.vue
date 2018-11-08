<script>
export default {
    props: {
        poll: {
            type: Object,
            required: true
        }
    },
    data: () => ({
        options: [],
        option: {
            name: ''
        },
        loading: null
    }),
    mounted() {
        this.options = this.poll.options
    },
    methods: {
        async adicionarOpcao() {
            let option = JSON.parse(JSON.stringify(this.option))
            let vm = this

            if (!option.hasOwnProperty('name')) return

            let {name} = option
            let { data } = await window.axios.post(`/api/admin/radio/polls/${this.poll.id}/options/add`, {name})

            this.options.push(data)

            this.option = {
                name: ''
            }
        },
        async salvarOpcao(oldOption) {
            let option = JSON.parse(JSON.stringify(oldOption))
            let vm = this

            if (!option.hasOwnProperty('name') || !option.name.trim()) return

            vm.loading = option.id
            let { data } = await window.axios.put(`/api/admin/radio/polls/options/${option.id}/edit`, option)
            oldOption = data
            vm.loading = null
        }
    }
}
</script>

<template>
    <div>
    
        <h4>Opções</h4>
    
        <div class="row">
            <form @submit.prevent="adicionarOpcao">
                <div class="col-md-10 col-xs-12 col-sm-10">
                    <div class="form-group has-feedback">
                        <label for="option.name">Nome da opçao:</label>
                        <input type="text" class="form-control" id="option.name" name="option.name" v-model="option.name">
                    </div>
                </div>
                <div class="col-md-2 col-xs-12 col-sm-2">
                    <div class="form-group has-feedback">
                        <div class="form-group">
                            <label style="display:block">&nbsp;</label>
                            <button type="submit" style="display: block" class="btn btn-primary">Adicionar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    
        <div class="row" v-for="option in options">
            <form @submit.prevent="salvarOpcao(option)" v-show="loading !== option.id">
                <div class="col-md-10 col-xs-12 col-sm-10">
                    <div class="form-group has-feedback">
                        <label>Nome</label>
                        <input type="text" class="form-control" v-model="option.name" placeholder="Digite o novo nome da opção">
                    </div>
                </div>
                <div class="col-md-2 col-xs-12 col-sm-2">
                    <div class="form-group has-feedback">
                        <label style="display:block">&nbsp;</label>
                        <button class="btn btn-success" style="display: block">Salvar</button>
                    </div>
                </div>
            </form>
            <div class="col-sm-12">
                <p v-show="loading === option.id">carregando...</p>
            </div>
        </div>
    
    </div>
</template>