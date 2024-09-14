<template>
  <div class="depRowWrapper">
    <div class="depRow">
      <i>{{props.status}}</i>
      <span>{{ props.name }}</span>
    </div>
    <div class="depRowError" v-if="props.errorMessage">
      {{props.errorMessage}}
    </div>
  </div>
</template>

<script setup>
import { defineProps} from 'vue'
const props = defineProps({
  name: String,
  status: Number,
  errorMessage: String,
  trace: String,
})
</script>

<style scoped>
.depRow {
  display: flex;
  align-items: center;
}
</style>