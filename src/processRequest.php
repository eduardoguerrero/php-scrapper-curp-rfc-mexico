<?php

/**
 * Class processRequest
 * @author escobarguerrero@gmail.com
 */
class processRequest
{
    const URL_OSSC = "http://www.ossc.com.mx/curp.php";

    /**
     * @param CurpRfcProperties $person
     * @return array|false|string
     */
    public function processRequestCurpRfc(CurpRfcProperties $person)
    {
        $curl = curl_init();
        $date = $person->getDateOfBirth();
        curl_setopt_array($curl, [
            CURLOPT_URL => self::URL_OSSC,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $this->getFields($person, $date->format('d'), $date->format('m'), $date->format('Y')),
            CURLOPT_HTTPHEADER => array("Cache-Control: no-cache", "Content-Type: application/x-www-form-urlencoded"),
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        if ($err) {
            return ['error' => $err];
        }
        $html = html_entity_decode($response);
        curl_close($curl);
        $doc = new \DOMDocument();
        $doc->loadHTML($html);
        $xpath = new \DOMXPath($doc);
        $sData = $xpath->query('//font');
        if (count($sData) === 0) {
            return ['error' => "Service Unavailable"];
        }
        $aTempData = [];
        $iCounter = 0;
        foreach ($sData as $sItem) {
            if (0 !== $iCounter) {
                $aTempData[] = str_replace(":", "", trim($sItem->nodeValue));
            }
            $iCounter++;
        }
        $items = $this->getData($aTempData);

        return $this->getResponse($person, $items);
    }

    /**
     * @param CurpRfcProperties $person
     * @param $day
     * @param $month
     * @param $year
     * @return string
     */
    public function getFields(CurpRfcProperties $person, $day, $month, $year)
    {
        return "paterno={$person->getFirstSurname()}&materno={$person->getSecondSurname()}&nombre={$person->getFirstName()}&dia={$day}&mes={$month}&anio={$year}&entidad={$person->getEntityIdentifier()}&sexo={$person->getGenderIdentifier()}&Submit=";
    }

    /**
     * @param array $items
     * @return array
     */
    public function getData(array $items)
    {
        $result = [];
        $countData = count($items);
        for ($i = 0; $i < $countData; $i += 2) {
            $result[] = array($items[$i] => $items[$i + 1]);
        }

        return $result;
    }

    /**
     * @param CurpRfcProperties $person
     * @param $items
     * @return false|string
     */
    public function getResponse(CurpRfcProperties $person, $items)
    {
        $rfc = isset($items[0]) ? $items[0]['RFC'] : null;
        $curp = isset($items[0]) ? $items[1]['CURP'] : null;
        $response = [
            'full_name' => $person->getFullName(),
            'rfc' => $rfc,
            'curp' => $curp,
            'day_of_birth'      => date_format($person->getDateOfBirth(), 'Y-m-d'),
            'entity_identifier' => $person->getEntityIdentifier(),
            'entity_name'       => $person->getEntityName(),
            'entity_list'       => [array_flip($person->getEntityList())],
            'gender_identifier' => $person->getGenderIdentifier(),
            'gender_name'       => $person->getGenderName(),
            'gender_list'       => [array_flip($person->genderList())]
        ];

        return json_encode($response);
    }
}
