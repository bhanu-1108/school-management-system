<?php
session_start();
if (isset($_SESSION['user_id'])) {
    if (($_SESSION['position'] ?? '') === 'Teacher') {
        header("Location: index.php");
    } elseif (($_SESSION['position'] ?? '') === 'Student') {
        header("Location: index.php");
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="signin.css">
</head>
<body>

<header>
    <div class="nav-bar">
        <div class="name-logo">
            <i class="fa-solid fa-graduation-cap"></i>
            <h2>Central<span id="school">Academy</span></h2>
        </div>
        <div class="items">
            <a href="index.php">Home</a>
            <a href="aboutus.php">About Us</a>
            <a href="contactus.php">Contact Us</a>
            
        </div>
    </div>
</header>

<div class="form-section">
    <div class="form-card">
        <h2>Sign in to your account</h2>

        <form class="login-form" id="loginForm">
            <label>Email*</label>
            <input type="email" id="email" required>

            <label>Password*</label>
            <input type="password" id="password" required>

            <label>Position*</label>
            <select id="position" required>
                <option value="">Select</option>
                <option value="Student">Student</option>
                <option value="Teacher">Teacher</option>
            </select>

            <button type="submit" class="primary-btn">Sign In</button>
        </form>
    </div>
</div>



</body>
<script>
document.getElementById("loginForm").addEventListener("submit", async function(e){
    e.preventDefault();

    let formData = new FormData();
    formData.append("email", email.value);
    formData.append("password", password.value);
    formData.append("position", position.value);

    let res = await fetch("https://schoolproject1108.fwh.is/backend/login.php", {
        method: "POST",
        body: formData
    });

    let data = (await res.text()).trim();

    if (data === "invalid") {
        alert("Invalid Credentials");
        return;
    }

    if (data === "Teacher") {
        window.location.href = "index.php";
    } else if (data === "Student") {
        window.location.href = "index.php";
    }
});
</script>
</html>
