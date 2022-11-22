<template>
  <Head :title="`Edit Article №${portfolio.id}`"></Head>
  <AppLayout>
    <div id="portfolio_edit">
      <h1 class="text-center my-5 text-secondary fw-semibold">{{ `Редактировать портфолио` }}</h1>
      <form @submit.prevent="submit">
        <div class="mb-5">
          <label for="title" class="form-label">Название</label>
          <input type="text" id="title" name="title" class="form-control" v-model="form.title">
          <div v-if="errors.title" class="text-danger fst-italic my-2">{{ errors.title }}</div>
        </div>
        <div class="mb-5">
          <label for="anons" class="form-label">Анонс</label>
          <input type="text" id="anons" name="anons" class="form-control" v-model="form.anons">
          <div v-if="errors.anons" class="text-danger fst-italic my-2">{{ errors.anons }}</div>
        </div>
        <div class="mb-5">
          <label for="description" class="form-label">Содержание</label>
          <textarea name="description" id="description" class="form-control" rows="5" cols="3"
                    v-model="form.description"></textarea>
          <div v-if="errors.description" class="text-danger fst-italic my-2">{{ errors.description }}</div>
        </div>
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-5">
           <img :src="`/uploads/portfolio/${form.old_photo}`" style="max-width: 250px" :alt="form.title" class="img-fluid mt-3">
          <div class="mt-3">
            <input type="file" @input="form.main_photo = $event.target.files[0]" id="main_photo"/>
            <div v-if="errors.main_photo" class="text-danger fst-italic my-2">{{ errors.main_photo }}</div>
            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
              {{ form.progress.percentage }}%
            </progress>
          </div>

        </div>
        <div class="mb-5">
          <label for="price" class="form-label">Стоимость</label>
          <input type="text" id="price" name="price" class="form-control" v-model="form.price">
          <div v-if="errors.price" class="text-danger fst-italic my-2">{{ errors.price }}</div>
        </div>
        <div class="d-flex flex-wrap gap-3 justify-content-around align-items-center mt-5 mb-3">
          <Link :href="route('portfolio.index')" class="btn btn-outline-primary" preserve-scroll> Назад</Link>
          <button type="submit" class="btn btn-outline-secondary">Изменить</button>
        </div>
      </form>
    </div>
  </AppLayout>
</template>

<script>
import {Head, Link, useForm} from '@inertiajs/inertia-vue3'
import AppLayout from '../../Layouts/Auth.vue'
import { Inertia } from  '@inertiajs/inertia'

export default {
  name: "Edit",
  props:{
    portfolio: Object,
    errors: Object
  },
  components: {
    AppLayout,
    Head,
    Link,
    useForm
  },
  setup(props){
    const form = useForm({
      id: props.portfolio.id,
      title: props.portfolio.title,
      anons: props.portfolio.anons,
      description: props.portfolio.description,
      main_photo: '',
      old_photo: props.portfolio.main_photo,
      price: props.portfolio.price,
    })

    function submit(){
      Inertia.post(`/portfolio/${form.id}`, {
        _method: 'put',
        id: form.id,
        title: form.title,
        anons: form.anons,
        description: form.description,
        main_photo: form.main_photo,
        price: form.price,
      })
    }

    return { form, submit }
  }
}
</script>

<style lang="scss" scoped>
#portfolio_edit{
  margin: 50px auto;
  width: 50%;
}
@media screen and (max-width: 1024px){
  #portfolio_edit{
    width: 85%;
  }
}
</style>
