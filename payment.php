<?php include 'header.php'; ?>
<?php 
// start the session
session_start();

// generate a CSRF token if one doesn't exist
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!-- Main Content -->
<main class="container contain mx-auto py-16">
    <h1 class="text-4xl font-bold text-center text-resize">Register and Make Payment</h1>
    <p class="description text-center m-4 text-primary">After registration, you'll receive an email with links to join the WhatsApp group and online class.</p>
    <section class="mt-8 max-w-md mx-auto">
        <form action="process.php" method="POST" id="paymentForm" class="bg-white p-8 rounded shadow-lg" autocomplete="off">
            <div class="mb-4">
                <label for="name" class="block text-lg font-bold">Full Name:</label>
                <input type="text" id="name" name="name" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-lg font-bold">Email Address:</label>
                <input type="email" id="email" name="email" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="course" class="block text-lg font-bold">Select Course:</label>
                <select id="course" name="course" class="w-full p-2 border rounded" required>
                    <option value="web development">Web Development</option>
                    <option value="app development">App Development</option>
                    <option value="ui-ux">UI / UX Design</option>
                    <option value="graphic-design">Graphic Design</option>
                    <option value="automation">Automation</option>
                    <option value="research-skills">Research Skills</option>
                    <option value="digital-marketing">Digital Marketing</option>
                    <option value="video-editing">Video Editing</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="amount" class="block text-lg font-bold">Amount:</label>
                <input type="text" id="amount" name="amount" class="w-full p-2 border rounded" value="5000" disabled>
                <input type="hidden" name="amount" value="5000">
            </div>
            <!-- Payment Method Section -->
            <div class="mb-4">
                <label class="block text-lg font-bold mb-2">Select Payment Method:</label>
                <div class="flex justify-around">
                    <!-- Flutterwave -->
                    <label class="payment-option">
                        <input type="radio" name="gateway" value="flutterwave" class="hidden" required>
                        <img src="images/flutterwave.jfif" alt="Flutterwave" class="payment-logo">
                    </label>
                    <!-- Paystack -->
                    <label class="payment-option">
                        <input type="radio" name="gateway" value="paystack" class="hidden">
                        <img src="images/paystack.png" alt="Paystack" class="payment-logo">
                    </label>
                    <!-- Opay -->
                    <!-- <label class="payment-option">
                        <input type="radio" name="gateway" value="opay" class="hidden">
                        <img src="images/opay.png" alt="Opay" class="payment-logo">
                    </label> -->
                </div>
                <!-- CSRF TOKEN -->
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            </div>
            <div class="mt-8">
                <button type="submit" id="submit-btn" name="checked" class="w-full bg-blue-800 text-white p-2 rounded hover:bg-blue-700">Proceed to Payment</button>
            </div>
        </form>
    </section>
         <!-- Modal for CSRF Error -->
        <div id="csrfErrorModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg p-6">
                <h2 class="text-xl font-bold mb-4">Error</h2>
                <p>Invalid CSRF token. Please refresh the page and try again.</p>
                <button id="closeModal" class="mt-4 px-4 py-2 bg-red-600 text-white rounded-md">Close</button>
            </div>
        </div>

        <!-- Modal for connection status -->
        <div class="wrapper">
            <div class="toast">
            <div class="content">
                <div class="icon"><i class="uil uil-wifi"></i></div>
                <div class="details">
                <span>You're online now</span>
                <p>Hurray! Internet is connected.</p>
                </div>
            </div>
            <div class="close-icon"><i class="uil uil-times"></i></div>
            </div>
        </div>
</main>
<script src="disable.js"></script>
<?php include 'footer.php'; ?>
