### Consultar CURP y RFC [México] y retornar una respuesta JSON con la informacion de la persona.


-Esta informacion deberia ser validada en RENAPO, por lo que no debe considerarse como un dato oficial. 

-El script PHP toma la informacion de la persona de la pagina: http://www.ossc.com.mx/curp.php


###index.php
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
###Respuesta
<a href="https://ibb.co/gDyBin"><img src="https://image.ibb.co/mrkrin/curp.jpg" alt="curp" border="0"></a>
