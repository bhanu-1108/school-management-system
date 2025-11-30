<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
$username = $isLoggedIn ? $_SESSION['username'] : null;
$position = $isLoggedIn ? $_SESSION['position'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <header>
        <div class="nav-bar" id="nav-items">
            <div class="name-logo">
    <i class="fa-solid fa-graduation-cap"></i>
    <h2>Central<span id="car">Academy</span></h2>
</div>

          <div class="items">
    <a href="#">Home</a>
    <?php if ($isLoggedIn && $position === 'Teacher'): ?>
    <li><a href="teacher_homework.php">Academics</a></li>

<?php elseif ($isLoggedIn && $position === 'Student'): ?>
    <li><a href="student_homework.php">Academics</a></li>

<?php else: ?>
    <li><a href="signin.php">Academics</a></li>
<?php endif; ?>

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

</header>
<div class="hero">
        <div class="title">
            <div class="big">
                <h1 id="p">Premium Education at</h1>
                <h1 id="a">Affordable Prices</h1>
            </div>
            <div class="small">
                <p>Our mission is to provide a safe, engaging, and innovative learning environment where students grow academically, socially,</p>
                <p>and emotionally to become leaders of tomorrow</p>
            </div>
        </div>
       <div class="hero-btns">
    <a id="join1" href="register.php">Join</a>
    <a id="join1" href="admissions.html">New Admission</a>
</div>

        </div>
      
  <section class="why-choose">
  <h2>Why Choose <span class="highlight">Central Academy</span></h2>
  <div class="features">
    <div class="feature-box">
      <div class="icon">
        <i class="fa-solid fa-person-chalkboard"></i>
      </div>
      <h3>Experienced Faculty</h3>
      <p>Our teachers are certified, passionate, and committed to nurturing every student’s potential.</p>
    </div>
    <div class="feature-box">
      <div class="icon">
        <i class="fa-solid fa-book-open"></i>
      </div>
      <h3>Modern Curriculum</h3>
      <p>We use updated teaching methods and a curriculum designed for 21st-century learners.</p>
    </div>
    <div class="feature-box">
      <div class="icon">
        <i class="fa-solid fa-shield"></i>
      </div>
      <h3>Safe & Inclusive Environment</h3>
      <p>A welcoming campus where safety, diversity, and respect come first for every student.</p>
    </div>
  </div>
</section>

<section class="how-it-works">
  <h2>How to <span class="highlight">Enroll</span></h2>
  <div class="steps">
    <div class="step-box">
      <div class="step-number">1</div>
      <h3>Fill Application Form →</h3>
      <p>Start by completing our easy online application with your child's details.</p>
    </div>
    <div class="step-box">
      <div class="step-number">2</div>
      <h3>Submit Documents →</h3>
      <p>Upload or bring in required documents such as ID, previous report cards, and more.</p>
    </div>
    <div class="step-box">
      <div class="step-number">3</div>
      <h3>Join Orientation →</h3>
      <p>Attend our student orientation session to meet staff, tour the campus, and get started.</p>
    </div>
  </div>
</section>

<section class="testimonials">
 <div> <h2>What Our <span class="highlight">Students & Parents</span> Say</h2></div>
  <div class="testimonial-cards">
    
    <div class="testimonial-card">
      <div class="stars">&#9733  &#9733 &#9733 &#9733</div>
      <div class="rating">5.0</div>
      <p>"The teachers are very supportive and the environment is perfect for learning. My child loves coming to school every day!"</p>
      <div class="user-info">
        <img src="photos/user1.webp" alt="User Icon" class="user-icon">
        <div>
          <strong>Rohan</strong><br>
          Parent, Delhi
        </div>
      </div>
    </div>

    <div class="testimonial-card">
      <div class="stars">&#9733 &#9733 &#9733 &#9733 &#9733 </div>
      <div class="rating">5.0</div>
      <p>"Central Academy School helped me grow both academically and personally. The extracurriculars are amazing!"</p>
      <div class="user-info">
        <img src="photos/user2.webp" alt="User Icon" class="user-icon">
        <div>
          <strong>Pari Swami</strong><br>
          Student, Mumbai
        </div>
      </div>
    </div>

    <div class="testimonial-card">
      <div class="stars">&#9733 &#9733 &#9733 &#9733</div>
      <div class="rating">4.0</div>
      <p>"Excellent school with great communication from staff. The facilities are clean, modern, and safe."</p>
      <div class="user-info">
        <img src="photos/user3.webp" alt="User Icon" class="user-icon">
        <div>
          <strong>Riya Sharma</strong><br>
          Parent, Bangalore
        </div>
      </div>
    </div>

  </div>
</section>

<section class="bot">
    <div class="container">
      <h1>Ready to Begin Your Learning Journey?</h1>
      <p>
        Unlock your potential with quality education, dedicated teachers, and an engaging environment. 
        Together, let’s build a brighter future.
      </p>
    <a href="programs.html" class="btn">Explore Our Programs</a>
    </div>
  </section>

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