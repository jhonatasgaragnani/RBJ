<script>
import moment from 'moment'
import 'moment/locale/pt-br'
import {groupBy} from 'lodash'
import rMessage from './Message.vue'
export default {
  props: {
      messages: {
          type: Array,
          required: true
      }
  },
  computed: {
    groups() {
        return groupBy(this.messages, message => {
            return moment(message.created_at).format('YYYY-MM-DD')
        })
    },
    lastIndex() {
        return (Object.keys(this.groups).length) - 1
    }
  },
  components: {
      rMessage
  },
  methods: {
      showDivider(group) {
          return Object.keys(this.groups).indexOf(group) < this.lastIndex
      },
        getDiff(i) {
        return moment(i).format('DD [de] MMMM [de] YYYY')
      },
  }
}
</script>

<template>
    <v-container fluid>
        <template v-for="(group, i) in groups">
            <v-subheader>{{ getDiff(i) }}</v-subheader>
            <v-divider light class="mb-2"></v-divider>            
            <r-message v-for="(message, index) in group" :message="message" :key="index"></r-message>
        </template>
    </v-container>
</template>