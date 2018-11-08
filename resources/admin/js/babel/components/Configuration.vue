<script>
    import axios from 'axios'
    export default {
        props: {
            configurations: {
                type: Array,
                required: true
            }
        },
        data() {
            return {
                configs: [],
                newConfig: {
                    key: '',
                    value: ''
                },
                carregando: null,
                error: null
            }
        },
        mounted() {
            this.configs = this.configurations
        },
        methods: {
            salvar(config) {
                let configuration = JSON.parse(JSON.stringify(config))

                this.carregando = configuration.id
                let vm = this

                if (vm.error && vm.error.configuration.id == configuration.id) vm.error = null

                axios.put(`/api/admin/settings/general/update/${configuration.id}`, configuration)
                    .then(res => {
                        vm.carregando = null
                        config = res.data
                    })
                    .catch(error => {
                        vm.carregando = null
                        vm.error = {
                            error: error.response,
                            configuration
                        }
                    })
            },
            adicionarConfig() {
                let vm = this
                let config = JSON.parse(JSON.stringify(vm.newConfig))
                if (!config.hasOwnProperty('key') || !config.hasOwnProperty('value')) return

                axios.post('/api/admin/settings/general/add', config)
                    .then(res => {
                        vm.configs.push(res.data)
                        vm.newConfig = {
                            key: '',
                            value: ''
                        }
                        this.$refs.key.focus()
                    })
                    .catch(error => {
                        alert(JSON.stringify(error.response.data))

                        console.error(error)
                        vm.newConfig = {
                            key: '',
                            value: ''
                        }
                        this.$refs.key.focus()
                    })
            }
        }
    }
</script>

<template>
    <div>
        <div class="row">
            <form @submit.prevent.top="adicionarConfig">
                <div class="col-md-5">
                    <div class="form-group has-feedback">
                        <label for="new-key">Chave</label>
                        <input type="text"
                               class="form-control"
                               id="new-key"
                               name="new-key"
                               v-model="newConfig.key" ref="key"></div>
                </div>
                <div class="col-md-5">
                    <div class="form-group has-feedback">
                        <label for="new-value">Valor</label>
                        <input type="text" class="form-control"
                               id="new-value"
                               name="new-value"
                               v-model="newConfig.value">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group has-feedback">
                        <div class="form-group">
                            <label style="display:block">&nbsp;</label>
                            <button type="submit"
                                    style="display: block"
                                    class="btn btn-success">
                                Adicionar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="row" v-for="config in configs">
            <form @submit.prevent="salvar(config)">
                <div class="col-md-10" v-show="carregando !== config['id']">
                    <div class="form-group has-feedback"
                         :class="{  'has-error': error != null && error.configuration.id === config['id'] }">
                        <label>{{ config.key }}</label>
                        <input type="text"
                               class="form-control"
                               v-model="config.value"
                               :placeholder="'Digite um valor de ' + config.key">
                    </div>
                </div>
                <div class="col-md-2" v-show="carregando !== config['id']">
                    <div class="form-group has-feedback">
                        <div class="form-group">
                            <label style="display:block">&nbsp;</label>
                            <button type="button"
                                    style="display: block"
                                    class="btn btn-primary"
                                    @click="salvar(config)">
                                Salvar

                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" v-show="carregando == config['id']">
                    <p>carregando...</p>
                </div>
                <div class="col-md-12" v-if="error && error.configuration.id === config['id']">
                    <p v-for="erro in error.error.data.value">{{ erro }}</p>
                </div>
            </form>
        </div>
    </div>
</template>