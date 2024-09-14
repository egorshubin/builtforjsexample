<template>
  <div class="depRowError" v-if="props.errorMessage">
    <div class="errorMessage" v-html="props.errorMessage"></div>
    <span class="trace-trigger" v-if="props.trace" @click="toggleTrace">Trace <i class="icon-angle-down"></i></span>
    <div class="trace-body" v-if="props.trace && isTraceShow">{{trace}}</div>
  </div>
</template>

<script setup>
import { ref, defineProps} from 'vue'

const props = defineProps({
  errorMessage: String,
  trace: String,
})

const isTraceShow = ref(false)

const toggleTrace = () => isTraceShow.value = !isTraceShow.value

</script>

<style scoped>
.depRowError {
  color: red;
  padding-left: 26px;
}
.trace-trigger {
  border-bottom: 1px dashed red;
  cursor: pointer
}
</style>