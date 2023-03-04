<template>
    <div class="over_all">
        <div class="container">


            <div class="row justify-content-center">

                <!-- <div class="col-md-10 col-lg-8"> -->
                <div>
                    <h6 class="mb-3">
                        <i class="bi bi-newspaper"></i> Blog List:

                        <RouterLink class="btn btn-sm p-0 m-0 px-3 theme-b fw-bold theme-text float-end "
                            to="/admin/account/blogpost_new">
                            <i class="bi bi-plus-circle-dotted"></i> New Post
                        </RouterLink>

                    </h6>
                    <div class="card border-0 main">

                        <div v-if="blog.loading" class="card-body">
                            <PageLoading />
                        </div>

                        <div v-else class="card-body pt-5">
                            <div v-if="!blog.list.length" class="text-center fs-4 text-muted my-5">No list, add blog</div>
                            <div v-else class="table-responsive table-sm text-nowrap ">
                                <table class="table">
                                    <tbody>
                                        <tr v-for="(line, index) in blog.list" :key="index">
                                            <th>{{ (index + 1) }}</th>
                                            <td>{{ fxn.truncateStr(line.title, 30) }}</td>
                                            <th class="text-muted xsmall">{{ timeago(line.created_at) }}</th>
                                            <td @click="deletePost(line.blog_id)">
                                                <button class="btn btn-sm p-0 m-0 text-danger">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import useFunction from '@/stores/functions/useFunction';
import { blogDelete } from '@/stores/functions/axiosInstance';
import { useBlogStore } from '@/stores/blog';
import { useTimeAgo } from '@vueuse/core'

const timeago = (date: Date) => useTimeAgo(new Date(date));
// const dateFormatt = (date: Date) => useDateFormat(new Date(date), 'DD-MMM-YY');

const blog = useBlogStore();

onMounted(() => {
    window.scrollTo(0, 0);
    blog.getList()
})

const fxn = useFunction.fx

function deletePost(id: any) {
    fxn.Confirm(``, 'Confirm delete', 'warning')
        .then(async (result) => {
            if (result.isConfirmed) {
                await blogDelete(id)
                fxn.Toast('deleted', 'success')
                blog.getList()
            }
        })
}

</script>

<style scoped>
.over_all {
    min-height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-bottom: 4rem;
    padding-top: 2rem;
}

.main {
    /* min-height: 300px; */
    min-height: 600px;
}
</style>