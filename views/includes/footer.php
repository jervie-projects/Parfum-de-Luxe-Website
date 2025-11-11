<!-- INFORMATIONS -->
<div class="end_content mt-5" style="font-family: Montserrat">
    <div class="container">
        <div class="row justify-content-center text-center">

            <!-- FIRST ROW -->
            <div class="col-md-4 mb-4">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="content-box">
                            <h5 class="fw-bold">Customer Service</h5>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="content-box">
                            <a href="<?php $this->url('aboutus#contact'); ?>" 
                               class="text-link text-decoration-none text-black">
                               Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECOND ROW -->
            <div class="col-md-4 mb-4">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="content-box">
                            <h5 class="fw-bold">Our Company</h5>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="content-box">
                            <a href="<?php $this->url('aboutus#about'); ?>" 
                               class="text-link text-decoration-none text-black">
                               About Us
                            </a>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="content-box">
                            <a href="<?php $this->url('aboutus#developerInfo'); ?>" 
                               class="text-link text-decoration-none text-black">
                               Developer Info
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- THIRD ROW -->
            <div class="col-md-4 mb-4">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="content-box">
                            <h5 class="fw-bold">Social</h5>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="content-box">
                            <a href="https://instagram.com" target="_blank" 
                               class="text-link text-decoration-none text-black">
                               Instagram
                            </a>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="content-box">
                            <a href="https://facebook.com" target="_blank" 
                               class="text-link text-decoration-none text-black">
                               Facebook
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- BOOTSTRAP SCRIPT -->
<script src="<?php $this->assets('scripts', 'bootstrap.bundle.js'); ?>"></script>

<!-- FOOTER -->
<footer class="bg-black text-white text-center py-3 mt-5" style="font-family: Montserrat">
    <div class="container">
        <p class="m-0">
            &copy; <?php echo date("Y"); ?> Parfum de Luxe. All Rights Reserved.
        </p>
    </div>
</footer>
