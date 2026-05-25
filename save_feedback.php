<?php

// Database Connection
$conn = mysqli_connect("localhost", "root", "", "ktell");

// Check Connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Get Form Data
$student = mysqli_real_escape_string($conn, $_POST['student_name']);
$college = mysqli_real_escape_string($conn, $_POST['college_name']);
$trainer = mysqli_real_escape_string($conn, $_POST['trainer_name']);
$course = mysqli_real_escape_string($conn, $_POST['course']);
$rating = mysqli_real_escape_string($conn, $_POST['rating']);
$feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

// Insert Query
$sql = "INSERT INTO feedback 
(student_name, college_name, trainer_name, course, rating, feedback)

VALUES

('$student', '$college', '$trainer', '$course', '$rating', '$feedback')";

// Execute Query
if (mysqli_query($conn, $sql)) {

    echo "
    <html>
    <head>
        <title>Feedback Submitted</title>

        <style>
            body{
                font-family: Arial;
                background:#f4f7fb;
                text-align:center;
                padding-top:100px;
            }

            .box{
                background:white;
                width:500px;
                margin:auto;
                padding:40px;
                border-radius:10px;
                box-shadow:0 4px 10px rgba(0,0,0,0.1);
            }

            h2{
                color:green;
                margin-bottom:20px;
            }

            a{
                text-decoration:none;
                background:#0d6efd;
                color:white;
                padding:12px 25px;
                border-radius:5px;
            }

            a:hover{
                background:#084298;
            }
        </style>
    </head>

    <body>

        <div class='box'>

            <h2>Feedback Submitted Successfully</h2>

            <br>

            <a href='index.html'>Go Back</a>

        </div>

    </body>
    </html>
    ";

} else {

    echo "Error: " . mysqli_error($conn);

}

// Close Connection
mysqli_close($conn);

?>