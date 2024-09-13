<template>
<div class="depRow">
  <i>{{props.status}}</i>
  <span>{{ props.name }}</span>
</div>
</template>

<script setup>
import { defineProps} from 'vue'
const props = defineProps({
  name: String,
  status: Number,
})
</script>

<style scoped>
.depRow {
  display: flex;
  align-items: center;
}
</style>