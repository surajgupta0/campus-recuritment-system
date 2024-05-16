<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/applied_company_details.css">
</head>
<body>
    <div class="body">
    <?php
    include "header.php";?>
    <?php $main_id=$_GET['id'];
    $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");

    $sql="SELECT * FROM applied_student
    INNER JOIN company ON applied_student.company_user = company.id 
    INNER JOIN user ON applied_student.student_user=user.stu_id
    INNER JOIN vacancy ON applied_student.post_id_all=vacancy.Post_id
    INNER JOIN category ON applied_student.category_id_all=category.category_id
    
    WHERE main_id={$main_id} 
    
    
    
    ";
    $result= mysqli_query($con , $sql)or die("query failed");
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){

    ?>
    
    <table width="80%" align="center" border="1px solid black" cellspacing="0">
    <thead>
            
            <th colspan="4"><h2><?php echo $row['name']?></h2></th> 
 
        </thead>
        <tr>
            <th>Job title</th> 
            <td><?php echo $row['Post_title']?></td> 
            <th>Company Name</th> 
            <td><?php echo $row['name']?></td>  
        </tr>
        <tr>
            <th colspan="1">Job description</th>
            <td colspan="3"><?php echo $row['job_description']?></td>
        </tr>
        <tr>
            <th>Job location</th> 
            <td><?php echo $row['job_location']?></td> 
            <th>Job time</th> 
            <td><?php echo $row['time']?></td>  
        </tr>
        <tr>
            <th> Company Address</th> 
            <td><?php echo $row['address']?></td> 
            <th>category</th> 
            <td><?php echo $row['category_name']?></td>  
        </tr>
        <tr>
            <th>Apply date</th> 
            <td><?php echo $row['apply_date']?></td> 
            <th>Last Date</th> 
            <td><?php echo $row['last_date']?></td>  
        </tr>
        <tr>
            <th>Post date</th> 
            <td><?php echo $row['post_date']?></td> 
            <th>Salary</th> 
            <td><?php echo $row['monthly_salary']?></td>  
        </tr>
        <tr>
            <th>Company Email</th> 
            <td><?php echo $row['email']?></td> 
            <th>Company_no.</th> 
            <td><?php echo $row['number']?></td>  
        </tr>
        <tr>
            <th>Company URL</th> 
            <td><?php echo $row['url']?></td> 
            <th>no. of opening</th> 
            <td><?php echo $row['no_of_opening']?></td>  
        </tr>
        <tr>
            <th>Student Id</th> 
            <td><?php echo $row['stu_id']?></td> 
            <th>Student Name</th> 
            <td><?php echo $row['student_name']?></td>  
        </tr>
        <tr>
            <th>Student Username</th> 
            <td><?php echo $row['username']?></td> 
            <th>Student Email</th> 
            <td><?php echo $row['student_email']?></td>  
        </tr>
        <tr>
            <th>Student Phone number</th> 
            <td><?php echo $row['phone_number']?></td> 
            <th>Apply date</th> 
            <td><?php echo $row['apply_post_date']?></td> 
        </tr>

        <th colspan="1">Student Address</th> 
            <td colspan="3"><?php echo $row['student_address']?></td>  
        <tr>
            <th>Student Resume</th> 
            <td class="download"><a href="upload/<?php echo $row['resume']?>"><i class="fa-solid fa-download"></i>Download</a></td> 
            <th>Student gender</th> 
            <td><?php echo $row['gender']?></td>  
        </tr>
        <tr>
            <th>Status</th> 
            <td><?php echo $row['status']?></td> 
            <th>Message</th> 
            <td><?php echo $row['message']?></td>  
        </tr>

        
    </table>
    <div class="action_container">
    <a href="action.php?id=<?php echo $row['main_id']?>" class="action"> Action</a>
        </div>

<?php } }?>
        </div>

</body>
</html>