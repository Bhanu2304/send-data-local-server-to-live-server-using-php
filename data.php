<?php  require 'connection.php';
$ch = curl_init();

$url = "http://localhost/send_data/index.php";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($ch);

if($e = curl_error($ch)){
    echo $e;
}
else {

    $d = json_decode($resp, true);
    //print_r($d['status']);die;
    if($d['status'] == 'false'){
      echo 'No Record Found';
      error_reporting(0);
    }
    else{
    $count_arr = count($d['data']);
    
    for($i=0; $i < $count_arr; $i++) {

      $insert = "INSERT INTO ivr_log(id,client_id,did_no,call_type,uniqueid,from_source,start_time,end_time,duration,outcome,opt,created_at,upd) VALUES(".$d['data'][$i]['id'].",'".$d['data'][$i]['client_id']."','".$d['data'][$i]['did_no']."',
      '".$d['data'][$i]['call_type']."','".$d['data'][$i]['uniqueid']."','".$d['data'][$i]['from_source']."',
      '".$d['data'][$i]['start_time']."','".$d['data'][$i]['end_time']."','".$d['data'][$i]['duration']."',
      '".$d['data'][$i]['outcome']."','".$d['data'][$i]['opt']."','".$d['data'][$i]['created_at']."','".$d['data'][$i]['upd']."')";

      //$sql = "UPDATE ivr_log SET upd ='0'  WHERE id='".$d['data'][$i]['id']."'";
      //$sql = "INSERT INTO ivr_log(id,client_id,did_no,call_type,uniqueid,from_source,start_time,end_time,duration,outcome,opt,created_at,upd) VALUES(".$data[$a]['id'].",'".$data[$a]['client_id']."','".$data[$a]['did_no']."','".$data[$a]['call_type']."','".$data[$a]['uniqueid']."','".$data[$a]['from_source']."','".$data[$a]['start_time']."','".$data[$a]['end_time']."','".$data[$a]['duration']."','".$data[$a]['outcome']."','".$data[$a]['opt']."','".$data[$a]['created_at']."',".$upd.")";
      if($insert){

        $update = "UPDATE ivr_log SET upd ='0'  WHERE id='".$d['data'][$i]['id']."'";
        $updt_supreme = mysqli_query($supreme, $update);
 
      }else{

        echo "not insert";

      }
      $ins_dialdesk = mysqli_query($dialdesk, $insert);
  
    }

      if($ins_dialdesk) {
        echo "Records update successfully";
      } else {
        echo "Error: " . $insert . "<br>" . mysqli_error($dialdesk);
      }                                                                                                                                                                                         
      


       }
      }

curl_close($ch);

?>
