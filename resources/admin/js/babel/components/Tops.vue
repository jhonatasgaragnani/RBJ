<script>
    import axios from 'axios'
    export default {
        props: {
            musics: {
                type: Array,
                required: true,
                default: () => []
            },
            editable: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                allMusics: [],
                options: {},
                loading: false
            }
        },
        mounted() {
            this.allMusics = this.musics
        },
        methods: {
            reorder(ev) {
                let vm = this
                vm.loading = true
                axios.put('/api/admin/radio/tops/reorder', {musics: vm.allMusics})
                    .then(res => {
                        vm.allMusics = res.data.musics
                        vm.loading = false
                    })
                    .catch(err => {
                        console.log(err)
                        vm.loading = false
                    })
            }
        }
    }
</script>

<template>
    <div>
        <p v-show="loading">Reordenando...</p>
        <table class="table table-hover table-striped table-bordered dt-responsive">
            <thead>
            <tr>
                <th>Posição</th>
                <th>Artista</th>
                <th>Titulo</th>
                <th>Ações</th>
            </tr>
            </thead>
            <draggable v-model="allMusics" :options="options" element="tbody" @end="reorder">
                <tr v-for="(music,index) in allMusics" :key="music">
                    <td>{{ music.position }}</td>
                    <td>{{ music.artist }}</td>
                    <td>{{ music.title }}</td>
                    <td>
                        <a :href="music.music"
                           data-toggle="ekko-light"
                           :data-title="music.artist + ' - ' + music.title"
                           data-gallery="musics">
                            <span class="btn btn-sm btn-warning"
                                  data-toggle="tooltip"
                                  data-placement="top"
                                  title="Ver">
                                <span class="fa fa-eye"></span>
                            </span>
                        </a>

                        <a v-if="editable"
                           class="btn btn-sm btn-primary"
                           :href="'/admin/radio/tops/edit/' + music.id"
                           data-toggle="tooltip"
                           data-placement="top"
                           title="Editar">
                            <span class="fa fa-edit"></span>
                        </a>
                    </td>
                </tr>
            </draggable>
            <tfoot>
            <tr>
                <th>Posição</th>
                <th>Artista</th>
                <th>Titulo</th>
                <th>Ações</th>
            </tr>
            </tfoot>
        </table>
    </div>
</template>