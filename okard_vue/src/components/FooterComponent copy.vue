<template>
    <section class="bg-footer text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="footer-info text-center text-md-start">
                        <a href="#">
                            <img src="images/logo-light.png" alt="logo" height="35">
                        </a>
                        <p class="text-white-50 mt-4">Praesent consectetur posuere bibendum. Pellentesque ac malesuada
                            arcu. Quisque vehicula nisi tristique tempus lacinia.</p>
                        <ul class="footer-social list-inline list-unstyled mt-3 justify-content-start">
                            <li class="social-link ms-0 list-inline-item">
                                <a href="#">
                                    <i class="mdi mdi-facebook"></i>
                                </a>
                            </li>
                            <!--end social-link-->
                            <li class="social-link list-inline-item">
                                <a href="#">
                                    <i class="mdi mdi-whatsapp"></i>
                                </a>
                            </li>
                            <!--end social-link-->
                            <li class="social-link list-inline-item">
                                <a href="#">
                                    <i class="mdi mdi-twitter"></i>
                                </a>
                            </li>
                            <!--end social-link-->
                            <li class="social-link list-inline-item">
                                <a href="#">
                                    <i class="mdi mdi-skype"></i>
                                </a>
                            </li>
                            <!--end social-link-->
                        </ul>
                        <!--end footer-social-->
                    </div>
                    <!--end footer-info-->
                </div>
                <!--end col-->
                <div class="col-lg-3 col-6">
                    <div class="footer-nav mt-4 mt-lg-2">
                        <h6 class="text-uppercase">Quick Links</h6>
                        <ul class="list-unstyled mt-3 f-15">
                            <li class="footer-item">
                                <a href="#" class="footer-link">Home</a>
                            </li>
                            <li class="footer-item">
                                <a href="#" class="footer-link">Career</a>
                            </li>
                            <li class="footer-item">
                                <a href="#" class="footer-link">Project</a>
                            </li>
                            <li class="footer-item">
                                <a href="#" class="footer-link">News</a>
                            </li>
                            <li class="footer-item">
                                <a href="#" class="footer-link pb-0">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                    <!--end footer-nav-->
                </div>
                <!--end col-->
                <div class="col-lg-3 col-6">
                    <div class="footer-nav mt-4 mt-lg-2">
                        <h6 class="text-uppercase">Categories</h6>
                        <ul class="list-unstyled mt-3">
                            <li class="footer-item"><a href="#" class="footer-link">Agency</a></li>
                            <li class="footer-item"><a href="#" class="footer-link">Business</a></li>
                            <li class="footer-item"><a href="#" class="footer-link">Page Builder</a></li>
                            <li class="footer-item"><a href="#" class="footer-link">Portfolio</a></li>
                        </ul>
                    </div>
                    <!--end footer-nav-->
                </div>
                <!--end col-->
                <div class="col-lg-2 col-6">
                    <div class="footer-nav mt-4 mt-lg-2">
                        <h6 class="text-uppercase">Support</h6>
                        <ul class="list-unstyled mt-3">
                            <li class="footer-item"><a href="#" class="footer-link">ThemeDeveloper</a></li>
                            <li class="footer-item"><a href="#" class="footer-link">ThemeDesdigns</a></li>
                        </ul>
                    </div>
                    <!--end footer-nav-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <div class="footer-alt py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="text-white-50 mb-0">
                            2023 © OKARD-HGV Designed By Proffie.Tech
                            <!-- <i class="mdi mdi-heart text-danger"></i>
                            <a class="text-white-50" href="#">Themesdesign</a> -->
                        </p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </div>
</template>

<style scoped>
.bg-footer {
    padding: 50px 0 40px 0;
    background: #262b2f;
    position: absolute;
    bottom: 0;
}

/* section {
    position: absolute;
    bottom: 0;
    width: 100%;
} */

img,
svg {
    vertical-align: middle;
}

.text-white-50 {
    --bs-text-opacity: 1;
    color: rgba(255, 255, 255, .5) !important;
}

.mt-4 {
    margin-top: 1.5rem !important;
}

p {
    font-size: 16px;
    line-height: 25px;
    margin-bottom: 1rem;
}

p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}

.mt-3 {
    margin-top: 1rem !important;
}

ul {
    display: block;
    list-style-type: disc;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
}

.text-uppercase {
    text-transform: uppercase !important;
    color: #fff;
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

.h6,
h6 {
    font-size: 1rem;
}

.footer-nav .footer-item {
    padding: 8px 0;
}

.footer-nav .footer-link {
    font-size: 15px;
    text-transform: capitalize;
    color: rgba(255, 255, 255, 0.5);
    transition: all 0.5s;
}

a {
    text-decoration: none !important;
    outline: none;
}

.footer-alt {
    background: #222629;
}

.py-3 {
    padding-top: 1rem !important;
    padding-bottom: 1rem !important;
}
</style>