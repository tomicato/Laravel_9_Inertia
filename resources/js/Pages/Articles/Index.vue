<template>
  <Head title="Articles"/>
  <AppLayout>
    <div class="my-5 mx-auto w-75 text-center">
      <h2 class="text-center my-5 text-secondary fw-semibold">
        <Link :href="route('articles-mix.create')" class="text-decoration-none">{{ 'Добавить статью' }}</Link>

      </h2>
      <div class="card w-auto w-75 p-3 my-5 mx-auto" v-for="(article, ind) in mix" :key="ind">
        <h3 class=" mt-5 mb-3"><i class="bi bi-bar-chart"></i> {{ article.title }}</h3>
        <p>{{ article.content }}</p>
        <p class="text-primary"><em>{{ date(ind) }}</em></p>
        <div class="d-flex flex-wrap gap-3 justify-content-around align-items-center my-5">
          <Link :href="route('articles-mix.edit', article.id)" class="btn btn-outline-secondary">{{ 'Редактировать статью' }}</Link>
          <form @submit.prevent="form.delete(route('articles-mix.destroy', article.id))">
            <button type="submit" class="btn btn-outline-danger">{{ 'Удалить статью' }}</button>
          </form>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script>
import AppLayout from '../../Layouts/Auth.vue'
import {Head, Link, useForm} from '@inertiajs/inertia-vue3'

export default {
  name: "Index",
  props: {
    mix: Object,
    create_url: String,
    auth_user: Object
  },
  data(){
    return{
      name: null
    }
  },

  components: {
    Head,
    Link,
    useForm,
    AppLayout
  },
  setup () {
    const form = useForm({
    })

    return { form }
  },
  created() {
    //console.log(this.mix);
  },
  computed: {

  },
  mounted() {
    //console.log(this.mix);
  },

  methods: {
    date(i) {

      const options = {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', timeZone: 'UTC'}
      const dt = this.mix[i]['created_at']
      const ndt = new Date(dt)

      let hour = ndt.getUTCHours(),
          minute = ndt.getUTCMinutes(),
          second = ndt.getUTCSeconds();

      minute = (minute < 10) ? '0' + minute : minute;
      second = (second < 10) ? '0' + second : second;
      hour = (hour < 10) ? '0' + hour : hour;

      return `${ndt.toLocaleString('ru-RU', options)} - ${hour}:${minute}`

    },

  },
}
</script>

<style lang="scss" scoped>
  .card{
    box-shadow: 1px 1px 7px rgba(0,0,0,0.1);
    &:hover{
      box-shadow: 1px 1px 15px rgba(0,0,0,0.2);
    }
  }
</style>
