<template>
  <div class="panel">
    <h3><i class="icon-cogs"></i>For this module to work properly, you need to set up the following modules first</h3>
    <div class="depRowsAllWrap">
      <DependencyRow
          v-for="row in rows"
          :name="row.name"
          :status="row.status"
          :key="row.module"
          :errorMessage="row.errorMessage"
          :trace="row.trace"
      >
      </DependencyRow>
    </div>
    <button class="btn btn-primary" :disabled="isRetrying" @click="retry">
      {{ buttonText }}
    </button>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import DependencyRow from "@/components/DependencyRow";
import {ERROR_STATUS, LOADING_STATUS, NO_STATUS, SUCCESS_STATUS} from "@/config/constants";

const rows = ref([
  { name: 'PrestaShop Marketplace in your Back Office', module: 'ps_mbo', status: NO_STATUS, errorMessage: null, trace: null },
  { name: 'PrestaShop Account', module: 'ps_accounts', status: NO_STATUS, errorMessage: null, trace: null },
  { name: 'PrestaShop EventBus', module: 'ps_eventbus', status: NO_STATUS, errorMessage: null, trace: null }
])

const buttonText = ref('Set up')

const isRetrying = ref(false)

const retry = async () => {
  isRetrying.value = true

  // Use for...of to properly await each async operation
  for (const row of rows.value) {
    row.errorMessage = null;
    await sendRequest(row); // Await each request to complete before proceeding
  }
  buttonText.value = 'Retry'
  isRetrying.value = false
}

// const hasErrors = computed(() => {
//   return rows.value.some(row => row.status === 'error')
// })

const sendRequest = async (row) => {
  row.status = LOADING_STATUS
  setTimeout(() => {
    const isSuccess = Math.random() > 0.5
    if (isSuccess) {
      row.status = SUCCESS_STATUS
    } else {
      row.status = ERROR_STATUS
      row.errorMessage = `Failed to install ${row.name}`
      row.trace = 'Stack trace example'
    }
  }, 5000)
}

</script>

<style scoped>
#content.bootstrap .panel>h3 {
  display: flex;
  align-items: center;
  margin-bottom: 25px;
}
.panel>h3>.icon-cogs {
  display: block;
  margin-right: 10px;
  font-size: 42px;
}
.depRowsAllWrap {
  margin-bottom: 40px;
}
</style>
