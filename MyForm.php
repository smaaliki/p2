<?php
# Filename: MyForm.php

namespace CCCALC;

use DWA\Form;

class MyForm extends Form
{
    protected function notEmpty($value)
    {
        if(count($value) == 0) {
            return false;
        }
        else {
            return true;
        }
    }
}