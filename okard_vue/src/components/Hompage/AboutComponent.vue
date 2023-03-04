<template>
    <section class="section" id="About Us">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="about-title text-center mb-5">
                        <h6 class="theme-text text-uppercase mb-0">Who We Are</h6>
                        <h3 class="title-heading">We provide substantial and quality building materials for your building
                            projects.</h3>
                        <div class="title-border"></div>
                        <p class="text-muted pt-3 mx-md-5">Innovation, Creativity, Safety, Integrity, Entrepreneurship,
                            Transparency, Accountability, and trust.</p>
                    </div>
                    <!--end about-title-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-center mb-4 pb-2">
                        <ul class="nav nav-pills about-tab" id="aboutus" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-3 active" id="mission-tab" data-bs-toggle="pill"
                                    data-bs-target="#mission" type="button" role="tab" aria-controls="mission"
                                    aria-selected="false">Mission & Vision</button>
                            </li>


                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-3 " id="history-tab" data-bs-toggle="pill"
                                    data-bs-target="#history" type="button" role="tab" aria-controls="history"
                                    aria-selected="true">History</button>
                            </li>

                            <!-- <li class="nav-item mx-3" role="presentation">
                                <button class="nav-link rounded-3" id="vision-tab" data-bs-toggle="pill"
                                    data-bs-target="#vision" type="button" role="tab" aria-controls="vision"
                                    aria-selected="false">Vision </button>
                            </li> -->


                        </ul>
                        <!--nav-->
                    </div>
                    <div class="tab-content about-content" id="tabContent">

                        <div class="tab-pane fade " id="history" role="tabpanel" aria-labelledby="history-tab">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="bounce history-img text-lg-end text-center mb-4 mb-lg-0">
                                        <img src="@/assets/images/mission.jpeg" alt="history"
                                            class="img-fluid rounded-circle">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-7">
                                    <div class="card border-0 p-3 ms-lg-4">
                                        <h4 class="about-title">History</h4>
                                        <p class="mt-4 pt-3 text-muted mb-2"><em>Lorem Ipsum has been the industry's
                                                standard dummy text ever make a type since the 1500s.</em></p>
                                        <p class="text-muted">
                                            When an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book. Lorem Ipsum has been the industry's standard dummy text
                                            ever since unknown printer took a galley of
                                            type and it to make a type specimen book.
                                        </p>
                                    </div>
                                    <!--end card-->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>

                        <!-- <div class="tab-pane fade " id="vision" role="tabpanel" aria-labelledby="vision-tab">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <div class="card border-0 p-3 me-lg-4">
                                        <h4 class="about-title">Vision</h4>
                                        <p class="mt-4 pt-3 text-muted mb-2"><em>Lorem Ipsum has been the industry's
                                                standard dummy text ever make a type since the 1500s.</em></p>
                                        <p class="text-muted">
                                            When an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book. Lorem Ipsum has been the industry's standard dummy text
                                            ever since unknown printer took a galley of
                                            type and it to make a type specimen book.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="bounce vision-img text-lg-end text-center mb-4 mb-lg-0">
                                        <img src="@/assets/images/mission.jpeg" alt="vision"
                                            class="img-fluid rounded-circle">
                                    </div>
                                </div>
                            </div>
                        </div> -->


                        <div class="tab-pane fade mission-tab show active" id="mission" role="tabpanel"
                            aria-labelledby="mission-tab">
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <div class="bounce mission-img text-lg-end text-center mb-4 mb-lg-0">
                                        <img src="@/assets/images/vision.jpeg" alt="mission"
                                            class="img-fluid rounded-circle">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-7">
                                    <div class="card border-0 p-3 ms-lg-4">
                                        <h4 class="mb-4 pb-2 about-title">Our Mission</h4>
                                        <div class="mission-box mt-3">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-eye mission-icon" aria-hidden="true"></i>
                                                <div class="ms-3">
                                                    <h5 class="mb-0">Vision</h5>
                                                    <p class="text-muted mb-0">Focus on our customers' needs in order to
                                                        provide highest construction services.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end mission-box-->
                                        <div class="mission-box ms-lg-4">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-rocket-takeoff mission-icon"></i>
                                                <div class="ms-3">
                                                    <h5 class="mb-0">Mission</h5>
                                                    <p class="text-muted mb-0">Render best services in real-estate
                                                        development and sales.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end mission-box-->
                                        <div class="mission-box">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-bullseye mission-icon"></i>
                                                <div class="ms-3">
                                                    <h5 class="mb-0">Values</h5>
                                                    <p class="text-muted mb-0">Innovation, Creativity, Safety, Integrity,
                                                        Entrepreneurship, Transparency, Accountability, and trust.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end mission-box-->
                                    </div>
                                    <!--end card-->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, .125);
    border-radius: .25rem;
}

.tab-content .about-title {
    position: relative;
}

.h4,
h4 {
    font-size: calc(1.275rem + .3vw);
}

.h6,
h6 {
    font-size: 1rem;
    font-weight: 500;
    line-height: 1.3;
}

p {
    font-size: 16px;
    line-height: 25px;
}

p {
    margin-top: 0;
    margin-bottom: 1rem;
}

p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}

.tab-content .about-title::before {
    content: "";
    position: absolute;
    width: 50px;
    height: 2px;
    background: var(--theme-color);
    bottom: -18px;
    transition: all 0.7s ease;
}

.tab-content .about-title::after {
    content: "";
    position: absolute;
    width: 100px;
    height: 2px;
    background: var(--theme-color);
    left: 0;
    bottom: -8px;
    transition: all 0.7s ease;
}

em {
    font-style: italic;
}

.text-muted {
    --bs-text-opacity: 1;
    color: #6c757d !important;
}

.tab-content .mission-tab .mission-box .mission-icon {
    /* width: 50px;
    height: 50px; */
    /* line-height: 75px; */
    font-size: 27px;
    /* color: var(--theme-color-faint); */
    text-align: center;
    /* border-radius: 50%; */
    /* border: 1px solid rgba(0, 0, 0, 0.125); */
    padding: 8px 14px;
    background-color: var(--theme-color-faint);
    background-color: #e6e3e3;
    border-radius: 100%;
}

.about-tab .nav-item .nav-link {
    padding: 5px 20px;
    border-radius: 8px;
    border: 2px solid;
    border-color: transparent;
    border-radius: 0;
    color: #0f105e;
    background: #ffffff;
    transition: all 0.5s ease;
}

.about-tab .nav-item .active {
    color: var(--theme-color);
    position: relative;
    background: var(--theme-color-faint);

}

.tab-content .mission-tab .mission-box {
    padding: 13px 0;
}
</style>