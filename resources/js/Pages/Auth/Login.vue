<template>
  <Head title="Login"></Head>
  <AppLayout>
    <div class="my-5 mx-auto w-50">
      <h1 class="text-center my-5 text-secondary fw-semibold text-decoration-none"><span class="text-primary border-bottom">{{ 'Вход' }}</span></h1>
      <form @submit.prevent="submit" class="w-50 mx-auto">
        <div class="mb-5">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" name="email" class="form-control" v-model="form.email" >
          <div v-if="errors.email" class="text-danger fst-italic my-2">{{ errors.email }}</div>
        </div>
        <div class="mb-5">
          <label for="password" class="form-label">Password</label>
          <input name="password" id="password" class="form-control" type="password" v-model="form.password" />
          <div v-if="errors.password" class="text-danger fst-italic my-2">{{ errors.password }}</div>
        </div>
        <div class="d-flex flex-wrap gap-3 justify-content-around align-items-center mt-5 mb-3">
          <Link :href="route('articles-mix.index')" class="btn btn-outline-primary"> Назад</Link>
          <button type="submit" class="btn btn-outline-secondary">Войти</button>
        </div>
      </form>
    </div>
  </AppLayout>
</template>

<script>

import {reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";
import {Head, Link, useForm} from "@inertiajs/inertia-vue3";
import AppLayout from "../../Layouts/Auth";

export default {
  name: "Login",
  components:{
    Head,
    Link,
    useForm,
    AppLayout,

  },
  props: {
    errors: Object
  },
  setup () {
    const form = reactive({
      email: '',
      password: '',

    })

    function submit(){
      Inertia.post(route('login.mix'), form)
    }
    return { form, submit }
  },
}
</script>

<style scoped>

</style>
