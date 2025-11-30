<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit;
}

$username   = $_SESSION['username'];
$position   = $_SESSION['position'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher | Upload Homework</title>
  <link rel="stylesheet" href="teacher_student_homework.css">
  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
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
    <a id="academicsBtn" href="teacher_homework.php">Academics</a>
    <a href="aboutus.html">About Us</a>
    <a href="contactus.html">Contact Us</a>

   <div class="signin" id="user-info" style="display:flex;align-items:center;gap:10px;">

    <span style="font-weight:600; font-size:16px;">
        <?php echo htmlspecialchars($username); ?>
        <span style="color:#2a72f9;">(<?php echo htmlspecialchars($position); ?>)</span>
    </span>

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

</div>

</div>

</header>




<div class="container">
  <h2>Upload Homework</h2>

  <label>Select Class</label>
  <select id="classSelect">
    <option value="Class 1">Class 1</option>
    <option value="Class 2">Class 2</option>
    <option value="Class 3">Class 3</option>
    <option value="Class 4">Class 4</option>
    <option value="Class 5">Class 5</option>
  </select>

  <label>Homework Title</label>
  <input type="text" id="title">

  <label>Description</label>
  <textarea id="description"></textarea>

  <label>Attach File</label>
  <input type="file" id="file">

  <button id="uploadBtn">Upload Homework</button>
</div>
<div class="container" style="margin-top: 40px;">
    <h2>Enter Marks</h2>
    <p>Record test marks for students class-wise.</p>

    <a href="teacher_marks.html"
       style="
           display:inline-block;
           background:#36a7f6;
           padding:10px 20px;
           color:white;
           font-size:16px;
           text-decoration:none;
           font-weight:600;
           border-radius:8px;
           margin-top:10px;">
        Go to Marks Entry
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
  

document.getElementById("uploadBtn").onclick = async () => {
    let formData = new FormData();
    formData.append("class", classSelect.value);
    formData.append("title", title.value);
    formData.append("description", description.value);

    if(file.files.length > 0){
        formData.append("file", file.files[0]);
    }

    let res = await fetch("https://schoolproject1108.fwh.is/backend/upload_homework.php", {
        method: "POST",
        body: formData
    });

    let data = (await res.text()).trim();
    console.log(data);
if (data === "success") {
    alert("Homework Uploaded Successfully!");
    window.location.href = "index.php"; // auto redirect to home
}
 
    else if(data === "file_error"){
        alert("File Upload Failed! Check uploads folder permission.");
    }
    else if(data === "db_error"){
        alert("Database Insert Failed! Check SQL table.");
    }
    else {
        alert("Upload Failed!");
    }
}

</script>
</html>
