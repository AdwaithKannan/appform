<?php
include 'connect.php';

ini_set('display_errors', '1');
error_reporting(E_ALL);

// $query ="select * from applications order by id desc limit 1";
// $result =mysqli_query($conn,$query);
// $row =mysqli_fetch_array($result);

// //print_r($row['admission_no']);
// $lastId =$row['id'];

// if($row == ""){
//     print_r($lastId);
//     $empId ="001";
// }
// else{
//     $lastId =$row['id'];
//     $empId ="00" .($lastId + 1);
//   // print_r($lastId + 1);
// }
//?>





<!DOCTYPE html>
<html>
<head>
<title>Application Form</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">



<script>
function ageCount() {
var date1 = new Date();
var appsdob = document.getElementById("appsdate").value;
var date2 = new Date(appsdob);
var pattern = /^\d{4}\-\d{1,2}\-\d{1,2}$/; //Regex to validate date format (yyyy/mm/dd)
if (pattern.test(appsdob)) {
var y1 = date1.getFullYear(); //getting current year
var y2 = date2.getFullYear(); //getting stddob year
var age = y1 - y2 - 1;

document.getElementById("appsage").value = age;

} else {
        alert("Invalid date format. Please Input in (yyyy/mm/dd) format!");
    }
}
</script>


<script>
    let counter = 1;

    function incrementNumber() {
      document.getElementById('incrementingNumber').value = counter++;
    }
  </script>




<script>
function calculate(subject) {
var maxMark = parseFloat(document.getElementById(subject + '_max_mark').value);
var markSecured = parseFloat(document.getElementById(subject + '_mark_sec').value);
var percentage = (markSecured / maxMark) * 100;
document.getElementById(subject + '_percent').value = percentage.toFixed(2);
// Calculate the total marks and total percentage
calculateTotal();
}

function calculateTotal() {
var totalMarks = 0;
var totalMaxMarks = 0;

// Loop through each subject and calculate the total
var subjects = ['p', 'c', 'm', 'b']; // You can add more subjects as needed
for (var i = 0; i < subjects.length; i++) {
    var subject = subjects[i];
    var maxMark = parseFloat(document.getElementById(subject + '_max_mark').value);
    var markSecured = parseFloat(document.getElementById(subject + '_mark_sec').value);
        totalMarks += markSecured;
        totalMaxMarks += maxMark;
        }

// Calculate the total percentage
var totalPercentage = (totalMarks / totalMaxMarks) * 100;
// Update the total marks and total percentage fields
document.getElementById('tot2').value = totalMarks.toFixed(0);
document.getElementById('tot1').value = totalMaxMarks.toFixed(0);
document.getElementById('tot3').value = totalPercentage.toFixed(0);
}
</script>

<script>
function changeToUpperCase(founder)
{
   document.getElementById('applicant_name').value = founder.toUpperCase();
}
</script>

</head>
<body id="home" class="new">
<div class="wrapper vertical-header">
<section id="home" class="page-section-pt position-relative ">
<div class="container-fluid" style="padding:0;">
<div class="card">
<div class="all-form">
<div class="card-body">
    <div class="logo text-center">
        <img src="https://www.welcarecollegeofnursing.org/application-form-2023-24/images/welcare-logo1.png">
    </div>
<h1 class="text-center heading">WELCARE COLLEGE OF NURSING</h1>
<p class="text-center">PAMPRA, VETTICKAL P.O, MULANTHURUTHY, ERNAKULAM-682314<br>
PH: 9947018666, 9496313300<br>
Website: welcarecollegeofnursing.org

</div>
<div>
<p class="message" id="message"></p>
<form onsubmit="return submitForm(this);" method="post" action="application_save.php" onsubmit="return submitForm(this);" enctype="multipart/form-data" class="moulana-form-phr-admsn">

