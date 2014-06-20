<?php 
//funcion time ago 
 function time_stamp($time_ago) 
{ 
$cur_time=time(); 
$time_elapsed = $cur_time - $time_ago; 
$seconds = $time_elapsed ; 
$minutes = round($time_elapsed / 60 ); 
$hours = round($time_elapsed / 3600); 
$days = round($time_elapsed / 86400 ); 
$weeks = round($time_elapsed / 604800); 
$months = round($time_elapsed / 2600640 ); 
$years = round($time_elapsed / 31207680 ); 
//Segundos 
if($seconds <= 60) 
{ 
echo "hace $seconds segundos"; 
} 
//Minutos 
else if($minutes <=60) 
{ 
if($minutes==1) 
{ 
echo "hace 1 minuto"; 
} 
else 
{ 
echo "hace $minutes minutos"; 
} 
} 
//Horas 
else if($hours <=24) 
{ 
if($hours==1) 
{ 
echo "hace una hora"; 
} 
else 
{ 
echo "hace $hours horas"; 
} 
} 
//Dias 
else if($days <= 7) 
{ 
if($days==1) 
{ 
echo "ayer"; 
} 
else 
{ 
echo "hace $days días"; 
} 
} 
//Semanas 
else if($weeks <= 4.3) 
{ 
if($weeks==1) 
{ 
echo "hace una semana"; 
} 
else 
{ 
echo "hace $weeks semanas"; 
} 
} 
//Meses 
else if($months <=12) 
{ 
if($months==1) 
{ 
echo "hace un mes"; 
} 
else 
{ 
echo "hace $months meses"; 
} 
} 
//Años 
else 
{ 
if($years==1) 
{ 
echo "hace un año"; 
} 
else 
{ 
echo "hace $years años"; 
} 
} 
} 
?> 