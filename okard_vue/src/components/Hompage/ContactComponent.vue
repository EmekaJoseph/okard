<template>
    <section class="section" id="Contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-5">
                        <h6 class="theme-text text-uppercase mb-0">Contact</h6>
                        <h3 class="text-capitalize">Let's talk about everything!</h3>
                        <div class="title-border"></div>
                        <p class="text-muted mt-3 mx-md-5">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact">
                        <div class="text-center text-lg-start">
                            <h5 class="title-heading">Contact Information:</h5>
                            <p class="text-muted mt-4">It is a long established fact that a reader will be distracted by
                                the readable content of a page when looking at its layout.</p>
                            <div class="contact-details mt-4 text-start">
                                <div class="row row-cols-lg-1 row-cols-md-2 row-cols-1">
                                    <div class="col">
                                        <p class="text-muted">
                                            <span class="text-dark f-19"><i class="bi bi-geo-alt"></i></span> 756
                                            Forest St. Fullerton, CA 92831
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted">
                                            <span class="text-dark f-19"><i class="bi bi-telephone"></i></span> +651
                                            8562
                                            1235
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted">
                                            <span class="text-dark f-19"><i class="bi bi-envelope-at"></i></span>
                                            example@design.com
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted">
                                            <span class="text-dark f-19"><i class="bi bi-whatsapp"></i></span> +21
                                            123
                                            56789
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end contact-->
                </div>
                <!--edn col-->
                <div class="col-lg-7">
                    <span id="error-msg"></span>
                    <form class="form mt-4 mt-lg-0">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12 col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12 col-md-6">
                                <div class="mb-3">
                                    <input type="tel" class="form-control" id="number" placeholder="Number">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <div class="mb-4 pb-3">
                                    <textarea class="form-control" placeholder="Leave a message here" id="comments"
                                        style="height: 100px;"></textarea>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <button type="submit" id="submit" name="send" value="Send Message"
                            class="btn float-end theme-btn">Send Message</button>
                    </form>
                    <!--end form-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
</template>

<style scoped>
h5 {
    font-weight: 500;
    line-height: 1.3;
    font-size: 1.25rem;
}



.form-control {
    font-size: 14px;
    color: #0f105e;
}

.form .form-control {
    padding: 14px 13px;
}

textarea.form-control {
    min-height: calc(1.5em + .75rem + 2px);
}

.form-control {
    display: block;
    width: 100%;
    /* padding: .375rem .75rem; */
    /* font-size: 1rem; */
    font-weight: 400;
    line-height: 1.5;
    /* color: #212529; */
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    /* -webkit-appearance: none; */
    /* -moz-appearance: none; */
    appearance: none;
    border-radius: .375rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.btn {
    padding: 12px 30px;
    font-size: 15px;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.5s;
    overflow: hidden;
    position: relative;
}

p {
    font-size: 16px;
    line-height: 25px;
    margin-bottom: 1rem;
}

.f-19 {
    font-size: 19px;
}
</style>