<?php  include_once 'header.php' ?>
    <!-- Main Content -->
    <main>
        <!-- Hero Section with Carousel -->
        <section class="bg-blue-200 pb-16 text-center slanted-bottom" style="height: 100vh;">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="images/slide-1.jpg" alt="Slide 1" class="h-full w-full center text-center">
                        <div class="absolute text-white">
                            <h1 class="text-4xl font-bold heading-main">Welcome to YCP Skills Program</h1>
                            <p class="text-lg mt-4">Empowering young professionals through skill development.</p>
                            <div class="mt-8">
                                <a href="about" class="bg-white text-blue-800 px-4 py-2 rounded hover:bg-gray-300">Get Started</a>
                                <a href="payment" class="bg-white text-blue-800 px-4 py-2 rounded hover:bg-gray-300 ml-4">Join Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="images/slide-2.jpg" alt="Slide 2" class="h-full w-full center">
                        <div class="absolute text-white">
                            <h1 class="text-4xl font-bold heading-main">Learn from the Best</h1>
                            <p class="text-lg mt-4">Join our expert-led courses today.</p>
                            <div class="mt-8">
                                <a href="about" class="bg-white text-blue-800 px-4 py-2 rounded hover:bg-gray-300">Get Started</a>
                                <a href="payment" class="bg-white text-blue-800 px-4 py-2 rounded hover:bg-gray-300 ml-4">Join Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="images/slide-3.jpg" alt="Slide 3">
                        <div class="absolute text-white">
                            <h1 class="text-4xl font-bold heading-main">Achieve Your Goals</h1>
                            <p class="text-lg mt-4">Take the next step in your career with YCP Skills.</p>
                            <div class="mt-8">
                                <a href="about" class="bg-white text-blue-800 px-4 py-2 rounded hover:bg-gray-300">Get Started</a>
                                <a href="payment" class="bg-white text-blue-800 px-4 py-2 rounded hover:bg-gray-300 ml-4">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </section>

        
        <!-- Board Members Section -->
        <section class="board-members">
            <h2 class="small">Board <span style="color: #1e40af;">Members</span></h2>
            <div class="grid m-6">
                <!-- Board Member 1 -->
                <div class="card text-center">
                    <img src="images/pic-1.jpg" alt="member-1">
                    <h3>Andrew Okeke</h3>
                    <p>YCP President</p>
                </div>
                <!-- Board Member 2 -->
                <div class="card">
                    <img src="images/pic-2.jpg" alt="member-2">
                    <h3>Ezenwammadu Rose</h3>
                    <p>Vice President</p>
                </div>
                <!-- Board Member 3 -->
                <div class="card">
                    <img src="images/pic-3.jpg" alt="member-3">
                    <h3>Vitalian Ozoemena</h3>
                    <p>Gen Secretary</p>
                </div>
                <!-- Board Member 4 -->
                <div class="card">
                    <img src="images/pic-4.jpg" alt="member-4">
                    <h3>Stella Odo</h3>
                    <p>Fin Secretary</p>
                </div>
                <!-- Board Member 5 -->
                <div class="card">
                    <img src="images/pic-5.jpg" alt="member-5">
                    <h3>Onwugbuka Arinze</h3>
                    <p>Public Relation Officer</p>
                </div>
                <!-- Board Member 6 -->
                <div class="card">
                    <img src="images/pic-6.jpg" alt="member-6">
                    <h3>Afamefuna Joyce</h3>
                    <p>Diretor of Social</p>
                </div>
                <!-- Board Member 7 -->
                <div class="card">
                    <img src="images/pic-7.jpg" alt="member-7">
                    <h3>Anijah Chinaza</h3>
                    <p>Assist. Secretary</p>
                </div>
                <!-- Board Member 8 -->
                <div class="card">
                    <img src="images/pic-8.jpg" alt="member-8">
                    <h3>Udoji Henry</h3>
                    <p>DOS 2</p>
                </div>
                <!-- Board Member 9 -->
                <div class="card">
                    <img src="images/pic-9.jpeg" alt="member-8">
                    <h3>Mrs. Kosi Ojukwu</h3>
                    <p>Chairperson</p>
                </div>
            </div>
        </section>


        <!-- Our Mission & Vission Section -->
        <section class="py-16 bg-white text-center">
            <h2 class="text-3xl font-bold mb-4">Our <span style="color: #1e40af; " class="small">Mision</span> & <span style="color: #1e40af;" class="small">Vision</span></h2>
                <div class="grid m-8 grid-cols-1 md:gridcols-2 lg:grid-cols-2 gap-8">
                    <!-- mission -->
                    <div class="">
                        <h3 class="left text-2xl font-bold uppercase small">Mision</h3>
                        <p class="left lg:text-lg text-justify">
                        Our mission is to bridge the gap between education and employment 
                        by providing young Catholic professionals with practical, industry-relevant skills.
                         We are dedicated to delivering targeted training that enhances career readiness 
                         and personal growth, empowering our participants to thrive in high-demand fields 
                         and make a positive impact in their communities.
                        </p>
                    </div>
                 <!-- vision -->
                 <div class="">
                    <h3 class="left text-2xl font-bold uppercase small">Vision</h3>
                    <p class="left lg:text-lg text-justify">
                    Our vision is to create a generation of skilled Catholic professionals 
                    who are well-prepared to excel in their chosen fields and make meaningful 
                    contributions to their communities. Through our targeted training and practical 
                    skill development, we aim to foster career readiness and personal empowerment, 
                    ultimately shaping a brighter future for our participants and society as a whole.
                    </p>
                </div>
                </div>
        </section>

        <!-- Our sponsors -->
        <section id="sponsors" class="py-16 bg-gray-200 text-center transition-transform transform">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold mb-4 md:text-2xl xs:text-sm sm:text-2xl small">Proudly <span style="color: #1e40af;">Sponsored By</span></h2>
                <div class="flex justify-center items-center flex-wrap">
                    <!-- Sponsor Logo -->
                    <div class="m-4">
                        <img src="images/ansg.jfif" alt="Sponsor 1" class="h-20 transition-transform transform hover:scale-105">
                    </div>
                    <div class="m-4">
                        <img src="images/actda.png" alt="Sponsor 1" class="h-20 transition-transform transform hover:scale-105">
                    </div>
                    <div class="m-4">
                        <img src="images/polaris.png" alt="Sponsor 1" class="h-20 transition-transform transform hover:scale-105">
                    </div>
                    <div class="m-4">
                        <img src="images/ocharity.png" alt="Sponsor 1" class="h-20 transition-transform transform hover:scale-105">
                    </div>
                    <div class="m-4">
                        <img src="images/ansippa.png" alt="Sponsor 1" class="h-20 transition-transform transform hover:scale-105">
                    </div>
                    <div class="m-4">
                        <img src="images/aguatac.png" alt="Sponsor 1" class="h-20 transition-transform transform hover:scale-105">
                    </div>
                    <!-- Repeat Sponsor Logos as needed -->
                </div>
            </div>
        </section>

         <!-- Call-to-Action Section -->
         <section class="py-16 bg-blue-800 text-white text-center">
            <h2 class="text-3xl font-bold mb-4 small">Ready to Get Started?</h2>
            <a href="payment" class="bg-white text-blue-800 px-4 py-2 rounded hover:bg-gray-300">Register Now</a>
        </section>
    </main>
    <?php  include_once 'footer.php' ?>