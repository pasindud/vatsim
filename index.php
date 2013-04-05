<?php
/*
@Author Pasindu De Silva V1.1
Mess with these code and try adding new features :)

*/
include 'vatsim.php';

$obj=new Vatsim;


$client=$obj->clients();
if($_GET['format'])
$type=$_GET['format'];
if($_GET['data'])
$datatype=$_GET['data'];
if(isset($_GET['callback']))
$callback=$_GET['callback'];

if(!$_GET['format'])
$type="json";

if(isset($type) && isset($datatype)){

if($type=="json"){

header('Content-type: application/json');

if(isset($_GET['callback']))
echo "/**/ ".$callback."(";
echo '{"data": [';}
else{header('Content-type: text/xml');
print '<markers>';

}
for($i=1;$i<sizeof($client);$i++){
//for($i=1;$i<2;$i++){
 $callsign=$client[$i][$i][0];
 $cid=$client[$i][$i][1];
 $realname=$client[$i][$i][2];
 $clienttype=$client[$i][$i][3];
 $frequency=$client[$i][$i][4];
 $latitude=$client[$i][$i][5];
 $longitude=$client[$i][$i][6];
 $altitude=$client[$i][$i][7];
 $groundspeed=$client[$i][$i][8];
 $planned_aircraft=$client[$i][$i][9];
 $planned_tascruise=$client[$i][$i][10];
 $planned_depairport=$client[$i][$i][11];
 $planned_altitude=$client[$i][$i][12]; 
$planned_destairport=$client[$i][$i][13]; 
$server=$client[$i][$i][14]; 
$protrevision=$client[$i][$i][15]; 
$rating=$client[$i][$i][16]; 
$transponder=$client[$i][$i][17]; 
$facilitytype=$client[$i][$i][18]; 
$visualrange=$client[$i][$i][19]; 
$planned_revision=$client[$i][$i][20]; 
$planned_flighttype=$client[$i][$i][21]; 
$planned_deptime=$client[$i][$i][22]; 
$planned_actdeptime=$client[$i][$i][23]; 
$planned_hrsenroute=$client[$i][$i][24]; 
$planned_minenroute=$client[$i][$i][25]; 
$planned_hrsfuel=$client[$i][$i][26]; 
$planned_minfuel=$client[$i][$i][27]; 
$planned_altairport=$client[$i][$i][28]; 
$planned_remarks=$client[$i][$i][29]; 
$planned_route=$client[$i][$i][30]; 
$planned_depairport_lat=$client[$i][$i][31]; 
$planned_depairport_lon=$client[$i][$i][32]; 
$planned_destairport_lat=$client[$i][$i][33]; 
$planned_destairport_lon=$client[$i][$i][34]; 
$atis_message=$client[$i][$i][35]; 
$time_last_atis_received=$client[$i][$i][36]; 
$time_logon=$client[$i][$i][37]; 
$heading=$client[$i][$i][38]; 
$QNH_iHg=$client[$i][$i][39]; 
$QNH_Mb=$client[$i][$i][40]; 

if($type=="json"){

$doc=' 
{"callsign"  :"'. $callsign.'",
"cid"  :"'. $cid.'",
"realname"  :"'. $realname.'",
"clienttype"  :"'. $clienttype.'",
"frequency"  :"'. $frequency.'",
"latitude"  :"'. $latitude.'",
"longitude"  :"'. $longitude.'",
"altitude"  :"'. $altitude.'",
"groundspeed"  :"'. $groundspeed.'",
"planned_aircraft"  :"'. $planned_aircraft.'",
"planned_tascruise"  :"'. $planned_tascruise.'",
"planned_depairport"  :"'. $planned_depairport.'",
"planned_altitude"  :"'. $planned_altitude.'",
"planned_destairport"  :"'. $planned_destairport.'",
"server"  :"'. $server.'",
"protrevision"  :"'. $protrevision.'",
"rating"  :"'. $rating.'",
"transponder"  :"'. $transponder.'",
"facilitytype"  :"'. $facilitytype.'",
"visualrange"  :"'. $visualrange.'",
"planned_revision"  :"'. $planned_revision.'",
"planned_flighttype"  :"'. $planned_flighttype.'",
"planned_revision"  :"'. $planned_revision.'",
"planned_deptime"  :"'. $planned_deptime.'",
"planned_actdeptime"  :"'. $planned_actdeptime.'",
"planned_hrsenroute"  :"'. $planned_hrsenroute.'",
"planned_minenroute"  :"'. $planned_minenroute.'",
"planned_hrsfuel"  :"'. $planned_hrsfuel.'",
"planned_minfuel"  :"'. $planned_minfuel.'",
"planned_altairport"  :"'. $planned_altairport.'",
"planned_remarks"  :"abc",
"planned_route"  :"'. $planned_route.'",
"planned_depairport_lat"  :"'. $planned_depairport_lat.'",
"planned_depairport_lon"  :"'. $planned_depairport_lon.'",
"planned_destairport_lat"  :"'. $planned_destairport_lat.'",
"planned_destairport_lon"  :"'. $planned_destairport_lon.'",
"planned_destairport_lon"  :"'. $planned_destairport_lon.'",
"atis_message"  :"'. $atis_message.'",
"time_last_atis_received"  :"'. $time_last_atis_received.'",
"time_logon"  :"'. $time_logon.'",
"heading"  :"'. $heading.'",
"QNH_iHg"  :"'. $QNH_iHg.'",
"QNH_Mb"  :"'. $QNH_Mb.'"
}
';
if($i!=sizeof($client)-1)
	echo $doc.',';	
else
	echo $doc;	
}else{


	   
								  print '<marker ';
								 
print
'
callsign = " '. $callsign.' " 
cid =" '. $cid.' "
realname  =" '. $realname.' "
clienttype  ="'. $clienttype.' "
frequency  =" '. $frequency.' " latitude  ="  '. $latitude.' "
longitude  =" '. $longitude.' "
altitude  ="'. $altitude.' "
groundspeed  ="'. $groundspeed.' "
planned_aircraft  ="'. $planned_aircraft.'"
planned_tascruise  ="'. $planned_tascruise.'"
planned_depairport  ="'. $planned_depairport.'"
planned_altitude  ="'. $planned_altitude.'"
planned_destairport  ="'. $planned_destairport.'"
server  ="'. $server.'"
protrevision  ="'. $protrevision.'"
rating  ="'. $rating.'"
transponder  ="'. $transponder.'"
facilitytype  ="'. $facilitytype.'"
visualrange  ="'. $visualrange.'"
planned_revision  ="'. $planned_revision.'"
planned_flighttype  ="'. $planned_flighttype.'"
planned_deptime  ="'. $planned_deptime.'"
planned_actdeptime  ="'. $planned_actdeptime.'"
planned_hrsenroute  ="'. $planned_hrsenroute.'"
planned_minenroute  ="'. $planned_minenroute.'"
planned_hrsfuel  ="'. $planned_hrsfuel.'"
planned_minfuel  ="'. $planned_minfuel.'"
planned_altairport  ="'. $planned_altairport.'"
planned_route  ="'. $planned_route.'"
planned_depairport_lat  ="'. $planned_depairport_lat.'"
planned_depairport_lon  ="'. $planned_depairport_lon.'"
planned_destairport_lat  ="'. $planned_destairport_lat.'"
planned_destairport_lon  ="'. $planned_destairport_lon.'"
time_last_atis_received  ="'. $time_last_atis_received.'"
time_logon  ="'. $time_logon.'"
heading  ="'. $heading.'"
QNH_iHg  ="'. $QNH_iHg.'"
QNH_Mb  ="'. $QNH_Mb.'" />';


//planned_remarks  ="'. $planned_remarks.'" atis_message  ="'. $atis_message.'"
								  
								  
								  }


}


//$doc+=']}';
if($type=="json")
{
echo ']}';

if(isset($_GET['callback']))
{echo ");";
}
}else{
print '</markers>';}
}
else{

if(isset($_GET['callback']))
		//echo "<CallbackUrl>http://brendan-pc/demo/Callback.aspx</CallbackUrl>";
echo "Parameter data is missing";
}
//var_dump($obj->clients());

?>