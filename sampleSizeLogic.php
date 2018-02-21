<?php

require('Form.php');
require('MyForm.php');

#use DWA\Form;
use CCCALC\MyForm;

//dump($_GET);
$form = new MyForm($_GET);

$numCalls = isset($_GET['numCalls']) ? $_GET['numCalls'] : '';
$confLevel = isset($_GET['confLevel']) ? $_GET['confLevel'] : '4';
$errorMargin = isset($_GET['errorMargin']) ? $_GET['errorMargin'] : '';
$sampleSize = '';

if ($form->isSubmitted()) {
    $errors = $form->validate(
        [
            'numCalls' => 'required|numeric',
            'errorMargin' => 'required|numeric|min:0|max:6'
        ]
    );

    if (!$form->hasErrors) {
        if ($confLevel == 1) {
            $zScore = 1.28;
        } else if ($confLevel == 2) {
            $zScore = 1.44;
        } else if ($confLevel == 3) {
            $zScore = 1.65;
        } else if ($confLevel == 4) {
            $zScore = 1.96;
        } else if ($confLevel == 5) {
            $zScore = 2.58 * 2.58;
        }

        $sampleSize = 0.25 / ((($errorMargin / 100) / $zScore) * (($errorMargin / 100) / $zScore));
        $sampleSize = round(($sampleSize * $numCalls) / ($sampleSize + $numCalls - 1));
    }
}