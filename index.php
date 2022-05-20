<?php require 'connection.php';

$sql="select * from ivr_log where upd='1'";

$res= mysqli_query($supreme,$sql);

$count=mysqli_num_rows($res);

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');


if($count > 0)
{
    while($row=mysqli_fetch_assoc($res))
    {
        $arr[]=$row;
        
    }
    
     echo json_encode(['status'=>'true','data'=>$arr]);
}
else
{
    // echo "No Data Found";
     echo json_encode(['status'=>'false','data'=>'No Data Found','found'=>'not found']);
}



?>

