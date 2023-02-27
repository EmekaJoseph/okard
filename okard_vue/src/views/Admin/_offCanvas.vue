<template>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasMenu">MENU</h5>
            <button ref="closeBtn" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <ul class="menu-list" data-bs-dismiss="offcanvas">
                <!-- <li>
                    <router-link to="/admin/account/dashboard">
                        <i class="bi bi-menu-app"></i> Dashboard
                    </router-link>
                </li> -->
                <li>
                    <router-link to="/admin/account/requests">
                        <i class="bi bi-chat-left-text"></i> Requests
                    </router-link>
                </li>
                <li>
                    <router-link to="/admin/account/uploads">
                        <i class="bi bi-cloud-upload"></i> Uploads
                    </router-link>
                </li>
                <li>
                    <router-link to="/admin/account/blogpost">
                        <i class="bi bi-newspaper"></i> Blog
                    </router-link>
                </li>
                <li>
                    <router-link to="/admin/account/account">
                        <i class="bi bi-person-gear"></i> Account
                    </router-link>
                </li>
                <li> <span @click="logout" class="btn logout-btn py-0 mt-5">Logout</span> </li>

            </ul>

        </div>
    </div>
</template>

<script setup lang="ts">
import { onBeforeRouteLeave } from 'vue-router';
import { ref } from 'vue';
import { useAccount } from '@/stores/admin/account'
import { useRouter } from 'vue-router';


const account = useAccount();
const router = useRouter();
const closeBtn = ref<any>(null)

onBeforeRouteLeave(() => {
    closeBtn.value.click()
})

function logout() {
    account.state = account.nullState;
    router.replace({
        path: '/admin'
    })
}
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

li a:hover {
    color: var(--theme-color);
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

.logout-btn {
    background-color: var(--bs-black);
    color: #fff;
}

.logout-btn:hover {
    background-color: var(--bs-black);
    color: #fff;
}
</style>