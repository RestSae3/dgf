<?php
include('adminheader.php');
include ('../db_connect.php');

?>

<div class="container">
    <h3>
        Add Testimonials Forms
    </h3>


    
<?php

if(isset($_POST["i_btn_add_test"]))
{

    $name= $_POST["test_name"];
    $designation = $_POST["test_designation"];
    $details = $_POST["Detail"];
    $profile = $_FILES["i_file"]["name"];
    $tmp = $_FILES["i_file"]["tmp_name"];
    $location = "assets/Testimonials/";
    $saveimg = $location.$profile;
   
    if(move_uploaded_file($tmp, $saveimg))
    {
        $insert = "insert into add_testmonials(Name,Designation,Detail,Profile) values ('".$name."', 
        '".$designation."', '".$details."','".$saveimg."')";

        $inserttestimonials = mysqli_query($connection , $insert);

        if($inserttestimonials)
        {
            echo  '<center><div class="alert alert-success w-50" role="alert">
Testimonials Add Successfully!!!!!
</div></center>';
        }

    }


}
?>
    <form method="POST" enctype="multipart/form-data">
    <div class="row">
    <div class="col-lg-6 mt-3">
<input type="text" placeholder="Name" class="form-control" name="test_name">
    </div>
    <div class="col-lg-6 mt-3">
<input type="text" placeholder="Designation" class="form-control" name="test_designation">
    </div>

    <div class="col-lg-12">
<textarea name="Detail" class="form-control mt-3" placeholder="Details" rows="4"></textarea>
    </div>
    <div class="col-lg-12">
<input type="file" name="i_file" class="form-control mt-3">
</div>
</div>

<button class="btn btn-info mt-3" name="i_btn_add_test">Add Testimonials</button>

</form>
</div>