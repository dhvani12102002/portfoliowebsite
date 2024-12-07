<div class="col-lg-5 col-md-8">
<form action="contact-handler.php" method="post" role="form" class="php-email-form">
    <div class="form-group">
      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
    </div>
    <div class="form-group mt-3">
      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
    </div>
    <div class="form-group mt-3">
      <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
    </div>
    <div class="form-group mt-3">
      <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
    </div>
    <div class="my-3">
      <div class="loading">Loading</div>
      <div class="error-message"></div>
      <div class="sent-message">Your message has been sent. Thank you!</div>
    </div>
    <div class="text-center"><button type="submit">Send Message</button></div>
  </form>
</div>
<?php
// Include database configuration
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    try {
        // Prepare and execute SQL query to insert data
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
        $stmt->execute([
            ':name'    => $name,
            ':email'   => $email,
            ':subject' => $subject,
            ':message' => $message
        ]);

        // Display success message with redirect
        echo "<script>
            alert('Your message has been submitted successfully.');
            window.location.href = 'index.html';
        </script>";
    } catch (PDOException $e) {
        // Display error message
        echo "<script>
            alert('Error: " . $e->getMessage() . "');
            window.location.href = 'index.html';
        </script>";
    }
}
?>
