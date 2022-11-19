<template>
  <Head title="Portfolio | Create"/>
  <AppLayout>
    <div class="my-5 mx-auto w-50">
      <h1 class="text-center my-5 text-secondary fw-semibold text-decoration-none"><span class="text-primary border-bottom">{{ 'Добавить работу в портфолио' }}</span></h1>
      <form @submit.prevent="form.post(route('portfolio.store'))">
        <div class="mb-5">
          <label for="title" class="form-label">Название</label>
          <input type="text" id="title" name="title" class="form-control" v-model="form.title" >
          <div v-if="errors.title" class="text-danger fst-italic my-2">{{ errors.title }}</div>
        </div>
        <div class="mb-5">
          <label for="anons" class="form-label">Анонс</label>
          <input type="text" id="anons" name="anons" class="form-control" v-model="form.anons" >
          <div v-if="errors.anons" class="text-danger fst-italic my-2">{{ errors.anons }}</div>
        </div>

        <div class="mb-5">
          <label for="description" class="form-label">Содержание</label>
          <textarea name="description" id="description" class="form-control" rows="5" cols="3" v-model="form.description"></textarea>
          <div v-if="errors.description" class="text-danger fst-italic my-2">{{ errors.description }}</div>
        </div>
        <div class="mb-5">
          <input type="file" @input="form.main_photo = $event.target.files[0]" id="main_photo"/>
          <div v-if="errors.main_photo" class="text-danger fst-italic my-2">{{ errors.main_photo }}</div>
          <progress v-if="form.progress" :value="form.progress.percentage" max="100">
            {{ form.progress.percentage }}%
          </progress>
        </div>
        <div class="mb-5">
          <label for="price" class="form-label">Цена</label>
          <input type="text" id="price" name="price" class="form-control" v-model="form.price" >
          <div v-if="errors.price" class="text-danger fst-italic my-2">{{ errors.price }}</div>
        </div>
        <div class="d-flex flex-wrap gap-3 justify-content-around align-items-center mt-5 mb-3">
          <Link :href="route('portfolio.index')" class="btn btn-outline-primary"> Назад</Link>
          <button type="submit" class="btn btn-outline-secondary">Добавить</button>
        </div>
      </form>
    </div>
  </AppLayout>
</template>

<script>
import AppLayout from "../../Layouts/Auth.vue";
import {Head, Link, useForm} from '@inertiajs/inertia-vue3'

export default {
  name: "Create",
  components: {
    Head,
    Link,
    useForm,
    AppLayout
  },
  props: {
    errors: Object
  },
  setup(){
    const form = useForm({
      title: '',
      anons: '',
      description: '',
      main_photo: '',
      price: ''
    })

    return { form }
  }
}
</script>

<style scoped>

</style>
