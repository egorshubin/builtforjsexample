<template>
  <i :class="iconClass"></i>
</template>

<script setup>
import { ref, defineProps, watch} from 'vue'
import {ERROR_STATUS, LOADING_STATUS, NO_STATUS, SUCCESS_STATUS} from "@/config/constants";

const props = defineProps({
  status: Number,
})

const iconClass = ref('empty-icon')

const classes = {
  [NO_STATUS]: 'basic-circle empty-icon',
  [LOADING_STATUS]: 'basic-circle basic-font icon-f-spin4 animate-spin',
  [SUCCESS_STATUS]: 'basic-circle basic-font icon-f-ok-circled',
  [ERROR_STATUS]: 'basic-circle basic-font icon-f-attention',
}

// Watch for changes in the `status` prop
watch(
    () => props.status,
    (newStatus) => {
      // Update iconClass and iconCode when status changes
      iconClass.value = classes[newStatus] || 'empty-icon'
    },
    { immediate: true } // Immediate execution on component mount
)

</script>

<style scoped>
.basic-circle {
  width: 16px;
  height: 16px;
  display: block;
  border-radius: 9999px;
}
.empty-icon {
  background-color: #EEEEEE
}
.basic-font::before {
  font-size: 16px;
  position: relative;
  top: -1px;
}
.icon-f-ok-circled::before {
  color: green;
}
.icon-f-attention::before {
  color: red;
}
</style>