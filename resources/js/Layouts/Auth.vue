<template>
  <!-- Navigation  -->
  <nav class="navbar navbar-expand-lg bg-light w-75 mx-auto my-5" id="head_menu">
    <div class="container-fluid">
      <Link :href="route('test')">
        <svg width="50" height="52" viewBox="0 0 50 52" xmlns="http://www.w3.org/2000/svg" class="me-5">
          <title>Lara Inertia</title>
          <path
              d="M49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1-.402.694l-9.209 5.302V39.25c0 .286-.152.55-.4.694L20.42 51.01c-.044.025-.092.041-.14.058-.018.006-.035.017-.054.022a.805.805 0 0 1-.41 0c-.022-.006-.042-.018-.063-.026-.044-.016-.09-.03-.132-.054L.402 39.944A.801.801 0 0 1 0 39.25V6.334c0-.072.01-.142.028-.21.006-.023.02-.044.028-.067.015-.042.029-.085.051-.124.015-.026.037-.047.055-.071.023-.032.044-.065.071-.093.023-.023.053-.04.079-.06.029-.024.055-.05.088-.069h.001l9.61-5.533a.802.802 0 0 1 .8 0l9.61 5.533h.002c.032.02.059.045.088.068.026.02.055.038.078.06.028.029.048.062.072.094.017.024.04.045.054.071.023.04.036.082.052.124.008.023.022.044.028.068a.809.809 0 0 1 .028.209v20.559l8.008-4.611v-10.51c0-.07.01-.141.028-.208.007-.024.02-.045.028-.068.016-.042.03-.085.052-.124.015-.026.037-.047.054-.071.024-.032.044-.065.072-.093.023-.023.052-.04.078-.06.03-.024.056-.05.088-.069h.001l9.611-5.533a.801.801 0 0 1 .8 0l9.61 5.533c.034.02.06.045.09.068.025.02.054.038.077.06.028.029.048.062.072.094.018.024.04.045.054.071.023.039.036.082.052.124.009.023.022.044.028.068zm-1.574 10.718v-9.124l-3.363 1.936-4.646 2.675v9.124l8.01-4.611zm-9.61 16.505v-9.13l-4.57 2.61-13.05 7.448v9.216l17.62-10.144zM1.602 7.719v31.068L19.22 48.93v-9.214l-9.204-5.209-.003-.002-.004-.002c-.031-.018-.057-.044-.086-.066-.025-.02-.054-.036-.076-.058l-.002-.003c-.026-.025-.044-.056-.066-.084-.02-.027-.044-.05-.06-.078l-.001-.003c-.018-.03-.029-.066-.042-.1-.013-.03-.03-.058-.038-.09v-.001c-.01-.038-.012-.078-.016-.117-.004-.03-.012-.06-.012-.09v-.002-21.481L4.965 9.654 1.602 7.72zm8.81-5.994L2.405 6.334l8.005 4.609 8.006-4.61-8.006-4.608zm4.164 28.764l4.645-2.674V7.719l-3.363 1.936-4.646 2.675v20.096l3.364-1.937zM39.243 7.164l-8.006 4.609 8.006 4.609 8.005-4.61-8.005-4.608zm-.801 10.605l-4.646-2.675-3.363-1.936v9.124l4.645 2.674 3.364 1.937v-9.124zM20.02 38.33l11.743-6.704 5.87-3.35-8-4.606-9.211 5.303-8.395 4.833 7.993 4.524z"
              fill="#FF2D20" fill-rule="evenodd"/>
        </svg>
      </Link>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mt-3" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item mt-2">
            <Link :href="route('test')"
                  :class="`${$page.component === 'Test' ? 'text-decoration-none text-secondary fs-5 fw-semibold t-underline me-3 ms-0' : 'top_1 fw-normal text-decoration-none text-secondary fs-5 ms-0 me-3'}`">
              Home
            </Link>
          </li>
          <li class="nav-item mt-2">
            <Link :href="route('articles-mix.index')"
                  :class="`${$page.component === 'Articles/Index' ? 'text-decoration-none text-secondary fs-5 fw-semibold t-underline mx-3 ms-0' : 'top_1 fw-normal text-decoration-none text-secondary fs-5 ms-0 mx-3'}`">
              Articles
            </Link>
          </li>
          <li class="nav-item mt-2">
            <Link :href="route('portfolio.index')"
                  :class="`${$page.component === 'Portfolio/Index' ? 'text-decoration-none text-secondary fs-5 fw-semibold t-underline mx-3 ms-0' : 'top_1 fw-normal text-decoration-none text-secondary fs-5 ms-0 mx-3'}`">
              Portfolio
            </Link>
          </li>


          <li class="nav-item mt-2 dropdown">
            <a class="top_1 fw-normal text-decoration-none text-secondary fs-5 mx-3  ms-0 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>

        </ul>

        <div class="d-flex justify-content-start align-items-center">

          <div v-if="$page.props.auth_user === null">
            <Link :href="route('login.form')" class="top_1 fw-normal text-decoration-none text-secondary fs-5">{{
                'Login'
              }}
            </Link>
          </div>

          <div v-else>
            <Link :href="`#`"
                  :class="`${$page.props.auth_user !== null ? 'text-decoration-none text-secondary fs-5 fw-semibold t-underline me-3' : 'top_1 fw-normal text-decoration-none text-secondary fs-5 me-3'}`">
              {{ $page.props.auth_user.name }}
            </Link>
            <Link href="/logout-mix" method="post" as="button" type="button" style="all: unset;cursor: pointer;"
                  class="top_1 fw-normal text-decoration-none text-secondary fs-5">
              {{ 'Logout' }}
            </Link>


          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Flash Message  -->
  <div v-if="$page.props.flash.message" class="text-secondary text-center fs-3 fw-semibold">
    {{ $page.props.flash.message }}
  </div>

  <!-- Main Content  -->
  <div id="main_content">
  <slot/>
  </div>
  <!-- Footer  -->
  <Footer/>

</template>


<script>
import {Link, useForm} from "@inertiajs/inertia-vue3"
import Footer from "./Footer";

export default {
  name: "Auth",
  components: {
    Link,
    Footer
  },
  props: {
    flash: String,
    auth_user: Object
  },
  setup() {
    const form = useForm({})

    return {form}
  },
  methods: {
    logout(e) {
      e.preventDefault();
    }
  }
}

</script>

<style lang="scss">
.t-underline {
  border-bottom: 0.001em solid #cccccc;
}

.top_1 {
  margin-top: -0.001em;
}

@media screen and (max-width: 1024px){
  #head_menu{
    width: 100%!important;
    margin-top: 2rem!important;
    padding-left: 20px;
    padding-right: 20px;
  }
}

.navbar-toggler:focus{
  outline: 0;
  box-shadow: unset!important;
}

#main_content{
  min-height: 100vh;
}
</style>
