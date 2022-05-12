<?php

// Get CURP/RFC from http://www.ossc.com.mx/curp.php
include_once 'CurpRfcProperties.php';
include_once 'processRequest.php';

$person = new CurpRfcProperties();
$person
    ->setFirstName('LESLIE')
    ->setFirstSurname('NIELSEN')
    ->setSecondSurname('SMITH')
    ->setGender('Hombre')
    ->setEntity('DURANGO')
    ->setDateOfBirth(new \DateTime('1990-01-20'));
$request = new processRequest();
$result = $request->processRequestCurpRfc($person);

echo $result;
