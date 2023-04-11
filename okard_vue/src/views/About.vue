<template>
    <div class="bg-light" style="padding-bottom: 10rem;">
        <HeaderComponent />
        <div class="container">
            <section class="action-section">
                <div class="row justify-content-center gy-3">
                    <div class="col-md-12 mb-4">
                        <div class="topic-card">
                            <div class="topic-overlay">
                                <span>
                                    <div class="theme-text text-center">OKARD-HGV LIMITED</div>
                                    <h2 class="text-white text-center">About Us</h2>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row gy-3">

                            <div class="col-md-8 ">
                                <section>
                                    <b>OKARD-HGV LIMITED</b> is an award winning building construction firm based in Lagos
                                    State and serving clients throughout Nigeria. Our work encompasses every aspect of
                                    Building construction such as Real estate developing and sells, Building Designs and
                                    bill of quantity, Interior designs and decoration, Construction management, Production
                                    and sells of buildings materials such as Rebar, Aluminum roofing sheets, Tiles etc.
                                    OKARD-HGV LIMITED provide housing solutions for people and produce highest quality
                                    building materials, in order to provide standardized buildings, secure human lives, and
                                    most importantly ensure customer's satisfaction.Our aim is to be the best in building
                                    construction and provide a quality building materials; ensuring to meet our customers
                                    demands.
                                </section>

                                <section>
                                    <div class="title">Who We Are</div>
                                    We are a wide building construction firm that deals in real estate developing and
                                    sells, Building designs and bill of quantity, Interior designs and decoration, Building
                                    construction and management; renders housing services by helping our clients build and
                                    construct their dream home without stress. We also sell already built houses to take off
                                    the stress from them.. We provide substantial and quality building materials for your
                                    building projects. OKARD-HGV LIMITED is an Outstanding building construction firm for
                                    excellent housing production, we ensure that our customers' needs are met; which brings
                                    about our customers retention.
                                </section>

                                <section>
                                    <div class="title">Our Core Services:</div>
                                    We provide top- notch services.We deal in real estate developing and selling of
                                    residential and commercial houses, provide housing solutions to people.We render
                                    construction services to our clients with excellence performance to satisfy their
                                    needs.We provide and sell quality building materials such as: Rebar, Aluminum roofing
                                    sheets, Tiles etc and also at affordable prices.We also provide building plans and it's
                                    estimated cost for our clients.We provide top-notch housing services, such as the
                                    repairing and innovation of building.
                                </section>

                                <section>
                                    <div class="title">History:</div>
                                    OKARD-HGV LIMITED was established in 2015 by a Building engineer. Over the years, the
                                    company has undertaken many challenging building construction projects and accumulated
                                    skills, known-how and experience in designs and build solution, project materials
                                    services, building trades and related engineering works.

                                    <p>
                                        OKARD-HGV LIMITED takes on the role of main contractors for small to medium size
                                        projects and perform project management services to coordinate specialist trades for
                                        Residential and Commercial projects. We also provide design inputs and engineering
                                        solutions as value-add services to our clients.
                                    </p>

                                    <p>
                                        Our Objectives is to provide our clients an assured stable and quality buildings and
                                        we take total consideration of suitable and quality building materials selections in
                                        our projects. Our emphasis on communication and follow-through procedures ensures
                                        our clients objectives are top priority in the planning and execution of our
                                        processes.
                                    </p>
                                </section>

                                <section>
                                    <div class="title">Our projects management and execution philosophy are:</div>
                                    <ul>
                                        <li>Creat details schedule and resources plan to meet clients objectives.</li>
                                        <li>Communicate clearly with all projects stakeholders.</li>
                                        <li> Track project progress and fine-tune deviation.</li>
                                        <li> Supervise closely on quality of work done.</li>
                                        <li> Complete and commission the project on time.</li>
                                    </ul>
                                </section>

                                <section>
                                    <div class="title">Values:</div>
                                    Innovation, Creativity, Safety, Integrity, Entrepreneurship, Transparency,
                                    Accountability, and trust.
                                </section>

                                <section>
                                    <div class="title">Our Vision:</div>
                                    To render best service in real estate developing and sell, Construction management and
                                    provide outstanding and suitable building materials to our clients.To be the leader in
                                    providing top- notch services to our clients and be recognized.
                                </section>

                                <section>
                                    <div class="title">Our Mission:</div>
                                    To focus on our customers needs in order to provide highest construction services
                                    through the employment of trained personnel their task with honesty and fairness.
                                </section>




                            </div>


                            <div class="col-md-4">
                                <social_media_handles />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</template>

<script setup lang="ts">
import social_media_handles from '@/components/social_media_handles.vue';
import { onMounted } from 'vue';

onMounted(() => window.scrollTo(0, 0))
</script>

<style scoped>
.topic-card {
    /* overflow: hidden; */
    margin-top: -1px;
    height: 100%;
    background: url("@/assets/images/hero-image.jpg");
    background-size: cover;
    background-position: center center;
}

.topic-overlay {
    background-color: rgba(13, 15, 21, 0.788);
    min-height: inherit;
    padding: 20px 10px;

    display: flex;
    -ms-flex-pack: center;
    justify-content: center;
    -ms-flex-align: center;
    align-items: center;
    overflow: hidden;
}

section {
    margin-block: 27px;
    font-size: 16px;
    text-align: justify;
}

section .title {
    font-weight: bold;
    font-size: 1.2rem;
}
</style>


