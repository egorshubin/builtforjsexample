<template>
  <div class="depRowWrapper">
    <div class="depRow">
      <DependencyIcon :status="props.status"></DependencyIcon>
      <span class="row-name">{{ props.name }}</span>
    </div>
    <ErrorMessage :error-message="props.errorMessage" :trace="trace"></ErrorMessage>
  </div>
</template>

<script setup>
import { defineProps} from 'vue'
import DependencyIcon from "@/components/DependencyIcon";
import ErrorMessage from "@/components/ErrorMessage";
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
  font-weight: bold;
}
.depRowWrapper {
  margin-bottom: 25px;
  font-size: 14px;
}
</style>