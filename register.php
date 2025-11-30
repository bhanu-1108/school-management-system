<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Central Academy</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="register.css">
</head>

<body>

<header>
    <div class="nav-bar">
        <div class="name-logo">
            <i class="fa-solid fa-graduation-cap"></i>
            <h2 onclick="location.href='index.html'" style="cursor:pointer;">
                Central<span id="school">Academy</span>
            </h2>
        </div>

        <div class="items">
            <a href="index.php">Home</a>
            <a href="aboutus.html">About Us</a>
            <a href="contactus.html">Contact Us</a>
            <a href="signin.php">Sign In</a>
        </div>
    </div>
</header>


<div class="body-signup">

    <div class="signup-container">

        <div class="logo">CA</div>

        <h2>Create Your Account</h2>
        <p>Join Central Academy as a Student or Teacher.</p>

        <!-- CORRECTED FORM -->
        <form id="regForm" class="signup-form">

            <input type="text" id="name" name="name" placeholder="Full Name" required>

            <input type="email" id="email" name="email" placeholder="Email Address" required>

            <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>

            <input type="password" id="password" name="password" placeholder="Password" required>

            <select id="position" name="position" required>
                <option value="">Select Position</option>
                <option value="Student">Student</option>
                <option value="Teacher">Teacher</option>
            </select>

            <!-- Hidden until Student selected -->
            <div id="classBox" style="display:none;">
                <select id="classSelect" name="class">
                    <option value="">Select Class</option>
                    <option value="Class 1">Class 1</option>
                    <option value="Class 2">Class 2</option>
                    <option value="Class 3">Class 3</option>
                    <option value="Class 4">Class 4</option>
                    <option value="Class 5">Class 5</option>
                </select>
            </div>

            <button type="submit" class="btn">Create Account</button>

            <p class="login-link">
                Already have an account? <a href="signin.php">Sign In</a>
            </p>

        </form>

    </div>
</div>

<script>
document.getElementById("position").addEventListener("change", () => {
    let pos = position.value;
    classBox.style.display = (pos === "Student") ? "block" : "none";
});

// FORM SUBMIT
document.getElementById("regForm").addEventListener("submit", async (e) => {
    e.preventDefault();

    let fd = new FormData(regForm);

    let res = await fetch("https://schoolproject1108.fwh.is/backend/register.php", {
        method: "POST",
        body: fd
    });

    let msg = (await res.text()).trim();

    if (msg === "success") {
        alert("Account Created Successfully!");
        window.location.href = "signin.php";
    } else {
        alert("Error: " + msg);
    }
});
</script>

</body>
</html>
