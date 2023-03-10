c<?php
include('../db.php');

session_start();
$uid=$_SESSION['sid'];
if($uid==1){

}
else{
    header("location:../login_Form.php")	;
}

?>
<!DOCTYPE html>
<?php

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$submit_id = $_REQUEST['id'];
$sql = "SELECT * FROM doctor WHERE id ='" . $submit_id . "';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $email = $row['email'];
        $userName = $row['docName'];
        $address = $row['address'];
        $baseHospital = $row['hospital'];
        $telNo = $row['telNo'];
        $telHome = $row['telHome'];
        $channelRoomNo = $row['channelRoomNo'];
        $priceForChannel = $row['priceForChannel'];
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>| ABC E-Channel |</title>
        <link rel="stylesheet" href="src/w3.css">
        <link rel="stylesheet" href="src/latin_font.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" href="src/web-fonts-with-css/css/fontawesome-all.min.css">    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display|Raleway" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/adminStyle.css">
        <link rel="stylesheet" href="css/doctorPageStyle.css">

    </head>
    <body>
        <div id="container">
            <?php include 'header_after_log.php'; ?>
        </div>
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <form id="AddDoctorForm" class="needs-validation"  action="updateDoctor.php?id=<?php echo $submit_id ?>" method="POST" novalidate>
                        <h3 class="text text-primary" style="text-align: center">Edit a Doctor</h3><br>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="docName">Name</label>
                                <input type="text" class="form-control" name="docName" id="docName" value="<?php echo $userName; ?>" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Email.
                                </div>
                            </div>        
                        </div><div class="form-row">
                            <div class="col-md-12">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" name="email" id="inputEmail4" value="<?php echo $email; ?>" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Email.
                                </div>
                            </div>        
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Address</strong></label>
                                <input type="text" class="form-control" name="address" id="validationCustom03" value="<?php echo $address; ?>" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Address.
                                </div>
                            </div>
                        </div>  
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Contact Number</strong></label>
                                <input type="number" class="form-control" name="telNo" id="validationCustom03"value="<?php echo $telNo; ?>" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Contact Number.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Base Hospital</strong></label>
                                <input type="text" class="form-control" name="baseHospital" id="validationCustom03" value="<?php echo $baseHospital; ?>" required>
                                <div class="invalid-feedback">
                                    Please provide doctor's name of the Base hospital.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Home Tel Number</strong></label>
                                <input type="number" class="form-control" name="telHome" id="validationCustom03" value="<?php echo $telHome; ?>" required>
                                <div class="invalid-feedback">
                                    Please enter valid phone number.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Channeling Room Number</strong></label>
                                <input type="number" class="form-control" name="channelRoomNo" id="validationCustom03" value="<?php echo $channelRoomNo; ?>" required>
                                <div class="invalid-feedback">
                                    Please enter valid room number.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="validationCustom03"><strong>Doctor Fee</strong></label>
                                <input type="number" class="form-control" name="priceForChannel" id="validationCustom03" value="<?php echo $priceForChannel; ?>" required>
                                <div class="invalid-feedback">
                                    Please enter valid room number.
                                </div>
                            </div>
                        </div>             
                        <br>
                        <button class="btn btn-primary" type="submit" name="update">Update Details</button>
                    </form>   
                </div>
                <div class="col-md-4 col-lg-4">
                    <img id="dctrimg" src="img/doctor.png">
                </div>
            </div>
        </div>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script type="text/javascript">
        $("#password").password('toggle');
    </script>

</body>
</html>
