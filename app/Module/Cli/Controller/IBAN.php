<?php

namespace Module\Cli\Controller;
use IBAN\Validation\IBANValidator;

class IBAN
{
    /**
     * Implementation of IBAN validation
     * @param  string $iban 
     * @return string       json
     */
    public function validate($iban)
    {
        $ibanValidator = new IBANValidator();
        if ($ibanValidator->validate($iban)) {
            return json_encode(['result' => true]);
        }
        else {
            return json_encode(['result' => false]);
        }
    }
}