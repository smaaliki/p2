<?php
require 'helpers.php';
require 'systemUptimeLogic.php'
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
<!--We should think of adding a breadcrumb here so users can navigate easily within this module -->

<form id="systemUpTimeForm" method="post" action="">
    <fieldset>
        <legend class='calcTitle'>System Uptime</legend>

        <!--Todo: are we allowed to use the same label for multiple inputs?-->
        <label for="month">Select Month and Year:
            <select name="month">
                <option value='1' <?= ($month == '1') ? 'selected' : '' ?>>Jan</option>
                <option value='2' <?= ($month == '2') ? 'selected' : '' ?>>Feb</option>
                <option value='3' <?= ($month == '3') ? 'selected' : '' ?>>Mar</option>
                <option value='4' <?= ($month == '4') ? 'selected' : '' ?>>Apr</option>
                <option value='5' <?= ($month == '5') ? 'selected' : '' ?>>May</option>
                <option value='6' <?= ($month == '6') ? 'selected' : '' ?>>Jun</option>
                <option value='7' <?= ($month == '7') ? 'selected' : '' ?>>Jul</option>
                <option value='8' <?= ($month == '8') ? 'selected' : '' ?>>Aug</option>
                <option value='9' <?= ($month == '9') ? 'selected' : '' ?>>Sep</option>
                <option value='10' <?= ($month == '10') ? 'selected' : '' ?>>Oct</option>
                <option value='11' <?= ($month == '11') ? 'selected' : '' ?>>Nov</option>
                <option value='12' <?= ($month == '12') ? 'selected' : '' ?>>Dec</option>
            </select>
            <select name="year">
                <option value="2017" <?= ($year == '2017') ? 'selected' : '' ?>>2017</option>
                <option value="2018" <?= ($year == '2018') ? 'selected' : '' ?>>2018</option>
            </select>
        </label>
        <br>

        <label> Check if you have a 24/7 Operation
            <input type='checkbox' name='fullOperation' value='1' <?= ($fullOperation) ? 'checked' : '' ?>>
        </label>
        <br>

        <label for="weekDayHours">Work Hours per Week Day:
            <input type='range'
                   name="weekDayHours"
                   min='6'
                   value='<?= $weekDayHours ?>'
                   max='24'
                   step='1'
                   onchange="weekDayHoursOutput.value = this.value;">
            <output id="weekDayHoursOutput"><?= $weekDayHours ?></output>
        </label>
        <br>

        <label for="weekendWorkHours">Work Hours per Weekend Day:
            <input type='range'
                   name="weekendWorkHours"
                   min='6'
                   value='<?= $weekendHours ?>'
                   max='24'
                   step='1'
                   onchange="weekendWorkHoursOutput.value = this.value;">
            <output id="weekendWorkHoursOutput"><?= $weekendHours ?></output>
        </label>

        <br>

        <label for="workDays">Select below the days of the week that your contact center is open for business:<br>
            <input type="checkbox" name="workDays[]" value="sunday" checked> Sunday
            <input type="checkbox" name="workDays[]" value="monday" checked> Monday
            <input type="checkbox" name="workDays[]" value="tuesday" checked> Tuesday
            <input type="checkbox" name="workDays[]" value="wednesday" checked> Wednesday
            <input type="checkbox" name="workDays[]" value="thursday" checked> Thursday
            <input type="checkbox" name="workDays[]" value="friday"> Friday
            <input type="checkbox" name="workDays[]" value="saturday"> Saturday
        </label>
        <br>

        <label for="downTime">System Shutdown Time (hrs):
            <input type='text' name="downTime" value='<?= sanitize($downTime) ?>'>
        </label>
        <br>
        <br>
        <input class='button' type="submit" value="Submit"/>
    </fieldset>
</form>
<?php if ($form->hasErrors) : ?>
    <div class='alert alert-danger'>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li> <?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php else: ?>

    <?php if ($systemUpTime): ?>
        <p class='outMessage'>System Up Time for the month was: <?= $systemUpTime ?>%</p>
    <?php endif; ?>
<?php endif; ?>

<?php require('footer.php'); ?>

</body>
</html>