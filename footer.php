<!-- Scroll-to-Top Button -->
<button id="scrollToTopBtn" class="fixed bottom-4 left-4 bg-blue-800 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 hidden">
        ↑
</button>

<!-- Footer Section -->
<footer style="background-color: #1a317b;" class=" text-white py-10 footer-font">
    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-4 gap-8 px-4">
        
        <!-- Branding and Social Icons -->
        <div class="col-span-1">
            <img src="images/ycplogo.png" alt="Logo" class="mb-4 h-20 w-20">
            <p>YOUNG CATHOLIC PROFESSIONALS</p>
            <p>RETREAT CENTER OKPUNO, AWKA SOUTH</p>
            <p>&copy; <?php echo date('Y') ?> ycprepacco</p>
            <p>All Rights Reserved.</p>
            <!-- Social Icons -->
            <div class="flex space-x-4 mt-4">
                <a href="https://www.facebook.com/profile.php?id=61555909872228&mibextid=ZbWKwL" class="text-white text-2xl hover:text-gray-400"><i class="uil uil-facebook-f"></i></a>
                <!-- <a href="#" class="text-white text-2xl hover:text-gray-400"><i class="uil uil-twitter"></i></a> -->
                <a href="https://www.instagram.com/ycp_repacco?igsh=MmVlMjlkMTBhMg==e"  class="text-white text-2xl hover:text-gray-400"><i class="uil uil-instagram"></i></a>
                <!-- <a href="#" class="text-white text-2xl hover:text-gray-400"><i class="uil uil-linkedin"></i></a> -->
            </div>
        </div>

        <!-- Hosting Links -->
        <div class="col-span-1">
            <h3 class="font-semibold text-lg mb-4">Menu</h3>
            <ul>
                <li><a href="index.php" class="hover:text-gray-400">Home</a></li>
                <li><a href="about.php" class="hover:text-gray-400">About Us</a></li>
                <li><a href="skills.php" class="hover:text-gray-400">Skills</a></li>
                <li><a href="tutors.php" class="hover:text-gray-400">Tutors</a></li>
                <li><a href="payment.php" class="hover:text-gray-400">Register</a></li>
            </ul>
        </div>

        
    </div>
    <!-- Contact Email -->
    <div class="container mx-auto mt-8 text-center text-white">
        <p>You can reach us out here: <a href="info@ycprepacco.com.ng" class="text-blue-400 hover:underline">info@ycprepacco.com.ng</a></p>
    </div>
</footer>

<!-- Swiper JS -->
<script src="swiper.js"></script>
<script src="main.js"></script>
<script src="alphine.js" defer></script>

<script>
    // Initialize Swiper with autoplay
    const swiper = new Swiper('.swiper-container', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 5000, // 5000ms = 5 seconds
            disableOnInteraction: false,
        },
    });
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5fd5309ba8a254155ab2bc08/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
