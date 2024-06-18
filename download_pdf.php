<?php
// Include TCPDF library
require_once('tcpdf/tcpdf.php');

// Fetch data from POST request
$fullName = isset($_POST['full_name']) ? $_POST['full_name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$objective = isset($_POST['objective']) ? $_POST['objective'] : '';
$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
$dob = isset($_POST['dob']) ? $_POST['dob'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$religion = isset($_POST['religion']) ? $_POST['religion'] : '';
$nationality = isset($_POST['nationality']) ? $_POST['nationality'] : '';
$maritalStatus = isset($_POST['marital_status']) ? $_POST['marital_status'] : '';
$hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : '';
$languages = isset($_POST['languages']) ? $_POST['languages'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$experience = isset($_POST['experience']) ? $_POST['experience'] : '';
$education = isset($_POST['education']) ? $_POST['education'] : '';
$skills = isset($_POST['skills']) ? $_POST['skills'] : '';

// Create new PDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Resume');
$pdf->SetSubject('Resume');
$pdf->SetKeywords('Resume, PDF');

// Add a page
$pdf->AddPage();

// Set some content to print
$html = '
    <h1>Resume</h1>
    <p>Full Name: ' . $fullName . '</p>
    <p>Email: ' . $email . '</p>
    <p>Objective: ' . $objective . '</p>
    <p>Mobile: ' . $mobile . '</p>
    <p>Date of Birth: ' . $dob . '</p>
    <p>Gender: ' . $gender . '</p>
    <p>Religion: ' . $religion . '</p>
    <p>Nationality: ' . $nationality . '</p>
    <p>Marital Status: ' . $maritalStatus . '</p>
    <p>Hobbies: ' . $hobbies . '</p>
    <p>Languages Known: ' . $languages . '</p>
    <p>Address: ' . $address . '</p>
    <p>Experience: ' . $experience . '</p>
    <p>Education: ' . $education . '</p>
    <p>Skills: ' . $skills . '</p>
    <!-- Add other fields here -->
';

// Print HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('resume.pdf', 'D');
?>
