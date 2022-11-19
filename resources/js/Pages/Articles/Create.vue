<template>
  <Head title="Create Article"></Head>
  <AppLayout>
  <div class="my-5 mx-auto w-50">
  <h1 class="text-center my-5 text-secondary fw-semibold text-decoration-none"><span class="text-primary border-bottom">{{ 'Добавить статью' }}</span></h1>
    <form @submit.prevent="submit">
      <div class="mb-5">
        <label for="title" class="form-label">Название</label>
        <input type="text" id="title" name="title" class="form-control" v-model="form.title" >
        <div v-if="errors.title" class="text-danger fst-italic my-2">{{ errors.title }}</div>
      </div>
      <div class="mb-5">
        <label for="content" class="form-label">Содержание</label>
        <textarea name="content" id="content" class="form-control" rows="5" cols="3" v-model="form.content"></textarea>
        <div v-if="errors.content" class="text-danger fst-italic my-2">{{ errors.content }}</div>
      </div>
      <div class="d-flex flex-wrap gap-3 justify-content-around align-items-center mt-5 mb-3">
        <Link :href="route('articles-mix.index')" class="btn btn-outline-primary"> Назад</Link>
        <button type="submit" class="btn btn-outline-secondary">Добавить</button>
      </div>
    </form>
  </div>
  </AppLayout>
</template>

<script>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import AppLayout from '../../Layouts/Auth.vue'
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

export default {
  name: "Create",
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
      title: '',
      content: '',
    })

    function submit(){
      Inertia.post(route('articles-mix.store'), form)
    }
    return { form, submit }
  },

}
</script>

<style scoped>

</style>
