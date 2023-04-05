<script setup lang="ts">
import { ref, onMounted, watch } from 'vue';
import { RouterLink, useRoute } from 'vue-router';
import cartModal from '@/components/modals/cartModal.vue';
import { useImageSlides } from '@/stores/imageSlides'

const images = useImageSlides()

const route = useRoute()

const toggler: any = ref(null)
watch(() => route.hash, () => {
    if (route.hash) {
        if (window.innerWidth <= 994) {
            toggler.value.click()
        }
    }
})

const scrollAxis = ref(0)

onMounted(() => {
    window.addEventListener("scroll", function () {
        scrollAxis.value = window.scrollY;
    })
})

</script>

<template>
    <cartModal />

    <nav class="navbar fixed-top navbar-expand-lg header-white"
        :class="{ 'header-white': scrollAxis > 50 || route.name != 'Home', 'shadow-sm': scrollAxis > 50 || route.name != 'Home' }">
        <div class="container-fluid">
            <div class="navbar-brand">
                <RouterLink class="text-warning text-decoration-none header-logo d-none d-md-block" to="/">
                    <!-- <img class="" src="@/assets/images/logo/logo1.png" v-if="scrollAxis < 50 && route.name == 'Home'"> -->
                    <img src="@/assets/images/logo/logo1.png">
                </RouterLink>

                <RouterLink class="text-warning text-decoration-none header-logo  d-md-none" to="/">
                    <img src="@/assets/images/logo/logo1.png">
                </RouterLink>
                <!-- <span v-if="route.name == 'Blog' || route.name == 'Blog_Details'">| Blog</span> -->
                <!-- <span v-if="route.name == 'About'">| About Us</span> -->

            </div>


            <!-- cart icon -->
            <a v-if="images.cart.length" @click.prevent href="#" data-bs-toggle="modal" data-bs-target="#cartModal"
                class="position-relative ">
                <i class="bi bi-cart3"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark fw-light">
                    {{ images.cart.length }}
                    <span class="visually-hidden"></span>
                </span>
            </a>


            <button ref="toggler" class="navbar-toggler border-0 btn-sm" type="button" data-bs-toggle="collapse"
                data-bs-target="#nav-link-lists" aria-controls="nav-link-lists" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <!-- <div class="container" v-if="route.name == 'Home' || route.name == 'About'"> -->
        <div class="container">
            <div class="collapse navbar-collapse" id="nav-link-lists">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item me-lg-3 hover-tiltY">
                        <RouterLink class="nav-link" :to="{ path: '/', hash: '#Home' }">Home</RouterLink>
                    </li>

                    <li class="nav-item me-lg-3 hover-tiltY">
                        <RouterLink class="nav-link" to="/about">About Us</RouterLink>
                    </li>

                    <li class="nav-item me-lg-3 hover-tiltY">
                        <RouterLink class="nav-link hash-link text-white" :class="{ 'active': route.hash == '#Services' }"
                            :to="{ path: '/home', hash: '#Services' }">
                            Services
                        </RouterLink>
                    </li>

                    <li class="nav-item me-lg-3 hover-tiltY">
                        <!-- <a class="nav-link" href="#portfolio">Portfolio</a> -->
                        <RouterLink class="nav-link" to="/portfolio">Portfolio</RouterLink>
                    </li>

                    <li class="nav-item me-lg-3 hover-tiltY">
                        <RouterLink class="nav-link" to="/blog">Blog</RouterLink>
                    </li>

                    <li v-if="route.name == 'Home'" class="nav-item me-lg-3 d-none d-lg-block hover-tiltX">
                        <a class="nav-link-btn btn btn-sm p-1 px-3 theme-btn" href="/#Contact">Contact Us</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</template>

<style scoped>
.navbar {
    transition: all ease-in-out 0.4s;
    background-color: #fff;
}



@media (min-width: 994px) {
    .navbar {
        background-color: transparent;
    }

    .navbar-brand {
        margin-left: 100px !important;
    }

    .navbar ul li a {
        color: #fff;
    }
}


.header-white {
    background-color: #fff;
}

.header-white ul li a {
    color: black;
}

.header-white ul li a.hash-link {
    color: black !important;
}


.navbar .navbar-nav .nav-item .nav-link.active {
    color: #f15825;
}

.nav-link-btn:hover {
    color: #fff !important;
}

.navbar-brand .header-logo img {
    width: 170px;
}


@media (max-width: 994px) {
    .nav-item {
        margin-bottom: 10px;
        margin-left: 10px;
    }

    ul li a.hash-link {
        color: rgba(0, 0, 0, 0.74) !important;
    }

    .navbar-brand .header-logo img {
        width: 150px;
    }
}

/* a:hover {
    color: var(--theme-color) !important;
} */
</style>
