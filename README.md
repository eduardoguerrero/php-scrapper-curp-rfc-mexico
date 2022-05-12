### PHP - Getting CURP and RFC [ México ]


- This personal data (JSON response) must be validated with RENAPO site and should not therefore be considered as official.

- This PHP script is a simple Web scraping that request data to the page: http://www.ossc.com.mx/curp.php


### Example

You can execute the example by typing following into your local shell

```bash
❯ php src/index.php
```


```php
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

```
### Output

<a href="https://ibb.co/gDyBin"><img src="https://image.ibb.co/mrkrin/curp.jpg" alt="curp" border="0"></a>


Feel free to fork it or do whatever you want with it.

License: https://creativecommons.org/licenses/by/3.0/

**Edit 2022: It does not work anymore (the resource http://www.ossc.com.mx/curp.php is not available)**
