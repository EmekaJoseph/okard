<template>
    <section class="section bg-blog bg-light" id="services">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-5">
                        <h6 class="theme-text mb-0 text-uppercase">Our Services</h6>
                        <h3 class="title-heading text-capitalize">What we have to offer you</h3>
                        <div class="title-border"></div>
                        <p class="text-muted mt-3 mx-md-5"> </p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <div class="row gy-4">
                <div class="col-lg-3">
                    <div class="card h-100  blog  rounded-3 mt-4 mt-lg-0 service-card">
                        <img src="@/assets/images/serv1.jpeg" alt="01" class="img-fluid rounded-top">

                        <div class="blog-content card-body mt-2">
                            <a href="#" class="h5">
                                Request for Bill of Quantity (Building cost estimates)
                            </a>
                            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting...
                            </p>
                        </div>
                        <!--end blog-content-->
                    </div>
                    <!--end blog-->
                </div>
                <!--end col-->
                <div class="col-lg-3">
                    <div class="card h-100  blog  rounded-3 mt-4 mt-lg-0 service-card">
                        <img src="@/assets/images/serv2.jpeg" alt="02" class="img-fluid rounded-top">
                        <div class="blog-content card-body mt-2">

                            <a href="#" class="h5">
                                Request for Building Plans
                            </a>
                            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting...
                            </p>
                        </div>
                        <!--end blog-content-->
                    </div>
                    <!--end blog-->
                </div>
                <!--end col-->
                <div class="col-lg-3">
                    <div class="card h-100 blog rounded-3 mt-4 mt-lg-0 service-card">
                        <img src="@/assets/images/serv3.jpeg" alt="03" class="img-fluid rounded-top">

                        <div class="blog-content card-body mt-2">
                            <a href="#" class="h5">
                                Buy Properties
                            </a>
                            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting...
                            </p>
                        </div>
                        <!--end blog-content-->
                    </div>
                    <!--end blog-->
                </div>
                <div class="col-lg-3">
                    <div class="card h-100 blog rounded-3 mt-4 mt-lg-0 service-card">
                        <img src="@/assets/images/serv4.jpg" alt="03" class="img-fluid rounded-top">

                        <div class="blog-content card-body mt-2">
                            <a href="#" class="h5">
                                Buy Building Materials
                            </a>
                            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting...
                            </p>
                        </div>
                        <!--end blog-content-->
                    </div>
                    <!--end blog-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
</template>

<style scoped>
.rounded-top {
    border-top-left-radius: .25rem !important;
    border-top-right-radius: .25rem !important;
}

.img-fluid {
    max-width: 100%;
    height: auto;
}

img,
svg {
    vertical-align: middle;
}

img {
    overflow-clip-margin: content-box;
    overflow: clip;
}

.blog {
    color: #687179;
    box-shadow: rgba(0, 0, 0, 0.11) 0px 1px 2px;
}

.badge {
    display: inline-block;
    padding: .35em .65em;
    font-size: .75em;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
}

h5 {
    display: block;
    /* font-size: 0.83em; */
    margin-block-start: 1.67em;
    margin-block-end: 1.67em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    /* font-weight: bold; */
}

.blog-content a {
    color: #0f105e;
    transition: all 0.5s ease;
}

a {
    text-decoration: none !important;
    outline: none;
}

.card-body {
    flex: 1 1 auto;
    padding: 1rem 1rem;
}

.mt-2 {
    margin-top: .5rem !important;
}

.h5,
h5 {
    font-size: 1.25rem;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Poppins", sans-serif;
    font-weight: 500;
    line-height: 1.3;
}

.service-card {
    cursor: pointer;
    transition: 0.8s ease-in-out;
}

.service-card:hover {
    transform: scale(1.03);
    border: 1px solid var(--theme-color-faint) !important;
    box-shadow: 0 1rem 3rem rgba(black, .175) !important;
}

.service-card:hover a {
    color: var(--theme-color)
}
</style>