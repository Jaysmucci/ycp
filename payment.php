<?php include 'header.php'; ?>
<!-- Main Content -->
<main class="container contain mx-auto py-16">
    <h1 class="text-4xl font-bold text-center text-resize">Register and Make Payment</h1>
    <p class="description text-center m-4 text-primary">After registration, you'll receive an email with links to join the WhatsApp group and online class.</p>
    <section class="mt-8 max-w-md mx-auto">
        <form action="" method="POST" class="bg-white p-8 rounded shadow-lg">
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
                    <option value="graphic-design">Graphic Design</option>
                    <option value="automation">Automation</option>
                    <option value="research-skills">Research Skills</option>
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
                        <input type="radio" name="payment" value="flutterwave" class="hidden" required>
                        <img src="images/flutterwave.jfif" alt="Flutterwave" class="payment-logo">
                    </label>
                    <!-- Paystack -->
                    <label class="payment-option">
                        <input type="radio" name="payment" value="paystack" class="hidden">
                        <img src="images/paystack.png" alt="Paystack" class="payment-logo">
                    </label>
                    <!-- Opay -->
                    <label class="payment-option">
                        <input type="radio" name="payment" value="opay" class="hidden">
                        <img src="images/opay.png" alt="Opay" class="payment-logo">
                    </label>
                </div>
            </div>
            <div class="mt-8">
                <button type="submit" id="submitBtn" name="checked" class="w-full bg-blue-800 text-white p-2 rounded hover:bg-blue-700">Proceed to Payment</button>
            </div>
        </form>
    </section>
</main>
<?php include 'footer.php'; ?>
