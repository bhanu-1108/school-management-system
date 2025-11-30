<?php
session_start();
if (!isset($_SESSION['user_id']) || ($_SESSION['position'] ?? '') !== 'Student') {
    header("Location: signin.php");
    exit;
}
$username = $_SESSION['username'];
$position = $_SESSION['position'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Report Card</title>
<link rel="stylesheet" href="style.css">

<style>
body { background:#f4f7fb; }

.report-card {
    width:95%; max-width:900px;
    margin:40px auto; background:white;
    padding:35px; border-radius:16px;
    box-shadow:0 6px 20px rgba(0,0,0,0.18);
}

h2 { text-align:center; color:#007BFF; font-size:28px; }

.sub-title { text-align:center; margin-bottom:18px; color:#444; }

.student-info {
    background:#f0f7ff; padding:12px 18px;
    border-left:5px solid #007bff; border-radius:8px;
    margin-bottom:25px; font-size:17px;
}

table { width:100%; border-collapse:collapse; margin-top:15px; }
th, td { border:1px solid #ddd; padding:12px; text-align:center; }
th { background:#36a7f6; color:white; }

.summary-box {
    margin-top:25px; background:#eaf4ff;
    padding:18px; border-left:5px solid #007bff;
    border-radius:12px; font-size:18px;
}

#downloadBtn {
    margin-top:25px; padding:12px 20px;
    background:#007bff; color:white;
    border:none; border-radius:8px;
    cursor:pointer; font-size:17px;
    display:block; margin-left:auto; margin-right:auto;
}
</style>
</head>

<body>

<div class="report-card">
    <h2>Central Academy</h2>
    <div class="sub-title">Student Report Card</div>

    <div id="stuInfo" class="student-info"></div>

    <table id="marksTable">
        <thead>
            <tr>
                <th>Test</th>
                <th>English</th>
                <th>Hindi</th>
                <th>Maths</th>
                <th>Science</th>
                <th>SST</th>
                <th>GK</th>
                <th>Total</th>
                <th>%</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody id="marksBody"></tbody>
    </table>

    <div id="summary" class="summary-box"></div>

    <button id="downloadBtn">Download PDF</button>
</div>

<script>
async function loadReport(){
    const res = await fetch("backend/get_report.php");
    const tests = await res.json();

    const body = document.getElementById("marksBody");
    const summary = document.getElementById("summary");
    const info = document.getElementById("stuInfo");

    info.innerHTML = `<b>Name:</b> <?php echo $username; ?>`;

    if (!tests.length) {
        summary.innerHTML = "<b>No marks available yet.</b>";
        return;
    }

    let totalAll = 0, obtainedAll = 0;

    tests.forEach(m => {
        const total = Number(m.english_total) + Number(m.hindi_total) + Number(m.maths_total) +
                      Number(m.science_total) + Number(m.sst_total) + Number(m.gk_total);

        const obtained = Number(m.english_obtained) + Number(m.hindi_obtained) + Number(m.maths_obtained) +
                         Number(m.science_obtained) + Number(m.sst_obtained) + Number(m.gk_obtained);

        const percent = ((obtained / total) * 100).toFixed(2);

        let grade = "D";
        if (percent >= 90) grade = "A+";
        else if (percent >= 80) grade = "A";
        else if (percent >= 70) grade = "B";
        else if (percent >= 60) grade = "C";

        totalAll += total;
        obtainedAll += obtained;

        body.innerHTML += `
            <tr>
                <td>${m.test_type}</td>
                <td>${m.english_obtained}/${m.english_total}</td>
                <td>${m.hindi_obtained}/${m.hindi_total}</td>
                <td>${m.maths_obtained}/${m.maths_total}</td>
                <td>${m.science_obtained}/${m.science_total}</td>
                <td>${m.sst_obtained}/${m.sst_total}</td>
                <td>${m.gk_obtained}/${m.gk_total}</td>
                <td>${obtained}/${total}</td>
                <td>${percent}%</td>
                <td>${grade}</td>
            </tr>
        `;
    });

    const overallPercent = ((obtainedAll / totalAll) * 100).toFixed(2);
    const finalGrade = overallPercent >= 90 ? "A+" :
                       overallPercent >= 80 ? "A" :
                       overallPercent >= 70 ? "B" :
                       overallPercent >= 60 ? "C" : "D";

    summary.innerHTML = `
        <b>Total Marks:</b> ${obtainedAll}/${totalAll}<br>
        <b>Percentage:</b> ${overallPercent}%<br>
        <b>Final Grade:</b> ${finalGrade}
    `;
}

document.getElementById("downloadBtn").onclick = () => window.print();
loadReport();
</script>

</body>
</html>
