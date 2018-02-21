<?php

require('Form.php');
require('MyForm.php');

#use DWA\Form;
use CCCALC\MyForm;

$form = new MyForm($_POST);

$fullOperation = $form->has('fullOperation');
$month = isset($_POST['month']) ? $_POST['month'] : '1';
$year = isset($_POST['year']) ? $_POST['year'] : '2018';
$weekDayHours = isset($_POST['weekDayHours']) ? $_POST['weekDayHours'] : '8';
$weekendHours = isset($_POST['weekendWorkHours']) ? $_POST['weekendWorkHours'] : '8';
$workDays = isset($_POST['workDays']) ? $_POST['workDays'] : '';
$downTime = isset($_POST['downTime']) ? $_POST['downTime'] : '';
$systemUpTime = '';

if ($form->isSubmitted()) {
    $errors = $form->validate(
        [
            'workDays' => 'notEmpty',
            'downTime' => 'required|numeric'
        ]
    );

    if (!$form->hasErrors) {
        #Figure out how many days there are in the month
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        #Calculate the System Uptime
        if ($downTime == "0") {
            $systemUpTime = '100';
        } else if ($fullOperation == true) {
            $systemUpTime = !empty($_POST['downTime']) ? round(100 * (1 - ($downTime / ($daysInMonth * 24)))) : '';
        } else {
            #Figure out how many weekdays there are in the month (i.e. how many, Sundays, Mondays, etc.)
            #Note: The following sets the time zone to Dubai.  We might want to consider opening this up
            #to other regions by letting users select the targeted timezone.
            date_default_timezone_set('Asia/Dubai');
            $firstDate = mktime(0, 0, 0, $month, 1, $year);
            $lastDate = mktime(0, 0, 0, $month, $daysInMonth, $year);

            $sundays = $mondays = $tuesdays = $wednesdays = $thursdays = $fridays = $saturdays = 0;

            for ($i = $firstDate; $i <= $lastDate; $i = $i + (24 * 3600)) {
                if (date("D", $i) == "Sun")
                    $sundays++;
                else if (date("D", $i) == "Mon")
                    $mondays++;
                else if (date("D", $i) == "Tue")
                    $tuesdays++;
                else if (date("D", $i) == "Wed")
                    $wednesdays++;
                else if (date("D", $i) == "Thu")
                    $thursdays++;
                else if (date("D", $i) == "Fri")
                    $fridays++;
                else if (date("D", $i) == "Sat")
                    $saturdays++;
            }

            $nonWorkingDays = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];

            foreach ($workDays as $index => $dayString) {
                for ($i = 0; $i < count($nonWorkingDays); $i++) {
                    $match = $dayString == $nonWorkingDays[$index];

                    if ($match) {
                        unset($nonWorkingDays[$index]);
                        break;
                    }
                }
            }

            foreach ($nonWorkingDays as $i => $dayString) {
                if ($nonWorkingDays[$i] == 'sunday') {
                    $sundays = 0;
                } else if ($nonWorkingDays[$i] == 'monday') {
                    $mondays = 0;
                } else if ($nonWorkingDays[$i] == 'tuesday') {
                    $tuesdays = 0;
                } else if ($nonWorkingDays[$i] == 'wednesday') {
                    $wednesdays = 0;
                } else if ($nonWorkingDays[$i] == 'thursday') {
                    $thursdays = 0;
                } else if ($nonWorkingDays[$i] == 'friday') {
                    $fridays = 0;
                } else if ($nonWorkingDays[$i] == 'saturday') {
                    $saturdays = 0;
                }
            }
            $systemUpTime = round(100 * (1 - $downTime / (($weekDayHours * ($sundays + $mondays + $tuesdays + $wednesdays + $thursdays)) + ($weekendHours * ($fridays + $saturdays)))));
        }
    }
}