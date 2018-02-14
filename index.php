<!-- Todo:
Validation
Limit input types
Calculations and feedback
Style
-->

<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Contact Center Calculators</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>

<h1>Contact Center Calculator</h1>

<form id="myForm" method="post" action="">
    <fieldset>
        <legend>QA Personnel Calculator</legend>
        <p>
            <label for="agentsnum">Number of Agents</label><br/>
            <input id="agentsnum" name="agentsnum" size="25"/>
        </p>
        <p>
            <!--Note: Make this a drop down list-->
            <label for="daysinmonth">Days in month</label><br/>
            <input id="daysinmonth" name="daysinmonth" size="25"/>
        </p>
        <p>
            <!--Note: Make this checkboxes-->
            Select the Work Days:<br>
            <input type="checkbox" name="workdays" value="monday"> Monday
            <input type="checkbox" name="workdays" value="tuesday"> Tuesday
            <input type="checkbox" name="workdays" value="wednesday"> Wednesday
            <input type="checkbox" name="workdays" value="thursday"> Thursday
            <input type="checkbox" name="workdays" value="friday"> Friday
            <input type="checkbox" name="workdays" value="saturday"> Saturday
            <input type="checkbox" name="workdays" value="sunday"> Sunday
        </p>
        <p>
            <!--Note: Make this a drop down list-->
            <label for="workhours">Work Hours</label><br/>
            <input id="workhours" name="workhours"  rows="5" cols="50"></textarea>
        </p>

        <p>
            <label for="avghandletime">Average Handle Time (minutes)</label><br/>
            <input id="avghandletime" name="avghandletime" size="25"/>
        </p>

        <p>
            <input class="submit" type="submit" value="Submit"/>
        </p>
    </fieldset>
</form>
</body>
</html>