<div class="form-group row">
<div class="col-sm-6">
<label for="academic_year" class="form-label">Application No.<span class="forminator-required">*</span></label>
<!-- <input type="text" class="form-control" name="admission_no" id="incrementingNumber" readonly="readonly"/> -->
<input type="text" class="form-control" name="admission_no" placeholder=""  value=""  required="" >
</div>
<div class="col-sm-6">
<label for="text" class="form-label">Upload Your Passport Size Photo <span class="forminator-required">*</span></label>
<input type="file" class="form-img form-control" name="photo" id="file-upload" required="">
</div>
</div>

<div class="form-group row">
<div class="col-sm-12">
<label for="applicant_name" class="">Name of Student<span class="forminator-required">*</span>(In Block Letters as per SSLC Certificate)</label>
<input type="text" class="form-control" name="applicant_name" id="applicant_name" onkeyup=changeToUpperCase(this.value) placeholder="" onkeypress="return onlyAlphabets(event)" onDrag="return false" onDrop="return false" onPaste="return false" autocomplete="off" required="">
</div>
</div>

<div class="form-group row">
<div class="col-sm-4">
<label for="date_of_issue" class="">Date of Birth<span class="forminator-required">*</span> </label>
<input type="date" class="form-control"  name="date_of_birth" onChange="ageCount();" style="line-height: 14px;" placeholder="" required="">
</div>
<div class="col-sm-4">
<label for="residence_visa_no" class="">Religion<span class="forminator-required">*</span> </label>
<input type="text" class="form-control" name="religion" placeholder="" onkeypress="return onlyAlphabets(event)" onDrag="return false" onDrop="return false" onPaste="return false" autocomplete="off" required="">
</div>
<div class="col-sm-4">
<label for="residence_visa_no" class="">Caste<span class="forminator-required">*</span> </label>
<input type="text" class="form-control" name="caste" placeholder="" onkeypress="return onlyAlphabets(event)" onDrag="return false" onDrop="return false" onPaste="return false" autocomplete="off" required="">
</div>
</div>

<div class="form-group row">
<div class="col-sm-6">
<label for="emergency_contact_uae" class="">Address for communication<span class="forminator-required">*</span></label>
<textarea name="communication_address" rows="5" cols="80" required=""></textarea>
</div>
<div class="col-sm-6">
<label for="emergency_contact_uae" class="">Post Office<span class="forminator-required">*</span></label>
<textarea name="post_office" rows="5" cols="80" required=""></textarea>
</div>
</div>

<div class="form-group row">
<div class="col-sm-4">
<label for="contact_no" class=" form-label">District<span class="forminator-required">*</span> </label>
<input type="text" class="form-control" name="district" placeholder="" required="" placeholder=""  onkeypress="return onlyAlphabets(event)" onDrag="return false" onDrop="return false" onPaste="return false" autocomplete="off" required="">
</div>
<div class="col-sm-4">
<label for="emergency_contact_uae" class=" form-label">State<span class="forminator-required">*</span></label>
<input type="text" class="form-control" name="state" placeholder="" required="" placeholder=""  onkeypress="return onlyAlphabets(event)" onDrag="return false" onDrop="return false" onPaste="return false" autocomplete="off" required="">
</div>
<div class="col-sm-4">
<label for="email" class=" form-label">Pincode <span class="forminator-required">*</span></label>
<input type="text" class="form-control" name="pincode" placeholder="" required="">
</div>
</div>

<div class="form-group row">
<div class="col-sm-4">
<label for="contact_no" class=" form-label">Nationality<span class="forminator-required">*</span> </label>
<input type="text" class="form-control" name="nationality" placeholder="" onkeypress="return onlyAlphabets(event)" onDrag="return false" onDrop="return false" onPaste="return false" autocomplete="off" required="">
</div>
<div class="col-sm-4">
<label for="emergency_contact_uae" class=" form-label">Mobile Number<span class="forminator-required">*</span></label>
<input type="text" class="form-control" name="mobile_no" placeholder="" required="" placeholder="Phone"  onkeypress="return isNumberKey(event)" minlength="7" maxlength="11" onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" autocomplete="off">
</div>
<div class="col-sm-4">
<label for="email" class=" form-label">Email Address<span class="forminator-required">*</span></label>
<input type="email" class="form-control" name="email" placeholder="" required="">
</div>
</div>

