<template>
    <div class="account">
        <div class="container">
            <h5 class="mb-3 text-center"> Change Password: </h5>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-5">
                    <div class="card p-2">
                        <div class="card-body p-lg-4 py-5">
                            <div class="row gy-3">
                                <div class="col-12">
                                    <input type="text" class="form-control form-control-lg" placeholder="old password">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control form-control-lg" placeholder="new password">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control form-control-lg"
                                        placeholder="repeat password">
                                </div>
                                <div class="col-12">
                                    <button class="btn theme-btn w-100 btn-lg">Change</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<script setup lang="ts">

</script>

<style scoped>
.account {
    min-height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-bottom: 4rem;
    padding-top: 2rem;
}

.main {
    min-height: 600px;
}
</style>