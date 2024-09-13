<template>
<DependencyRow v-for="row in rows" :name="row.name" :status="row.status" :key="row.module"></DependencyRow>
</template>

<script setup>
import { ref } from 'vue'
import DependencyRow from "@/components/DependencyRow";
import {NO_STATUS} from "@/config/constants";

const rows = ref([
  { name: 'PrestaShop Marketplace in your Back Office', module: 'ps_mbo', status: NO_STATUS, errorMessage: null, trace: null },
  { name: 'PrestaShop Account', module: 'ps_accounts', status: NO_STATUS, errorMessage: null, trace: null },
  { name: 'PrestaShop EventBus', module: 'ps_eventbus', status: NO_STATUS, errorMessage: null, trace: null }
])

setTimeout(() => {
  console.log("Delayed for 1 second.");
  rows.value[0].status = 2;
}, 5000);

</script>

<style scoped>

</style>
