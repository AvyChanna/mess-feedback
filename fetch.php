<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "mess");
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "SELECT * FROM users WHERE (username LIKE '%".$search."%'OR name LIKE '%".$search."%' OR rollno LIKE '%".$search."%' OR mess LIKE '%".$search."%') AND `status`='student'";
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
	<table class="table table-bordered table-sm col-lg-10 offset-lg-1 table-hover" style="table-layout: auto;">
	<thead>
    <tr class="table-secondary">
    <th style="width: 1px;white-space: nowrap;">Registration ID</th>
    <th>Username</th>
    <th>Student Name</th>
    <th>Roll No.</th>
    <th>Subscribed Mess</th>
    <th style="width: 1px;white-space: nowrap;">Remove Student</th>
	</tr>
	</thead>
	<tbody>
    ';
    while($row = mysqli_fetch_array($result))
    {
	$output .= '
    <tr>
    <td >'.$row["id"].'</td>
    <td class="username" data-id1="'.$row["id"].'">'.$row["username"].'</td>
    <td class="name" data-id2="'.$row["id"].'">'.$row["name"].'</td>
    <td class="rollno" data-id3="'.$row["id"].'">'.$row["rollno"].'</td>
    <td class="mess" data-id4="'.$row["id"].'">'.$row["mess"].'</td>
    <td class="text-center px-0" ><button type="button" name="delete_btn" data-id5="'.$row["id"].'" class="btn btn-primary btn_delete button-xs px-3 py-1 mx-1">REMOVE</button></td>
    </tr>
    ';
    }
    $output .='</tbody></table></div>';
    echo $output;
}
else
{
    echo '<div class="text-center text-danger mx-auto">Data Not Found</div>';
}
?>