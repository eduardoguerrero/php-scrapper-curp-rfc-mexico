<?php

/**
 * Get CURP/RFC from http://www.ossc.com.mx/curp.php
 * 
 */

include_once 'CurpRfcProperties.php';

include_once 'processRequest.php';

$person = new CurpRfcProperties();

$person->setFirstName('LESLIE');

$person->setFirstSurname('NIELSEN');

$person->setSecondSurname('SMITH');

$person->setGender('Hombre');

$person->setEntity('DURANGO');

$person->setDateOfBirth(new \DateTime('1990-01-20'));

$getPerson = new processRequest();

$result = $getPerson->processRequestCurpRfc($person);

echo $result;
