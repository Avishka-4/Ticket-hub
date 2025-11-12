<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms & Conditions - TicketHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/index.css">
</head>
<body class="bg-gray-50">
    <?php include '../includes/navbar.php'; ?>
    
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Terms & Conditions</h1>
                <p class="text-gray-600">Last updated: January 2025</p>
            </div>
            
            <!-- Content -->
            <div class="card shadow-sm">
                <div class="card-body p-5">
                    
                    <section class="mb-5">
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">1. Acceptance of Terms</h2>
                        <p class="text-gray-600 mb-3">
                            By accessing and using TicketHub's services, you accept and agree to be bound by the terms and provisions of this agreement. If you do not agree to these terms, please do not use our services.
                        </p>
                        <p class="text-gray-600">
                            These terms apply to all users of the platform, including but not limited to browsers, vendors, customers, merchants, and content contributors.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">2. Use of Service</h2>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">2.1 Eligibility</h3>
                        <p class="text-gray-600 mb-3">
                            You must be at least 18 years old to use our services. By using TicketHub, you represent and warrant that you meet this age requirement.
                        </p>
                        
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">2.2 Account Registration</h3>
                        <ul class="list-disc list-inside text-gray-600 mb-3 space-y-2">
                            <li>You must provide accurate, current, and complete information during registration</li>
                            <li>You are responsible for maintaining the confidentiality of your account credentials</li>
                            <li>You agree to notify us immediately of any unauthorized use of your account</li>
                            <li>You are responsible for all activities that occur under your account</li>
                        </ul>

                        <h3 class="text-xl font-semibold text-gray-700 mb-2">2.3 Prohibited Activities</h3>
                        <p class="text-gray-600 mb-2">You agree not to:</p>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li>Use the service for any illegal purpose</li>
                            <li>Violate any laws in your jurisdiction</li>
                            <li>Infringe on the intellectual property rights of others</li>
                            <li>Transmit any harmful code or malicious software</li>
                            <li>Attempt to gain unauthorized access to our systems</li>
                            <li>Resell tickets at inflated prices (scalping)</li>
                            <li>Use automated systems to purchase tickets</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">3. Booking and Payments</h2>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">3.1 Ticket Purchases</h3>
                        <ul class="list-disc list-inside text-gray-600 mb-3 space-y-2">
                            <li>All ticket sales are final unless otherwise stated</li>
                            <li>Prices are subject to change without notice</li>
                            <li>We reserve the right to limit quantities per customer</li>
                            <li>Tickets are non-transferable unless specified</li>
                        </ul>

                        <h3 class="text-xl font-semibold text-gray-700 mb-2">3.2 Payment Terms</h3>
                        <p class="text-gray-600 mb-3">
                            Payment must be made in full at the time of booking. We accept major credit cards, debit cards, and other payment methods as displayed on our platform. All transactions are processed securely through encrypted payment gateways.
                        </p>

                        <h3 class="text-xl font-semibold text-gray-700 mb-2">3.3 Service Fees</h3>
                        <p class="text-gray-600">
                            Service fees may apply to ticket purchases and are non-refundable. These fees cover the cost of processing your transaction and maintaining our platform.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">4. Cancellations and Refunds</h2>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">4.1 Event Cancellations</h3>
                        <p class="text-gray-600 mb-3">
                            If an event is cancelled by the organizer, you will be eligible for a full refund including service fees. Refunds will be processed within 7-14 business days to the original payment method.
                        </p>

                        <h3 class="text-xl font-semibold text-gray-700 mb-2">4.2 Customer Cancellations</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li>Cancellations made 48+ hours before the event: 90% refund (service fees excluded)</li>
                            <li>Cancellations made 24-48 hours before: 50% refund (service fees excluded)</li>
                            <li>Cancellations made less than 24 hours before: No refund</li>
                            <li>No-shows are not eligible for refunds</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">5. Intellectual Property</h2>
                        <p class="text-gray-600 mb-3">
                            All content on TicketHub, including but not limited to text, graphics, logos, images, and software, is the property of TicketHub or its content suppliers and is protected by international copyright laws.
                        </p>
                        <p class="text-gray-600">
                            You may not reproduce, distribute, modify, create derivative works of, publicly display, or exploit any of our content without express written permission.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">6. Limitation of Liability</h2>
                        <p class="text-gray-600 mb-3">
                            TicketHub shall not be liable for any indirect, incidental, special, consequential, or punitive damages resulting from your use of or inability to use the service.
                        </p>
                        <p class="text-gray-600 mb-3">
                            We do not guarantee the accuracy, completeness, or usefulness of any information provided by third-party event organizers. We are not responsible for the conduct of any event or the quality of services provided.
                        </p>
                        <p class="text-gray-600">
                            Our total liability to you for all claims arising from your use of our services shall not exceed the amount you paid for the specific booking in question.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">7. Privacy and Data Protection</h2>
                        <p class="text-gray-600 mb-3">
                            Your use of TicketHub is also governed by our Privacy Policy. Please review our Privacy Policy to understand our practices regarding the collection and use of your personal information.
                        </p>
                        <p class="text-gray-600">
                            We are committed to protecting your privacy and handling your data in accordance with applicable data protection laws, including GDPR and CCPA.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">8. Force Majeure</h2>
                        <p class="text-gray-600">
                            TicketHub shall not be liable for any failure or delay in performance due to circumstances beyond our reasonable control, including but not limited to acts of God, war, terrorism, riots, embargoes, acts of civil or military authorities, fire, floods, accidents, pandemics, strikes, or shortages of transportation, facilities, fuel, energy, labor, or materials.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">9. Dispute Resolution</h2>
                        <p class="text-gray-600 mb-3">
                            Any disputes arising from these terms or your use of TicketHub shall be resolved through binding arbitration in accordance with the rules of the American Arbitration Association.
                        </p>
                        <p class="text-gray-600">
                            You agree to waive your right to participate in a class action lawsuit or class-wide arbitration.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">10. Changes to Terms</h2>
                        <p class="text-gray-600 mb-3">
                            We reserve the right to modify these terms at any time. Changes will be effective immediately upon posting to our website. Your continued use of the service after changes are posted constitutes your acceptance of the revised terms.
                        </p>
                        <p class="text-gray-600">
                            We encourage you to review these terms periodically to stay informed of any updates.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">11. Termination</h2>
                        <p class="text-gray-600">
                            We reserve the right to terminate or suspend your account and access to our services at our sole discretion, without notice, for conduct that we believe violates these terms or is harmful to other users, us, or third parties, or for any other reason.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">12. Contact Information</h2>
                        <p class="text-gray-600 mb-3">
                            If you have any questions about these Terms & Conditions, please contact us:
                        </p>
                        <div class="bg-light p-4 rounded">
                            <p class="mb-2"><strong>Email:</strong> legal@tickethub.com</p>
                            <p class="mb-2"><strong>Phone:</strong> +94 (70) 123-4567</p>
                            <p class="mb-0"><strong>Address:</strong> Colombo 07, Sri Lanka</p>
                        </div>
                    </section>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Note:</strong> By using TicketHub, you acknowledge that you have read, understood, and agree to be bound by these Terms & Conditions.
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <?php include '../includes/footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>