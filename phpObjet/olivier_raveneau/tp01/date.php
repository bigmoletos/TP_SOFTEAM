<?php
define("NB_SEC_BY_DAY", 86400); // 60*60*24
define("NB_SEC_BY_HOUR", 3600); // 60*60

function deltaDay($start, $end)
{
	$from = strtotime($start);
	$to = strtotime($end);

	$delta = $to-$from;
	$nbDay = (int) ($delta / NB_SEC_BY_DAY);
	$nbHourInSec = $delta % NB_SEC_BY_DAY;
	$nbHour = (int) ($nbHourInSec / NB_SEC_BY_HOUR);
	$nbMinuteInSec = $nbHourInSec % NB_SEC_BY_HOUR;
	$nbMin = (int ) ($nbMinuteInSec / 60);
	$nbSec = $nbMinuteInSec % 60;

	$out = "";
	$out .= $nbDay;
	$out .= ($nbDay >= 1) ? " jours " : " jour ";
	$out .= $nbHour;
	$out .= ($nbHour >= 1) ? " heures " : " heure ";
	$out .= $nbMin;
	$out .= ($nbMin >= 1) ? " minutes " : " minute ";
	$out .= $nbSec;
	$out .= ($nbSec >= 1) ? " secondes " : " seconde ";

	return $out;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - Date</title>
	<meta charset="utf-8">
</head>
<body>
<p>
<?php echo deltaDay('now', '2018-06-21'); ?>
</p>
<p>
<?php echo deltaDay('2017-09-08', 'now'); ?>
</p>
</body>
</html>