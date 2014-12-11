<?php

namespace Module;

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
            echo json_encode(['result' => true]) . PHP_EOL;
        }
        else {
            echo json_encode(['result' => false]) . PHP_EOL;
        }
        return;
    }
}