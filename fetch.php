<?php
//fetch.php
session_start();
$connect = mysqli_connect("localhost", "root", "", "mess");
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "SELECT * FROM users WHERE (username LIKE '%".$search."%'OR name LIKE '%".$search."%' OR rollno LIKE '%".$search."%') AND `status`='student'";
}
else
{
    $query = "SELECT * FROM users WHERE `status`='student'";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
    $output .= '
    <div class="table-responsive">
    <table class="table table bordered">
    <tr>
    <th>Registration ID</th>
    <th>Username</th>
    <th>Student Name</th>
    <th>Roll No.</th>
    <th>Subscribed Mess</th>
    <th></th>
    </tr>
    ';
    while($row = mysqli_fetch_array($result))
    {
    $output .= '
    <tr>
    <td>'.$row["id"].'</td>
    <td>'.$row["username"].'</td>
    <td>'.$row["name"].'</td>
    <td>'.$row["rollno"].'</td>
    <td>'.$row["mess"].'</td>
    <td><button type="button" name="delete_btn" id="'.$row["id"].'" class="btn btn-primary">DELETE</button></td>
    </tr>
    ';
    }
    echo $output;
}
else
{
    echo 'Data Not Found';
}
?>