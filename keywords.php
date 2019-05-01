<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "mess");
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "SELECT * FROM words WHERE word LIKE '%".$search."%'";
}
else
{
    $query = "SELECT * FROM words";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
    $output .= '
    <div class="table-responsive">
	<table class="table table-bordered table-sm col-lg-10 offset-lg-1 table-hover" style="table-layout: auto;">
	<thead>
    <tr class="table-secondary">
    <th>Keyword</th>
    <th>Rating</th>
    <th style="width: 1px;white-space: nowrap;">Remove Keyword</th>
	</tr>
	</thead>
	<tbody>
    ';
    while($row = mysqli_fetch_array($result))
    {
	$output .= '
    <tr>
    <td class="word" data-id1="'.$row["id"].'">'.$row["word"].'</td>
    <td class="rating" data-id2="'.$row["id"].'">'.$row["rating"].'</td>
    <td class="text-center px-0" ><button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-primary btn_delete button-xs px-3 py-1 mx-1">Remove</button></td>
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