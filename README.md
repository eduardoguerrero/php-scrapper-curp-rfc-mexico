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
### Outputs

```json
{
        "full_name": "LESLIE NIELSEN SMITH",
        "rfc": "NISL900120267",
        "curp": "NISL900120HDGLMS01",
        "day_of_birth": "1990-01-20",
        "entity_identifier": "DG",
        "entity_name": "DURANGO",
        "entity_list": [
        {
            "AS": "AGUASCALIENTES",
            "BC": "BAJA CALIFORNIA",
            "BS": "BAJA CALIF. SUR",
            "CC": "CAMPECHE",
            "CS": "CHIAPAS",
            "CH": "CHIHUHUA",
            "CL": "COAHUILA",
            "CM": "COLIMA",
            "DF": "DISTRITO FEDERAL",
            "DG": "DURANGO",
            "GT": "GUANAJUATO",
            "GR": "GUERRERO",
            "HG": "HIDALGO",
            "JC": "JALISCO",
            "MN": "MICHOACAN",
            "MS": "MORELOS",
            "NT": "NAYARIT",
            "NL": "NUEVO LEON",
            "OC": "OAXACA",
            "PL": "PUEBLA",
            "QT": "QUERETARO",
            "QR": "QUINTANA ROO",
            "SP": "SAN LUIS POTOSI",
            "SL": "SINALOA",
            "SR": "SONORA",
            "TC": "TABASCO",
            "TS": "TAMAULIPAS",
            "TL": "TLAXCALA",
            "VZ": "VERACRUZ",
            "YN": "YUCATAN",
            "ZS": "ZACATECAS"
        }],
        "gender_identifier": "H",
        "gender_name": "Hombre",
        "gender_list": [{
            "H": "Hombre",
            "M": "Mujer"
        }
    ]
}

```

```php
Array
(
    [error] => Service Unavailable
)
```


Feel free to fork it or do whatever you want with it.

License: https://creativecommons.org/licenses/by/3.0/

**Edit 2022: I had a look to the resource http://www.ossc.com.mx/curp.php but is not available anymore **
