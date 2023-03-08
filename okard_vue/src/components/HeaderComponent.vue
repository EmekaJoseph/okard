<script setup lang="ts">
import { ref, onMounted, watch } from 'vue';
import { RouterLink, useRoute } from 'vue-router';

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
    <nav class="navbar fixed-top navbar-expand-lg"
        :class="{ 'header-white': scrollAxis > 50 || route.name != 'Home', 'shadow-sm': scrollAxis > 50 || route.name != 'Home' }">
        <div class="container-fluid">
            <div class="navbar-brand">
                <RouterLink class="text-warning text-decoration-none" to="/">OKARD-HGV </RouterLink>
                <span v-if="route.name == 'Blog' || route.name == 'Blog_Details'">| Blog</span>
                <span v-if="route.name == 'About'">| About Us</span>
            </div>
            <button v-if="route.name == 'Home'" ref="toggler" class="navbar-toggler border-0 btn-sm" type="button"
                data-bs-toggle="collapse" data-bs-target="#nav-link-lists" aria-controls="nav-link-lists"
                aria-expanded="false" aria-label="Toggle navigation">
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
                        <RouterLink class="nav-link" :to="{ path: '/home', hash: '#Services' }">Services</RouterLink>
                    </li>

                    <li class="nav-item me-lg-3 hover-tiltY">
                        <a class="nav-link" href="#portfolio">Portfolio</a>
                    </li>

                    <li class="nav-item me-lg-3 hover-tiltY">
                        <RouterLink class="nav-link" to="/blog">Blog</RouterLink>
                    </li>

                    <li class="nav-item me-lg-3 d-none d-lg-block hover-tiltX">
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


.navbar .navbar-nav .nav-item .nav-link.active {
    color: #f15825 !important;
}

.nav-link-btn:hover {
    color: #fff !important;
}


@media (max-width: 994px) {
    .nav-item {
        margin-bottom: 20px;
    }
}

/* a:hover {
    color: var(--theme-color) !important;
} */
</style>
