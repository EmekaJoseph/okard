<template>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasMenu">MENU</h5>
            <button ref="closeBtn" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <!-- <div>
                Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images,
                lists, etc.
            </div> -->

            <ul class="menu-list" data-bs-dismiss="offcanvas">
                <li> <router-link to="/admin/account/dashboard">Dashboard</router-link> </li>
                <li> <router-link to="/admin/account/requests">Requests</router-link> </li>
                <li> <router-link to="/admin/account/enquiries">Enquiries</router-link> </li>
                <li> <router-link to="/admin/account/visitors">Visitors</router-link> </li>
                <li> <router-link to="/admin/account/uploads">Uploads</router-link> </li>
                <li> <router-link to="/admin/account/account">Account</router-link> </li>
                <li> <router-link to="/admin">Logout</router-link> </li>

            </ul>

        </div>
    </div>
</template>

<script setup lang="ts">
import { onBeforeRouteLeave } from 'vue-router';

import { ref } from 'vue';

const closeBtn = ref<any>(null)
onBeforeRouteLeave(() => {
    closeBtn.value.click()
})

</script>

<style scoped>
.menu-list {
    margin: 30px 0px;
}

.menu-list li {
    list-style-type: none;
    margin-block: 30px;
    font-size: 18px;
}

li a {
    text-decoration: none;
}

.active {
    background-color: var(--theme-color-bg);
    padding: 5px 30px 5px 5px;
    border-left: 1px solid var(--theme-color);
}

@media (max-width: 994px) {
    .offcanvas {
        width: 250px !important;
    }

    .menu-list li {
        font-size: 14px;
    }
}
</style>