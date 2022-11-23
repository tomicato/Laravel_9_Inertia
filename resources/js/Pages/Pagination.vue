<template>
 <div>

   <Component
       :is="link.url ? 'Link' : 'span'"
       v-for="link in links"
       :href="link.url"
       v-html="link.label"
       class="px-2 fs-4 text-decoration-none "
       :class="{'fw-bold text-success border border-success border-opacity-50 rounded-circle': link.active, 'fw-light text-secondary': !link.url, 'fw-bolder text-black-50': link.url && !link.active}"
   />
 </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3'

export default {
  name: "Pagination",
  props:{
    links: Array
  },
  components:{
    Link
  }
}
</script>

<style scoped>

</style>