<div class="form-group row">
<div class="col-sm-6">
<label for="contact_no" class=" form-label">Aadhar No<span class="forminator-required">*</span> </label>
<input type="text" class="form-control" name="aadhar_number" placeholder="" required="" placeholder="Phone"  onkeypress="return isNumberKey(event)" minlength="7" maxlength="18" onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" autocomplete="off">
</div>
<div class="col-sm-6">
<label for="emergency_contact_uae" class=" form-label">Blood Group<span class="forminator-required">*</span></label>
<input type="text" class="form-control" name="blood" placeholder="" required="" placeholder="">
</div>
</div>

<div class="form-group row">
<div class="col-sm-6">
<label for="emergency_contact_uae" class="">Name of the Parent/Guardian<span class="forminator-required">*</span></label>
<textarea name="permanant_address" rows="5" cols="80" required=""></textarea>
</div>
<div class="col-sm-6">
<label for="emergency_contact_uae" class="">Contact number of Parent<span class="forminator-required">*</span></label>
<textarea name="contact_parent" rows="5" cols="80" required=""></textarea>
</div>
</div>

<div class="form-group row">
<div class="col-sm-6">
<label for="contact_no" class=" form-label">Father’s Occupation<span class="forminator-required">*</span> </label>
<input type="text" class="form-control" name="occupation" placeholder="" required="">
</div>
<div class="col-sm-6">
<label for="emergency_contact_uae" class=" form-label">Annual Income<span class="forminator-required">*</span></label>
<input type="text" class="form-control" name="income" placeholder="" required="">
</div>
</div>

<div class="form-group row">
<div class="col-sm-12">
<h5 class="sep-head"><span class="a-4">Details of Qualifying Examination Passed
</span></h5>
</div>
</div>

<div class="form-group row">
<div class="col-sm-6">
<label for="emergency_contact_uae" class="form-label">Qualifying Exam<span class="forminator-required">*</span></label>
<input type="text" class="form-control" name="hse" placeholder="" required="">
</div>
<div class="col-sm-6">
<label for="emergency_contact_uae" class="form-label">Year of passing<span class="forminator-required">*</span></label>
<input type="text" class="form-control" name="year_of_passing" placeholder="">
</div>
</div>

<!-- <div class="form-group row">
<div class="col-sm-12 form-label">
<h5 class="sep-head"><span class="a-3">OBTAINED MARK IN ELIGIBLE EXAMINATION 
<p><input name="cbse" class="ptype" type="checkbox" value="1" title="Please Select Type" /> &nbsp;CBSE/ICSE&nbsp; <input name="hse1" class="ptype" title="Please Select Type" type="checkbox" value="1" /> &nbsp;HSE&nbsp;</span></h5>
</div>
</div> -->
<!DOCTYPE html>
<html>
<head>
<title>Exam Results</title>
</head>
<body>
<!-- <form action="process_form.php" method="post"> -->


