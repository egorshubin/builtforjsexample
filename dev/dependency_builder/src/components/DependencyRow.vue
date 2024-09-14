<template>
  <div class="depRowWrapper">
    <div class="depRow">
      <DependencyIcon :status="props.status"></DependencyIcon>
      <span class="row-name">{{ props.name }}</span>
    </div>
    <div class="depRowError" v-if="props.errorMessage">
      {{props.errorMessage}}
    </div>
  </div>
</template>

<script setup>
import { defineProps} from 'vue'
import DependencyIcon from "@/components/DependencyIcon";
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
.row-name {
  margin-left: 10px;
}
.depRowWrapper {
  margin-bottom: 20px;
  font-size: 14px;
  font-weight: bold;
}
</style>