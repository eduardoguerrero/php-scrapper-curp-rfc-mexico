### PHP - Getting CURP , RFC [México] and return JSON response with personal data.


- This personal data (JSON response) must be validated with RENAPO site, and should not therefore be considered as official.

- The PHP script is a simple Web scraping that request data to the page: http://www.ossc.com.mx/curp.php

- CURP(Unique Population Registry Code) for México.

- RFC(Federal Taxpayer Register) for México.


### Example index.php


```php
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

```
### Output

<a href="https://ibb.co/gDyBin"><img src="https://image.ibb.co/mrkrin/curp.jpg" alt="curp" border="0"></a>