<table>
  <tr>
    <th class="main-head-tbl" colspan="3">
      <h5 class="sep-head">OBTAINED MARK IN ELIGIBLE EXAMINATION
        <p class="radio-tbl">
          <input type="radio" id="cbse_icse" name="exam_type" value="CBSE/ICSE" onchange="toggleMarks('cbse')">
          <label for="cbse_icse">CBSE/ICSE</label>
          <input type="radio" id="hse" name="exam_type" value="HSE" onchange="toggleMarks('hse')">
          <label for="hse">HSE</label>
        </p>
      </h5>
    </th>
  </tr>
  <tr>
    <th class="text-center" rowspan="2">Subject</th>
    <th class="text-center" rowspan="2">Obtained</th>
    <th class="text-center" id="cbse-total-column">Total (CBSE)</th>
    <th class="text-center" id="hse-total-column" style="display: none;">Total (HSE)</th>
  </tr>
  <tr>
    <!--<th class="text-center" id="cbse-total-header">Total (CBSE)</th>-->
    <th class="text-center" id="hse-total-header" style="display: none;">Total (HSE)</th>
  </tr>
  <tr class="hse-subjects">
    <td class="inner-td">English</td>
    <td class="inner-td"><input type="text" class="table-form-control hse-marks" name="hse" placeholder="" required=""></td>
    <td class="inner-td hse-total">100</td>
    <td class="inner-td hse-total" style="display: none;">100</td>
  </tr>
  <tr class="hse-subjects">
    <td class="inner-td">Physics</td>
    <td class="inner-td"><input type="text" class="table-form-control hse-marks" name="hse" placeholder="" required=""></td>
    <td class="inner-td hse-total">120</td>
    <td class="inner-td hse-total" style="display: none;">120</td>
  </tr>
  <tr class="hse-subjects">
    <td class="inner-td">Chemistry</td>
    <td class="inner-td"><input type="text" class="table-form-control hse-marks" name="hse" placeholder="" required=""></td>
    <td class="inner-td hse-total">120</td>
    <td class="inner-td hse-total" style="display: none;">120</td>
  </tr>
  <tr class="hse-subjects">
    <td class="inner-td">Biology</td>
    <td class="inner-td"><input type="text" class="table-form-control hse-marks" name="hse" placeholder="" required=""></td>
    <td class="inner-td hse-total">120</td>
    <td class="inner-td hse-total" style="display: none;">120</td>
  </tr>

  <tr class="cbse-subjects" style="display: none;">
    <td class="inner-td">English</td>
    <td class="inner-td"><input type="text" class="table-form-control hse-marks" name="hse" placeholder="" required=""></td>
    <td class="inner-td hse-total">100</td>
  </tr>
  <tr class="cbse-subjects" style="display: none;">
    <td class="inner-td">Physics</td>
    <td class="inner-td"><input type="text" class="table-form-control hse-marks" name="hse" placeholder="" required=""></td>
    <td class="inner-td hse-total">100</td>
  </tr>
  <tr class="cbse-subjects" style="display: none;">
    <td class="inner-td">Chemistry</td>
    <td class="inner-td"><input type="text" class="table-form-control hse-marks" name="hse" placeholder="" required=""></td>
    <td class="inner-td hse-total">100</td>
  </tr>
  <tr class="cbse-subjects" style="display: none;">
    <td class="inner-td">Biology</td>
    <td class="inner-td"><input type="text" class="table-form-control hse-marks" name="hse" placeholder="" required=""></td>
    <td class="inner-td hse-total">100</td>
  </tr>
  
</table>







<!-- <table border="0" class="table-style">
<tr>
<th>Subjects</th>
<th class="align_class">Obtained</th>
<th class="align_class">Total</th>
<th class="align_class">HSE</th>
<th class="align_class">CBSC</th>
</tr>
<tr>
    <td>English</td>
    <td><input type="text" name="max_mark[english]" id="p_max_mark" required=""></td>
    <td><input type="text" name="mark_sec[physics]" id="p_mark_sec" oninput="calculate('p')" required=""></td>
    <td><input type="text" name="percent[physics]" id="p_percent" readonly></td>
    <td><input type="text" name="no_of_chance[physics]" required=""></td>
</tr>
<tr>
    <td>Physics</td>
    <td><input type="text" name="max_mark[chemistry]" id="c_max_mark" required=""></td>
    <td><input type="text" name="mark_sec[chemistry]" id="c_mark_sec" oninput="calculate('c')" required=""></td>
    <td><input type="text" name="percent[chemistry]" id="c_percent" readonly></td>
    <td><input type="text" name="no_of_chance[chemistry]" required=""></td>
</tr>
<tr>
<td>Chemistry</td>
    <td><input type="text" name="max_mark[mathematics]" id="m_max_mark" required=""></td>
    <td><input type="text" name="mark_sec[mathematics]" id="m_mark_sec" oninput="calculate('m')" required=""></td>
    <td><input type="text" name="percent[mathematics]" id="m_percent" readonly></td>
    <td><input type="text" name="no_of_chance[mathematics]" required=""></td>
