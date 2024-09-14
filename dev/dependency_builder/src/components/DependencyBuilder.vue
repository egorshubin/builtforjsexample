<template>
  <div class="panel">
    <DependencyRow
        v-for="row in rows"
        :name="row.name"
        :status="row.status"
        :key="row.module"
        :errorMessage="row.errorMessage"
        :trace="row.trace"
    >
    </DependencyRow>
    <button class="btn btn-primary" :disabled="isRetrying" @click="retry">
      {{ buttonText }}
    </button>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import DependencyRow from "@/components/DependencyRow";
import {ERROR_STATUS, NO_STATUS, SUCCESS_STATUS} from "@/config/constants";

const rows = ref([
  { name: 'PrestaShop Marketplace in your Back Office', module: 'ps_mbo', status: NO_STATUS, errorMessage: null, trace: null },
  { name: 'PrestaShop Account', module: 'ps_accounts', status: NO_STATUS, errorMessage: null, trace: null },
  { name: 'PrestaShop EventBus', module: 'ps_eventbus', status: NO_STATUS, errorMessage: null, trace: null }
])

const buttonText = ref('Authorize and continue')

const isRetrying = ref(false)

const retry = () => {
  isRetrying.value = true
  rows.value.forEach(row => {
    row.errorMessage = null
    sendRequest(row)
  })
  buttonText.value = 'Retry'
  isRetrying.value = false
}

// const hasErrors = computed(() => {
//   return rows.value.some(row => row.status === 'error')
// })

const sendRequest = (row) => {
  setTimeout(() => {
    const isSuccess = Math.random() > 0.5
    if (isSuccess) {
      row.status = SUCCESS_STATUS
    } else {
      row.status = ERROR_STATUS
      row.errorMessage = `Failed to install ${row.name}`
      row.trace = 'Stack trace example'
    }
  }, 1000)
}

</script>

<style scoped>

</style>
