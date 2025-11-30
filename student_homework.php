<?php
session_start();
if (!isset($_SESSION['user_id']) || ($_SESSION['position'] ?? '') !== 'Student') {
    header("Location: signin.php");
    exit;
}
$isLoggedIn = true;
$username = $_SESSION['username'];
$position = $_SESSION['position'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student | Homework</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="teacher_student_homework.css">
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
    <a href="index.php">Home</a>
    <a id="academicsBtn" href="student_homework.php">Academics</a>
    <a href="aboutus.html">About Us</a>
    <a href="contactus.html">Contact Us</a>

    <div class="signin" id="user-info">
        <?php if ($isLoggedIn): ?>
            <span style="font-weight:600; margin-right:10px;">
                <?php echo htmlspecialchars($username); ?> (<?php echo htmlspecialchars($position); ?>)
            </span>
            <form method="post" action="logout.php" style="display:inline;">
                <button type="submit" style="padding:6px 10px; border:none; background:#36a7f6; color:white; border-radius:6px; cursor:pointer;">
                    Logout
                </button>
            </form>
        <?php else: ?>
            <a id="a1" href="signin.php">Sign In</a>
            <a href="register.php" id="reg">Register</a>
        <?php endif; ?>
    </div>
</div>

</header>


<div class="container">
  <h2>Your Homework</h2>
  <div id="homeworkList"></div>
</div>
<div class="container" style="margin-top: 30px;">
  <h2>Your Report Card</h2>
  <p>You can view all your marks and download the PDF.</p>
  <a href="student_report.php" 
     style="
         display:inline-block;
         background:#36a7f6;
         color:white;
         padding:10px 20px;
         font-size:16px;
         border-radius:8px;
         text-decoration:none;
         margin-top:10px;
     ">
     View Report Card
  </a>
</div>
<div class="container" style="margin-top: 40px;">
  <h2>Your Marks Preview</h2>
  <p>Here are your latest marks. For complete details, download your full report card.</p>

  <table id="marksPreviewTable" style="width:100%; margin-top:20px; border-collapse:collapse;">
      <tr style="background:#36a7f6; color:white;">
          <th style="padding:10px; border:1px solid #ccc;">Test Type</th>
          <th style="padding:10px; border:1px solid #ccc;">Subject</th>
          <th style="padding:10px; border:1px solid #ccc;">Marks</th>
          <th style="padding:10px; border:1px solid #ccc;">Total</th>
      </tr>
  </table>

  <a href="student_report.php"
     style="
         display:inline-block;
         background:#36a7f6;
         padding:10px 18px;
         color:white;
         text-decoration:none;
         margin-top:20px;
         border-radius:7px;
         font-weight:600;">
         View Full Report Card
  </a>
</div>

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
        <a href="index.html">Home</a>
      <a href="admissions.html">Admissions</a>
      <a href="aboutus.html">About Us</a>
      <a href="contactus.html">Contact Us</a>
    

      </div>
      

    </div>
    <div class="card2">
      <h2>Support</h2>
      <div class="anchor-links">
        <a href="contactus.html">Help Center</a>
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
<script>
// Load homework list via backend using session class
async function loadHomework(){
    try {
        const res = await fetch("backend/get_homework.php");
        const data = await res.json();
        const div = document.getElementById("homeworkList");

        if (!div) return;

        if (!Array.isArray(data) || data.length === 0){
            div.innerHTML = "<p>No homework assigned yet.</p>";
            return;
        }

        div.innerHTML = "";
        data.forEach(hw => {
            div.innerHTML += `
                <div class="homework-box">
                    <h3>${hw.title}</h3>
                    <p>${hw.description}</p>
                    ${hw.file_path ? `<a href="backend/${hw.file_path}" download>Download</a>` : ""}
                    <p><small>${hw.created_at}</small></p>
                </div>
            `;
        });
    } catch (err) {
        console.error(err);
    }
}

// Load marks preview using session student_id
async function loadMarksPreview(){
    const table = document.getElementById("marksPreviewTable");
    if (!table) return;

    try {
        const res = await fetch("backend/get_report.php");
        const data = await res.json();

        if (!Array.isArray(data) || data.length === 0){
            table.innerHTML += `
                <tr>
                    <td colspan="4" style="text-align:center; padding:12px;">No marks uploaded yet.</td>
                </tr>
            `;
            return;
        }

        data.slice(0, 3).forEach(m => {
            table.innerHTML += `
                <tr>
                    <td rowspan="6" style="font-weight:bold;">${m.test_type}</td>

                    <td>English</td>
                    <td>${m.english_obtained}</td>
                    <td>${m.english_total}</td>
                </tr>
                <tr>
                    <td>Hindi</td>
                    <td>${m.hindi_obtained}</td>
                    <td>${m.hindi_total}</td>
                </tr>
                <tr>
                    <td>Maths</td>
                    <td>${m.maths_obtained}</td>
                    <td>${m.maths_total}</td>
                </tr>
                <tr>
                    <td>Science</td>
                    <td>${m.science_obtained}</td>
                    <td>${m.science_total}</td>
                </tr>
                <tr>
                    <td>SST</td>
                    <td>${m.sst_obtained}</td>
                    <td>${m.sst_total}</td>
                </tr>
                <tr>
                    <td>GK</td>
                    <td>${m.gk_obtained}</td>
                    <td>${m.gk_total}</td>
                </tr>
            `;
        });
    } catch (err) {
        console.error(err);
    }
}

window.addEventListener("load", () => {
    loadHomework();
    loadMarksPreview();
});
</script>
</html>
