<?php 
$time = 1.00;
echo sprintf('%02d:%02d', (int) $time, fmod($time, 1) * 60);
?>