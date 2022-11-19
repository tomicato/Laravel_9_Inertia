<template>
   <div class="d-flex w-100 justify-content-start align-items-center">
     <Link :href="route('articles-inertia.index')" :class="`${$page.component === 'Index' ? 'text-decoration-none text-secondary fs-5 fw-semibold t-underline mx-3' : 'top_1 fw-normal text-decoration-none text-secondary fs-5 mx-3'}`">Home</Link>
     <Link :href="route('articles-inertia.about')" :class="`${$page.component === 'About' ? 'text-decoration-none text-secondary fs-5 fw-semibold t-underline' : 'top_1 fw-normal text-decoration-none text-secondary fs-5'}`">About</Link>
   </div>

    <slot/>


</template>

<script>
import {Link} from "@inertiajs/inertia-vue3"

export default {
  name: "App",
  components:{
    Link
  },


}
</script>

<style lang="scss" scoped>
.t-underline {
  border-bottom: 0.001em solid #cccccc;
}
.top_1{
  margin-top: -0.001em;
}
</style>
