<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
$username   = $isLoggedIn ? $_SESSION['username'] : null;
$position   = $isLoggedIn ? $_SESSION['position'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Central Academy</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        /* Specific Styles for Contact Us Page */
        .contact-section {
            padding: 4rem 2rem;
            background-color: #f8f9fa;
        }

        .contact-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .contact-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .contact-header .highlight {
            color: #007BFF;
        }

        .contact-header p {
            font-size: 1.1rem;
            color: #6c757d;
        }

        .contact-content {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
            justify-content: center;
        }

        .contact-info, .contact-form-container {
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            background-color: white;
        }

        .contact-info {
            flex: 1;
            min-width: 300px;
            background-color: #007BFF; /* Theme Blue Background */
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .info-item i {
            font-size: 1.5rem;
            margin-right: 15px;
            color: #E6F0FF; /* Lighter shade for contrast */
        }

        .info-item p {
            margin: 0;
            font-size: 1rem;
            line-height: 1.5;
        }

        .contact-info h2 {
            font-size: 1.8rem;
            margin-bottom: 25px;
            font-weight: 600;
        }

        /* Contact Form Styles */
        .contact-form-container {
            flex: 2;
            min-width: 400px;
        }

        .contact-form-container h2 {
            font-size: 1.8rem;
            margin-bottom: 25px;
            color: #333;
            font-weight: 600;
        }

        .contact-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #343A40;
        }

        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            font-size: 1rem;
            box-sizing: border-box; /* Important for padding/width calculation */
        }

        .contact-form textarea {
            resize: vertical;
            min-height: 150px;
        }

        .contact-form button {
            background-color: #007BFF;
            color: white;
            font-size: 1.1rem;
            font-weight: bold;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .contact-form button:hover {
            background-color: #0056b3;
        }

        .map-section {
            text-align: center;
            padding: 4rem 2rem;
            background-color: #fff;
        }

        .map-section h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: #333;
        }

        .map-container {
            max-width: 1200px;
            margin: 0 auto;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            height: 400px; /* Fixed height for the map iframe */
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .contact-content {
                flex-direction: column;
            }
            .contact-info, .contact-form-container {
                min-width: 100%;
            }
            .contact-header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="nav-bar" id="nav-items">
            <div class="name-logo">
                <i class="fa-solid fa-graduation-cap"></i>
                <h2>Central<span id="car">Academy</span></h2>
            </div>
            <div class="items">
                <a href="index.php">Home</a>
                <a href="aboutus.html">About Us</a>
                <a href="contactus.php">Contact Us</a>
 <div class="signin" id="user-info" style="display:flex;align-items:center;gap:10px;">

    <?php if ($isLoggedIn): ?>
        
        <!-- Show username + role -->
        <span style="font-weight:600; font-size:16px;">
            <?php echo htmlspecialchars($username); ?>
            <span style="color:#2a72f9;">(<?php echo htmlspecialchars($position); ?>)</span>
        </span>

        <!-- Logout button -->
        <form action="logout.php" method="POST" style="display:inline;">
            <button 
                type="submit"
                style="
                    padding:6px 14px;
                    background:#2a72f9;
                    border:none;
                    border-radius:6px;
                    color:white;
                    cursor:pointer;
                    font-size:14px;
                "
            >Logout</button>
        </form>

    <?php else: ?>

        <!-- Normal "Sign In / Register" -->
        <a id="a1" href="signin.php" 
           style="padding:6px 12px; color:black;">Sign In</a>

        <a id="reg" href="register.php"
           style="
                padding:6px 12px;
                background:#2a72f9;
                color:white;
                border-radius:6px;
           "
        >Register</a>

    <?php endif; ?>

</div>


        </div>
            </div>
</header>

<main>
    <section class="contact-section">
        <div class="contact-header">
            <h1>Get In <span class="highlight">Touch</span></h1>
            <p>We are here to answer your questions and welcome your feedback.</p>
        </div>

        <div class="contact-content">
            <!-- Contact Information Card -->
            <div class="contact-info">
                <div>
                    <h2>Our Details</h2>
                    <div class="info-item">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>34 Ambabari, Jaipur, Rajasthan 302039, India</p>
                    </div>
                    <div class="info-item">
                        <i class="fa-solid fa-phone"></i>
                        <p>+91 7300368554</p>
                    </div>
                    <div class="info-item">
                        <i class="fa-solid fa-envelope"></i>
                        <p>support@centralacademy.com</p>
                    </div>
                    <div class="info-item">
                        <i class="fa-solid fa-clock"></i>
                        <p>Office Hours: Mon - Fri, 9:00 AM - 5:00 PM</p>
                    </div>
                </div>

                <!-- Social Media Icons (Reusing footer style) -->
                <div class="social-media" style="justify-content: flex-start; gap: 15px; margin-top: 30px;">
                    <a href="#3"><i class="fa-brands fa-facebook-f" style="color: white;"></i></a>
                    <a href="#3"><i class="fa-brands fa-twitter" style="color: white;"></i></a>
                    <a href="#3"> <i class="fa-brands fa-instagram" style="color: white;"></i></a>
                    <a href="#3"> <i class="fa-brands fa-linkedin-in" style="color: white;"></i></a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-container">
                <h2>Send Us a Message</h2>
               <form class="contact-form" id="contactForm"
      action="backend/contact_submit.php"
      method="POST">

    <label for="name">Your Name</label>
    <input type="text" id="name" name="name" placeholder="Enter your full name" required>

    <label for="email">Your Email</label>
    <input type="email" id="email" name="email" placeholder="Enter your email address" required>

    <label for="subject">Subject</label>
    <input type="text" id="subject" name="subject" placeholder="What is your query about?" required>

    <label for="message">Message</label>
    <textarea id="message" name="message" placeholder="Type your message here..." required></textarea>

    <button type="submit">Send Message</button>
</form>
<div id="contactResult" style="margin-top:10px; font-weight:600;"></div>

            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <h2>Find Our Campus</h2>
        <div class="map-container">
            <!-- Placeholder for Google Maps iframe - replace src with your actual location map embed code -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113878.78318287515!2d75.750835!3d26.906967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db3f898a96417%3A0x7e2526e0e445071!2sJaipur%2C%20Rajasthan!5e0!3m2!1sen!2sin!4v1700473917871!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

</main>

<footer>
  <div class="footer-container">
    <div class="card1">
      <div class="card-logo">
                 <i class="fa-solid fa-graduation-cap"></i>
                <h2>Central<span style="color: #36a7f6;">Academy</span></h2>
            </div>
          <div class="pcar">
            <p>A place where knowledge and character grow together</p>
          </div>
          <div class="social-media">
            <a href="#3"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#3"><i class="fa-brands fa-twitter"></i></a>
            <a href="#3"> <i class="fa-brands fa-instagram"></i></a>
            <a href="#3"> <i class="fa-brands fa-linkedin-in"></i></a>
            <a href=""></a>


          </div>


    </div>
    <div class="card2">
      <h2>Quick Links</h2>
      <div class="anchor-links">
        <a href="index.php">Home</a>
      <a href="admissions.html">Admissions</a>
      <a href="aboutus.html">About Us</a>
      <a href="contactus.php">Contact Us</a>


      </div>


    </div>
    <div class="card2">
      <h2>Support</h2>
      <div class="anchor-links">
        <a href="contactus.php">Help Center</a>
      <a href="terms.html">Terms of Service</a>
      <a href="#">Privacy Policy</a>


</div>
      </div>
        <div class="card2">
      <h2>Contact Info</h2>
      <div class="anchor-links">
        <p><i class="fa-solid fa-phone"></i>   +91 7300368554</p>
      <p><i class="fa-solid fa-message"></i>   support@centralacademy.com</p>
      <p><i class="fa-solid fa-location-dot"> </i>   34 Ambabari, Jaipur, Rajasthan </p>
      <p>302039</p>

</div>
      </div>
  </div>
     <div class="footer-bottom">
    <hr class="grey-line">
    <br>
  <p>© 2025 centralacademy. All rights reserved.</p>
  </div>
</footer>

</body>



</html>