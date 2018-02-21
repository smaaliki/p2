<?php
//require 'helpers.php';
//require('systemUptime.php');
//require('sampleSize.php');
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Contact Center Calculators</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<?php require('header.php'); ?>
<h1>Contact Center Calculators</h1>

<p> Below is a list of calculators that you can use to calculate some of the KPIs that are part of the Government of Dubai Contact Centre Standards.</p>
<ul>
    <li><a href='sampleSize.php'>Sample Size</a></li>
    <li><a href='systemUptime.php'>System Uptime</a></li>
</ul>
<?php require('footer.php'); ?>
</body>
</html>