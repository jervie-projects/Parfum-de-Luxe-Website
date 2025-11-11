<!-- HEADER -->
<body style="background-image: url(<?php $this->assets('images/site-background','bg.jpg'); ?>);">
<?php 
    $this->render('includes/header');
?>

  <div class="content my-md-5 pt-md-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="fst-italic fw-bold mb-4 text-center">About Us</h1>
                    <p class="text-center">Welcome to Perfumes de Luxe, where elegance meets excellence in the world of fragrance. At Perfumes de Luxe, we are dedicated to curating a collection of the most luxurious and sophisticated perfumes, designed to enhance your personal style and leave a lasting impression.</p>

                    <p class="text-center">Our passion lies in offering you an unparalleled olfactory experience with a selection of high-quality fragrances that exude refinement and allure. Whether you’re searching for a signature scent or a special gift, our diverse range of products ensures that you find the perfect match for any occasion.</p>

                    <p class="text-center">Our team of experts meticulously selects and presents only the finest perfumes, each embodying the artistry and craftsmanship of renowned perfume houses. Every fragrance is accompanied by detailed descriptions and insights to help you discover and appreciate the essence of each scent.</p>

                    <p class="text-center">At Perfumes de Luxe, we believe that choosing a fragrance should be a luxurious and personalized experience. We are committed to providing exceptional service and ensuring that each visit to our store is a journey through elegance and sophistication. Whether you seek timeless classics or modern creations, Perfumes de Luxe offers a world of fragrance that reflects your unique taste.</p>

                    <p class="text-center">Join us in celebrating the art of perfumery and indulge in the finest fragrances that captivate and enchant. Experience the essence of luxury with Perfumes de Luxe today!</p>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="py-4 text-center mt-5" id="contact">
        <div class="container">
            <h2 class="fs-3 f-mono fw-bold fst-italic">Contact Us</h2> 
        </div>
    </div>

    <div class="content mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                    <p class="text-center">Have questions or just want to chat? Reach out to us! Your feedback is important, and we're here to help. Contact us for a friendly and prompt response. </p>
                    </div>
                    <div class="text-center text-container">
                    <h6 class="fst-italic fw-bold mb-4">Address:</h6>
                    <p>Km. 5, La Trinidad, Benguet <br>Philippines 2601</p>
                    </div>
                    <div class="text-center text-container">
                    <h6 class="fst-italic fw-bold mb-4">Phone:</h6>
                    <p>+63 912 345 6789<br>+63 998 765 4321</p>
                    </div>
                    <div class="text-center text-container">
                    <h6 class="fst-italic fw-bold mb-4">Email:</h6>
                    <p>PerfumesDeLuxe@gmail.com</p>
                    </div>
                    <div class="social-icons text-center">
                    <a href="https://www.facebook.com"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pre-recipe py-4 text-center mt-5" id="developerInfo">
        <div class="container">
            <h2 class="fs-3 f-mono fw-bold fst-italic">Our Team</h2> 
        </div>
    </div>

    <div class="content mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6 class="fst-italic fw-bold mb-1 text-center">Akia, Jervie Martin</h6>
                    <h6 class="fst-italic fw-bold mb-1 text-center">Dulnuan, Mark Hilton</h6>
                </div>
            </div>
        </div>
    </div>

<!-- FOOTER --> 
<?php $this->render('includes/footer');?>

<!-- SCRIPT -->
<!-- OFFLINE -->
<script src="<?php $this->assets('scripts', 'bootstrap.js'); ?>"></script>

</body>
</html>