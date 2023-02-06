<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { RouterLink } from 'vue-router';

const scrollAxis = ref(0)

onMounted(() => {
    window.addEventListener("scroll", function () {
        scrollAxis.value = window.scrollY;
    })
})

function link_to(name: any) {
    //@ts-ignore
    window.location = `#${name}`
}

</script>

<template>
    <nav class="navbar fixed-top navbar-expand-lg"
        :class="{ 'header-white': scrollAxis > 100, 'shadow-sm': scrollAxis > 100 }">
        <div class="container-fluid">
            <a class="navbar-brand text-warning" href="#">OKARD-HGV</a>
            <button class="navbar-toggler border-0 btn-sm" type="button" data-bs-toggle="collapse"
                data-bs-target="#nav-link-lists" aria-controls="nav-link-lists" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="container">
            <div class="collapse navbar-collapse" id="nav-link-lists">
                <ul class="navbar-nav mb-2 mb-lg-0" data-bs-toggle="collapse" data-bs-target="#nav-link-lists">
                    <li class="nav-item me-lg-3" @click="link_to('top')">
                        <RouterLink class="nav-link" to="/">Home</RouterLink>
                        <!-- <a class="nav-link " aria-current="page" href="#">Home</a> -->
                    </li>
                    <li class="nav-item me-lg-3" @click="link_to('about')">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item me-lg-3" @click="link_to('services')">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item me-lg-3">
                        <a class="nav-link" href="#">Porfolio</a>
                    </li>
                    <li class="nav-item me-lg-3">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item me-lg-5">
                        <a class="nav-link" href="#">CONTACT US</a>
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
</style>
