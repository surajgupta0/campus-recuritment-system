<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/action.css">
</head>
<body>
    
    





<div class="form_container">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
    <h2>Action</h2>
    
    <select name="status" id="delect" required>
    <option disabled >Select status</option>
        
        <option  value="approved">Approved</option>
        <option  value="rejected">Rejected</option>
    </select>

    <textarea name="message" rows="10" cols="50" placeholder="Message">

    </textarea>
    <input type="submit" name="submit" value="submit">
    
    </form>
</div>



    <?php
    if(isset($_POST['submit'])){
    
    $main_id=$_GET['id'];
    $status=$_POST['status'];
    $message=$_POST['message'];
    $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");

    $sql="UPDATE applied_student SET status='{$status}',message='{$message}'
    
    WHERE main_id={$main_id}  ";
    if(mysqli_query($con,$sql))
    {
        header("location:http://localhost/campus/dashboard/all_vacancy.php");
    }
    else{
        echo"can't update";
    }
    


}

 ?>
<?php
    include "header.php";?>





</body>
</html>