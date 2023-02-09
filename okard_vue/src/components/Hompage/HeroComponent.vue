<template>
    <div class="hero" id="Home">
        <div class="trans-lay">
            <div class="container content-lay">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <p class="text-white text-center hero-sub fs-24">
                            Okard Height Global Ventures Limited
                        </p>
                        <h1 class="text-white text-center hero-heading">
                            Bulding Construction & Sales, Building Materials Merchandise
                        </h1>

                        <div class="text-center text-light">
                            We are <span class="text-white">REAL ESTATE DEVELOPERS</span>, we produce building
                            materials
                            like Rebar,
                            We sell building materials like Tiles, POP cements, Roofing-sheets, etc.
                        </div>

                        <div class="d-flex justify-content-center">
                            <button class="btn btn-lg theme-btn mt-3 mt-lg-4">
                                Connect With Us
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</template>

<style scoped>
.hero {
    /* overflow: hidden; */
    margin-top: -1px;
    height: 100%;
    /* background-color: #7dd34c59; */
    background-color: #cf8a4959;
    /* background: url("@/assets/images/hero5.jpeg"); */
    background: url("@/assets/images/hero-image.jpg");
    background-size: cover;
    background-position: center center;
}

.trans-lay {
    background-color: rgba(13, 15, 21, 0.651);
    min-height: inherit;
    padding-top: 200px;
    padding-bottom: 100px;


    display: flex;
    -ms-flex-pack: center;
    justify-content: center;
    -ms-flex-align: center;
    align-items: center;
    /* transition: 1.8s ease-in-out; */
    overflow: hidden;
}

.content-lay {
    opacity: 1;
}

@media (min-width: 994px) {
    .trans-lay {
        padding-top: 300px;
    }
}

.text-light {
    color: rgba(255, 255, 255, .5) !important;
    margin-top: 1.5rem !important;
    font-size: 16px;
}

.hero-heading {
    font-weight: 500;
    font-size: calc(1.425rem + 2.1vw);
    margin-top: 1.5rem !important;
}

.fs-24 {
    font-size: 23px;
    margin-bottom: 1rem;
}

.hero-heading {
    animation-name: moveInRight;
    animation-duration: 3s;
}

.hero-sub {
    animation-name: moveInleft;
    animation-duration: 3s;
}
</style>
