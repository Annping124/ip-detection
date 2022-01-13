<?php
$msg = ""; 
$result = ""; 
$ip_addr = "";
if (isset($_POST["search"])) {
  $ip_addr = $_POST["ip_addr"];
  $ip = trim($ip_addr);
  if ( preg_match('/\s/',$ip) ){
  $msg = "<div class='alert alert-danger'>Hostname or IP is not valid</div>";
  }else{
  try{
  $url = "http://ip-api.com/json/" . $ip;// Posting data to api
  $content = file_get_contents($url); //Fetched data from api
  $json = json_decode($content); // decoding data to json
  }catch(err){
    $msg = "<div class='alert alert-danger'>Unable to connect to api </div>";//
  }
  if ($json->status == "fail") { //checking if domain or ip is valid this condition is for invalid
    $failmsg = ucfirst($json->message); 
    $msg = "<div class='alert alert-danger'>{$failmsg}</div>";
  } else {       //displaying Fetched data
    $result = '<div class="bg-light medium rounded p-3"> 
    <p class="small text-uppercase text-muted font-weight-semi-bold line-height-headings my-1">Location</p> 
    <div class="row">

    <div class="col-4 font-weight-bold ">Country</div>
    <div class="col-8">' . $json->country . ' (' . $json->countryCode . ')</div> 
    <div class="col-4">Region</div>
    <div class="col-8">' . $json->regionName . '</div>  
    <div class="col-4">City</div>
    <div class="col-8">' . $json->city . '</div> 
    <div class="col-4">Timezone</div>
    <div class="col-8"> ' . $json->timezone . ' </div>                                
    </div>
    <p class="small text-uppercase text-muted font-weight-semi-bold line-height-headings my-2">Network</p> 
    <div class="row">
    <div class="col-4">IP Adress</div>
    <div class="col-8">' . $json->query . '</div> 
    <div class="col-4">Organisation</div>
    <div class="col-8">' . $json->org . '</div> 
    <div class="col-4">Service Provider</div>
    <div class="col-8">' . $json->isp . '</div>   
    </div>
    <div class="row my-5"> 
        <iframe width="100%" height="500" src="https://maps.google.com/maps?q='.$json->lat.' , '.$json->lon.'&output=embed"></iframe>
    </div>'//Embedding map and passing lattitude and longitude as input for displaying location 
    ;
  }
}
  
}
?>