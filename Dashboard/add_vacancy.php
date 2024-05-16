<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add_vacancy.css">
</head>
<body>
    <?php
    include "header.php";
   
    ?><div class="vacancy_container">
        <div class="overlay">
        
        
    <form action="add_vacancy_action.php" method="post" enctype="multipart/form-data" >
        <h2>Add Vacancy</h2>

    <table  cellspacing="0px">
        <tr>
            <th>Job Title</th>
            <td><input type="text" name="job_title"   placeholder="Job Title" required> </td>
            <th>Monthaly Salary</th>
            <td><input type="text" name="salary"  placeholder="Salary" required> </td>
        <tr>
        <tr>
            
            <th colspan="1">Job Description</th>
            <td colspan="3">
                
            <input type="text" name="description"   placeholder="Description" required> </td>
            
            
        <tr>

        <th>No. of Opening</th>
            <td><input type="number" name="opening"  placeholder="No. of opening" required> </td>
            
            <th>Post Image</th>
            <td><input type="file" name="company_file"    required> </td>
        <tr>
        <tr>
            <th>Experience</th>
            <td><input type="text" name="experience"   placeholder=" experience" required> </td>
            
            <th>work time</th>
            <td><input type="text" name="time" placeholder=" Work time"   required> </td>
        <tr>
        <tr>
            <?php  
             $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
             $sql="select * from category";
             $result=mysqli_query($con , $sql);
              mysqli_num_rows($result);
             if(mysqli_num_rows($result)>0){ ?>
            <th>Select Category</th>
            <td><Select name="category">
                <option selected disabled> Select Category</option>
            
            
                <?php while( $row=mysqli_fetch_assoc($result)){  ?>
            <option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?></option>

            <?php } ?>


                </select> </td>

            <?php }?>
           <?php $post_date=date("d-m-Y");?>
            <th>post Date</th>
            <td><input type="text"  value="<?php echo $post_date;?>" disabled required> </td>
        <tr>
        <th colspan="1">Short Location</th>
            <td colspan="3"><input type="text" name="location"   placeholder="Job Location" required> </td>
        <tr>
</tr>

        <tr>
            <th>Apply date</th>
            <td><input type="date" name="Apply_date"   placeholder="Apply date" required> </td>
            <th>Last date</th>
            <td><input type="date" name="Last_date"  placeholder="Last date" required> </td>
        <tr>
        <tr>
        

    </table>

                
                <input type="submit" name="submit" value="Post">
            </form>


            </div>
    </div>
    
    
    
</body>
</html>