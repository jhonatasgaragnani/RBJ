<script>
    export default {
        name: 'Pagination',
        props: {
            getter: {
                type: String,
                required: true
            }
        },
        computed: {
            pagination() {
                return this.$store.getters[this.getter]
            },
            length() {
                if (!this.pagination) return

                for (var length = 0,
                         payload = 0;
                     length < this.pagination.total;
                     length += this.pagination.per_page,
                         payload++) {
                }

                return payload

            },
            page: {
                get() {
                    return this.$route.query.page
                },
                set(value) {
                    this.$router.push({
                        query: {
                            page: value
                        }
                    })
                }
            }
        },
        mounted () {
            if (this.length) {
                if (this.page > this.length) {
                    this.updatePage(1)
                }
            }

            if (!this.page) {
                this.updatePage(1)
            }
        },
        methods: {
            updatePage(value) {
                this.$router.push({
                    query: {
                        page: value
                    }
                })
            }
        }
    }
</script>

<template>
    <v-layout row justify-space-around>
        <v-card light>
            <v-pagination :length="length" :value="parseInt(page)" @input="updatePage"></v-pagination>
        </v-card>
    </v-layout>
</template>