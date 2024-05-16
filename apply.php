<?php 

session_start();
    $post_id=$_GET['id'];
    $student_id=$_SESSION['student_id'];

    $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
    $sql="SELECT * FROM vacancy 

    INNER JOIN category ON vacancy.vacancy_category_name=category.category_id
    INNER JOIN company ON vacancy.company_name = company.id 
    where post_id={$post_id}
";
$result= mysqli_query($con , $sql)or die("query failed");
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
       

   

    $company_id=$row['id'];
   $sql1="INSERT INTO applied_student(post_id_all,student_user,company_user)VALUES('{$post_id}','{$student_id}','{$company_id}');";
    $sql1.="UPDATE user SET applied_post=applied_post+1 WHERE stu_id='{$student_id}'";
 $sql1.="UPDATE vacancy SET applied_student=applied_student+1 WHERE company_name='{$company_id}'";
 $sql1.="UPDATE vacancy SET no_of_opening=no_of_opening-1 WHERE Post_id='{$post_id}'";
    
    


mysqli_multi_query($con , $sql1)or die(" failed");





}}
    ?>