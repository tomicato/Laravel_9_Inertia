<template>
  <Head :title="`Edit Article №${article.id}`"></Head>
  <AppLayout>
    <div style="margin: 50px auto; width: 50%;">
      <h1 class="text-center my-5 text-secondary fw-semibold">{{ `Редактировать статью «${article.title}»` }}</h1>
      <form @submit.prevent="form.put(route('articles-mix.update', article.id))">
        <div class="mb-5">
          <label for="title" class="form-label">Название</label>
          <input type="text" id="title" name="title" class="form-control" v-model="form.title">
          <div v-if="errors.title" class="text-danger fst-italic my-2">{{ errors.title }}</div>
        </div>
        <div class="mb-5">
          <label for="content" class="form-label">Содержание</label>
          <textarea name="content" id="content" class="form-control" rows="5" cols="3"
                    v-model="form.content"></textarea>
          <div v-if="errors.content" class="text-danger fst-italic my-2">{{ errors.content }}</div>
        </div>
        <div class="d-flex flex-wrap gap-3 justify-content-around align-items-center mt-5 mb-3">
          <Link :href="route('articles-mix.index')" class="btn btn-outline-primary" preserve-scroll> Назад</Link>
          <button type="submit" class="btn btn-outline-secondary">Изменить</button>
        </div>
      </form>
    </div>
  </AppLayout>
</template>

<script>
import {Head, Link, useForm} from '@inertiajs/inertia-vue3'
import AppLayout from '../../Layouts/Auth.vue'

export default {
  name: "Edit",
  props: {
    article: Object,
    errors: Object
  },
  created() {
    // console.log(this.article);
  },
  components: {Link, Head, useForm, AppLayout},
  setup(props) {
    const form = useForm({
      title: props.article.title,
      content: props.article.content,
    })

    return {form}
  }

}
</script>

<style scoped>

</style>
