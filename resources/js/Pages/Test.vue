<template>
  <Head title="Home"></Head>
  <AppLayout>
    <div class="my-5 w-75 mx-auto">
      <h1 class="text-secondary text-center my-5 fw-semibold">Test Component</h1>
      <p>Помимо Индонезии, блюдо получило весьма широкое распространение в Малайзии, Сингапуре и Брунее,
        а также определённую популярность за пределами Юго-Восточной Азии — прежде всего, в Нидерландах.
        При этом на международном уровне оно воспринимается преимущественно как «кулинарный символ» именно Индонезии.</p>
    </div>
  </AppLayout>
</template>

<script>
import {Head} from '@inertiajs/inertia-vue3'
import AppLayout from '../Layouts/Auth.vue'
import App from "../Layouts/App";
export default {
  name: "Test",
  components: {
    App,
    Head,
    AppLayout
  }
}
</script>

<style scoped>

</style>
