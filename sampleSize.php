<?php
require 'helpers.php';
require 'sampleSizeLogic.php'
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
<form id='systemUpTimeForm' method='get' action='sampleSize.php'>
    <fieldset>
        <legend class='calcTitle'>Sample Size</legend>

        <label for='numCalls'>Number of Contacts
            <input type='text' id='numCalls' name='numCalls' value='<?= sanitize($numCalls) ?>'>
        </label>
        <br>

        <p>Confidence Level<br>
            <input type='radio' name='confLevel' value='1' <?= ($confLevel == 1) ? 'checked' : '' ?>> 80%
            <input type='radio' name='confLevel' value='2' <?= ($confLevel == 2) ? 'checked' : '' ?>> 85%
            <input type='radio' name='confLevel' value='3' <?= ($confLevel == 3) ? 'checked' : '' ?>> 90%
            <input type='radio' name='confLevel' value='4' <?= ($confLevel == 4) ? 'checked' : '' ?>> 95%
            <input type='radio' name='confLevel' value='5' <?= ($confLevel == 5) ? 'checked' : '' ?>> 99%
        </p>

        <label for='errorMargin'>Margin of Error (%)
            <input type='text' id='errorMargin' name='errorMargin' value='<?= sanitize($errorMargin) ?>'>
        </label>
        <br>

        <input class='button' type='submit' value='Submit'/>
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

    <?php if ($sampleSize): ?>
        <p class='outMessage'>For a contact volume of <?= sanitize($numCalls) ?>, your survey sample size should be <?= $sampleSize ?>.</p>
    <?php endif; ?>
<?php endif; ?>

<?php require('footer.php'); ?>

</body>
</html>