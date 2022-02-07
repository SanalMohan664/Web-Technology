<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form</title>
</head>
<body>
    <center>
        <h2>Employee Details</h2>
    
        <form name="form" action="#" method="POST">
        <table>
            <tr>
                <th>Employee ID</th>
                <td><input type="text" name="employ_id"> </td>
            </tr>
            <tr>
                <th>Employee Name</th>
                <td><input type="text" name="employ_name"> </td>
            </tr>
            <tr>
                <th>Job name</th>
                <td><input type="text" name="job_name"> </td>
            </tr>
            <tr>
                <th>Manager ID</th>
                <td><input type="text" name="manager_id"> </td>
            </tr>
            <tr>
                <th>Salary</th>
                <td><input type="number" name="salary"> </td>
            </tr>
            <tr class="center">
                <th colspan="2"><input type="submit" value="submit" name="submit"></th>
            </tr>
        </table>
    </form>
    </center>
    <table border="1">




<?php
 define('LOCALHOST','localhost');
 define('DB_USERNAME','root');
 define('DB_PASSWORD','');
 define('DB_NAME','employee');

if(isset($_POST['submit']))
{
    $emp_id=$_POST['employ_id'];
    $emp_name=$_POST['employ_name'];
    $job_name=$_POST['job_name'];
    $manager_id=$_POST['manager_id'];
    $salary=$_POST['salary'];
    $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
    $db_select=mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
    $query="INSERT INTO employee_details(emp_id,emp_name,job_name,manager_id,salary)VALUES('{$emp_id}','{$emp_name}','{$job_name}','{$manager_id}','{$salary}')";
    $res=mysqli_query($conn,$query);
    if($res==true)
    {   
        echo "Data inserted Sucessfully";
        echo "<br>";
    }
    else
    {
    echo("insertion failed");
    }
}
?>

<table border="10" align="center">
    <tr>
    <th>Employee Name</th>
    <th>Salary</th>
    </tr>
<?php
    $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
    $db_select=mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
    $sql="SELECT emp_name,salary FROM employee_details WHERE salary>35000";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res))
    {
    ?>
    <tr>
    <td><?php echo $row['emp_name'];?></td>
    <td><?php echo $row['salary'];?></td>
    </tr>
    <?php


   }
?>
</table>
</body>
</html>

    