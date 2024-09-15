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
import { ref, computed } from 'vue'
import DependencyRow from "@/components/DependencyRow";
import {ERROR_STATUS, LOADING_STATUS, NO_STATUS, SUCCESS_STATUS} from "@/config/constants";
import {processDependency} from "@/composables/request";
import {getErrorMessage, getErrorTrace} from "@/composables/errorParser";

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
  if (!hasErrors.value) {
    location.reload()
  }
}

const hasErrors = computed(() => {
  return rows.value.some(row => row.status === ERROR_STATUS)
})

const sendRequest = async (row) => {
  row.status = LOADING_STATUS

  try {
    const response = await processDependency(row.module)
    console.log(response)
    if (response.data && typeof response.data === 'boolean') {
      row.status = SUCCESS_STATUS
    } else if (response.data) {
      row.status = ERROR_STATUS
      row.errorMessage = String(response.data)
    } else {
      row.status = ERROR_STATUS
      row.errorMessage = 'Failed, see browser console for details'
    }
  } catch(err) {
    console.log(err)
    row.status = ERROR_STATUS
    row.errorMessage = getErrorMessage(err)
    row.trace = getErrorTrace(err)
  }
}

</script>

<style scoped>
#content.bootstrap .panel>h3 {
  display: flex;
  align-items: center;
  margin-bottom: 30px;
}
.panel>h3>.icon-cogs {
  display: block;
  margin-right: 10px;
  font-size: 42px;
}
.depRowsAllWrap {
  margin-bottom: 45px;
}
</style>
