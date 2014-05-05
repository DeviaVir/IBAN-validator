<?php

namespace Module\Cli\Controller;

use IBAN\Validation\IBANValidator;
use IBAN\Generation\IBANGenerator;
use IBAN\Rule\RuleFactory;
use IBAN\Generation\IBANGeneratorNL;

class IBAN extends Controller
{
    /**
     *
     */
    public function validate($iban)
    {
    	$ibanValidator = new IBANValidator();
		if ($ibanValidator->validate($iban)) {
		    echo $iban . " is valid!";
		}
    }
}