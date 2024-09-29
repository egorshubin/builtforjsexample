<template>
<div class="global-error-message-wrap">
  <div class="global-error-message-text">
    Try to install missing modules manually.
    Use <a href="/modules/builtforjsexample/docs/integration_modules_setup.pdf" target="_blank">this instruction</a>
  </div>
  <a class="btn btn-primary" target="_blank" href="https://addons.prestashop.com/en/contact-us">
    Contact Support
  </a>
</div>
</template>

<script setup>

</script>

<style scoped>
.global-error-message-wrap {
  padding: 15px 20px;
  border: 2px solid red;
  margin-bottom: 30px;
}
.global-error-message-text {
  font-size: 16px;
  margin-bottom: 10px;
}
.bootstrap .global-error-message-text a, .global-error-message-text a {
  text-decoration: underline;
  color: dodgerblue;
}
</style>
