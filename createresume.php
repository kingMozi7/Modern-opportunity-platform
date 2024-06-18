<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Resumes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            height: 100vh;
            background: rgb(249, 249, 249);
            background: radial-gradient(circle, rgba(249, 249, 249, 1) 0%, rgba(240, 232, 127, 1) 49%, rgba(246, 243, 132, 1) 100%);

        }
    </style>
</head>

<body>

    

    <div class="container">

        <div class="bg-white rounded shadow p-2 mt-4" style="min-height:80vh">
            <div class="d-flex justify-content-between border-bottom">
                <h5>Create Resume</h5>
                <div>
                    <a href="" class="text-decoration-none"><i class="bi bi-arrow-left-circle"></i> Back</a>
                </div>
            </div>

            <div>

                <form class="row g-3 p-3" method="post">
                    <h5 class="mt-3 text-secondary"><i class="bi bi-person-badge"></i> Personal Information</h5>
                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="full_name" placeholder="Name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" placeholder="dev@abc.com" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label"> Objective</label>
                        <textarea class="form-control" name="objective"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mobile No</label>
                        <input type="number" name="mobile" min="1111111111" placeholder="9569569569" max="9999999999"
                            class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date Of Birth</label>
                        <input type="date" name="dob" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select class="form-select" name="gender">
                            <option>Male</option>
                            <option>Female</option>
                            <option>Transgender</option>




                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Religion</label>
                        <select class="form-select" name="religion">
                            <option>Islam</option>
                            <option>Hindu</option>
                            <option>Sikh</option>
                            <option>Christian</option>



                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nationality</label>
                        <select class="form-select" name="nationality">
                            <option>Pakistani</option>
                            <option>Non Pakistani</option>


                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Marital Status</label>
                        <select class="form-select" name="marital_status">
                            <option>Married</option>
                            <option>Single</option>
                            <option>Divorced</option>
                            <option>Bhadwa</option>

                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Hobbies</label>
                        <input type="text" name="hobbies" placeholder="Reading Books, Watching Movies" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Languages Known</label>
                        <input type="text" name="languages" placeholder="Urdu,English" class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label"> Address</label>
                        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h5 class=" text-secondary"><i class="bi bi-briefcase"></i> Experience</h5>
                        
                    </div>
        
                    <div class="col-12">
                        <textarea class="form-control" name="experience"></textarea>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <h5 class=" text-secondary"><i class="bi bi-journal-bookmark"></i> Education</h5>
                        
                    </div>

                    <div class="col-12">
                        <textarea class="form-control" name="education"></textarea>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <h5 class=" text-secondary"><i class="bi bi-boxes"></i> Skills</h5>
                        
                    </div>

                   <div class="col-12">
                        <textarea class="form-control" name="skills"></textarea>
                    </div>



                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary" name="submit"><i class="bi bi-floppy"></i> Save
                            Resume</button>
                    </div>
                </form>
            </div>





        </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>


<?php
$db = mysqli_connect("localhost", "root", "", "talent-tide");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if (isset($_POST['submit'])) {
    $fullName = mysqli_real_escape_string($db, $_POST["full_name"]);
    $email = mysqli_real_escape_string($db, $_POST["email"]);
    $objective = mysqli_real_escape_string($db, $_POST["objective"]);
    $mobile = mysqli_real_escape_string($db, $_POST["mobile"]);
    $dob = mysqli_real_escape_string($db, $_POST["dob"]);
    $gender = mysqli_real_escape_string($db, $_POST["gender"]);
    $religion = mysqli_real_escape_string($db, $_POST["religion"]);
    $nationality = mysqli_real_escape_string($db, $_POST["nationality"]);
    $maritalStatus = mysqli_real_escape_string($db, $_POST["marital_status"]);
    $hobbies = mysqli_real_escape_string($db, $_POST["hobbies"]);
    $languages = mysqli_real_escape_string($db, $_POST["languages"]);
    $address = mysqli_real_escape_string($db, $_POST["address"]);
    $experience = mysqli_real_escape_string($db, $_POST["experience"]);
    $education = mysqli_real_escape_string($db, $_POST["education"]);
    $skills = mysqli_real_escape_string($db, $_POST["skills"]);

    $ist = "INSERT INTO resume (full_name, email_id, objective, mobile_no, dob, gender, religion, nationality, marital_status, hobbies, languages, address, experience, education, skill) VALUES ('$fullName', '$email', '$objective', '$mobile', '$dob', '$gender', '$religion', '$nationality', '$maritalStatus', '$hobbies', '$languages', '$address', '$experience', '$education', '$skills')";

    if ($db->query($ist) === TRUE) {
        echo '<form method="post" action="download_pdf.php">';
        echo '<input type="hidden" name="full_name" value="' . $fullName . '">';
        echo '<input type="hidden" name="email" value="' . $email . '">';
        echo '<input type="hidden" name="objective" value="' . $objective . '">';
        echo '<input type="hidden" name="mobile" value="' . $mobile . '">';
        echo '<input type="hidden" name="dob" value="' . $dob . '">';
        echo '<input type="hidden" name="gender" value="' . $gender . '">';
        echo '<input type="hidden" name="religion" value="' . $religion . '">';
        echo '<input type="hidden" name="nationality" value="' . $nationality . '">';
        echo '<input type="hidden" name="marital_status" value="' . $maritalStatus . '">';
        echo '<input type="hidden" name="hobbies" value="' . $hobbies . '">';
        echo '<input type="hidden" name="languages" value="' . $languages . '">';
        echo '<input type="hidden" name="address" value="' . $address . '">';
        echo '<input type="hidden" name="experience" value="' . $experience . '">';
        echo '<input type="hidden" name="education" value="' . $education . '">';
        echo '<input type="hidden" name="skills" value="' . $skills . '">';
        echo '<button type="submit" class="btn btn-success mt-3"><i class="bi bi-download"></i> Download PDF</button>';
        echo '</form>';
        echo '<script>alert("Successfully uploaded your data.");</script>';
    } else {
        echo "Error: " . $ist . "<br>" . $db->error;
    }
}
?>