</tr>
<tr>
    <td>Biology</td>
    <td><input type="text" name="max_mark[biology]" id="b_max_mark" required=""></td>
    <td><input type="text" name="mark_sec[biology]" id="b_mark_sec" oninput="calculate('b')" required=""></td>
    <td><input type="text" name="percent[biology]" id="b_percent" readonly></td>
    <td><input type="text" name="no_of_chance[biology]" required=""></td>
</tr>

</table> -->
<br>
<div class="form-group row">
<p class="italian-font">NB: Application fee Rs. 1000/- can be remitted through fee payment link in the college website and receipt should be uploaded here.</p>
</div>



<div class="sig-upload-wrap">
<div class="sig-upload-box">
    <label for="text" class="">Upload Receipt <span class="forminator-required">*</span></label>
    <input type="file" class="file-upload" name="receipt" id="file-upload-sig" required="">
</div>
</div>


<p class="frm-msg">
<input name="process_improvement" class="ptype" type="checkbox" value="1" title="Please Select Patient Type" />
I, hereby agree that the information given above is correct and complete to the best of my
knowledge and belief, nothing has given concealed/distorted. If I am found to have
concealed/distorted, any material information, the authorities shall be liable to take action
against me and summarily cancel admission, and also agree to obey by the rules and
regulations of the college. I understand, admission will be finalized only after document
verification</p>










<div class="form-group row">
<div class="col-sm-12 text-center">
                <input name="Submit_btn" value="Submit" onclick="incrementNumber()" class="submitbtn" type="submit">

<!--<input name="Submit_btn" value="Submit" onclick="incrementNumber()" class="submitbtn" type="submit" >-->

</div>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
</div>
</body>
</html>


<script>
  function toggleMarks(examType) {
    if (examType === 'cbse') {
      document.querySelectorAll('.cbse-subjects').forEach(function(el) {
        el.style.display = 'table-row';
      });
      document.querySelectorAll('.hse-subjects').forEach(function(el) {
        el.style.display = 'none';
      });
      document.getElementById('cbse-total-column').style.display = 'table-cell';
      document.getElementById('hse-total-column').style.display = 'none';
      document.getElementById('cbse-total-header').style.display = 'table-cell';
      document.getElementById('hse-total-header').style.display = 'none';
    } else if (examType === 'hse') {
      document.querySelectorAll('.cbse-subjects').forEach(function(el) {
        el.style.display = 'none';
      });
      document.querySelectorAll('.hse-subjects').forEach(function(el) {
        el.style.display = 'table-row';
      });
      document.getElementById('cbse-total-column').style.display = 'none';
      document.getElementById('hse-total-column').style.display = 'table-cell';
      document.getElementById('cbse-total-header').style.display = 'none';
      document.getElementById('hse-total-header').style.display = 'table-cell';
    }
  }
</script>



<script>
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}
</script>

<script>
$('#submit').click(function() {
$(this).addClass('button_loader').attr("value", "");
window.setTimeout(function() {
$('#submit').removeClass('button_loader').attr("value", "\u2713");
$('#submit').prop('disabled', true);
}, 3000);
});

function submitForm()
{
     return alert('Please wait at least 20 seconds while your application is being saved..Click OK to proceed..');
}

$(window).load(function()
{
     // $('#popup1').modal('show');
});

function myFunction()
{
// window.print();
}
</script>

<script src="assets/js/script.js"></script>
    <script>
        function isNumberKey(evt)
        {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31
        && (charCode < 48 || charCode > 57))
        return false;
        return true;
        }
        
        
         function onlyAlphabets(e, t) {
                   try {
                       if (window.event) {
                           var charCode = window.event.keyCode;
                       }else if (e) {
                           var charCode = e.which;
                       }else { return true; }
        
                       if ((charCode > 64 && charCode < 123) || (charCode > 31 && charCode < 48))
                           return true;
                       else
                           return false;
                   }
                   catch (err) {
                       alert(err.Description);
                   }
                }
        
        </script>