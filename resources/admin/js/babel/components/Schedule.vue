<script>
    import axios from 'axios'
    export default {
        props: {
            day: {
                type: Object,
                required: true
            },
            schedules: {
                type: Array,
                required: true
            },
            add: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                starts_at: `${new Date().getHours()}:${Math.floor(new Date().getMinutes())}`,
                ends_at: `${new Date().getHours()}:${Math.floor(new Date().getMinutes())}`,
                programa: ''
            }
        },
        mounted() {
            let vm = this
            $(this.$refs['starts_at']).timepicker({
                showSeconds: false,
                showMeridian: false,
                showInputs: false
            }).on('changeTime.timepicker', e => {
                vm['starts_at'] = e.time.value
            })
            $(this.$refs['ends_at']).timepicker({
                showSeconds: false,
                showMeridian: false,
                showInputs: false
            }).on('changeTime.timepicker', e => {
                vm['ends_at'] = e.time.value
            })
            $(this.$refs['programas']).on('select2:select', e => {
                vm.programa = $(e.currentTarget).find('option:selected').val()
            })
        },
        methods: {
            gerar() {
                let schedule = {
                    starts_at: this.starts_at,
                    ends_at: this.ends_at,
                    program: this.programa
                }

                alert(JSON.stringify(schedule))

                axios.post(this.add, schedule)
            }
        }
    }
</script>

<style>
    .bottom-aligned {
        position: absolute;
        bottom: 0;
        margin-bottom: 7px;
        left: 0;
    }
</style>

<template>
    <div>

        <form @submit="gerar">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group has-feedback">
                        <label for="active">Programa</label>

                        <select ref="programas" class="form-control select2" data-placeholder="Selecione um programa"
                                name="active" id="active" style="width: 100%" v-model="programa">
                            <option :value="schedule.id" v-for="schedule in schedules">{{ schedule.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Inicio:</label>

                            <div class="input-group">
                                <input type="text" class="form-control" ref="starts_at">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Fim:</label>

                            <div class="input-group">
                                <input type="text" class="form-control" ref="ends_at">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label style="display:block">&nbsp;</label>
                        <input type="button"
                               style="display: block"
                               id="test"
                               name="test"
                               class="btn btn-primary"
                               value="Adicionar"
                               @click="gerar">
                    </div>
                </div>
            </div>
        </form>

    </div>
</template>