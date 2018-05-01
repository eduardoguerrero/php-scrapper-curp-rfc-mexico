<?php

/**
 * Description of processRequest
 *
 * @author rene.escobar0
 */
class processRequest 
{

    /**
     * @param   object    $oPerson     Person information       
     * @return  array    
     */
    public function processRequestCurpRfc($oPerson) 
    {
        $curl = curl_init();
        $date = $oPerson->getDateOfBirth();
        $sDay = $date->format('d');
        $sMonth = $date->format('m');
        $sYear = $date->format('Y');
        $sUrl = "http://www.ossc.com.mx/curp.php";
        $sFields = "paterno={$oPerson->getFirstSurname()}&materno={$oPerson->getSecondSurname()}&nombre={$oPerson->getFirstName()}&dia={$sDay}&mes={$sMonth}&anio={$sYear}&entidad={$oPerson->getEntityIdentifier()}&sexo={$oPerson->getGenderIdentifier()}&Submit=";
        curl_setopt_array($curl, array
        (
            CURLOPT_URL => $sUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $sFields,
            CURLOPT_HTTPHEADER => array("Cache-Control: no-cache", "Content-Type: application/x-www-form-urlencoded"),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        if ($err) 
        {
            return array('status' => 'error', 'message' => $err);
        } 
            else
        {
            $html = html_entity_decode($response);
            curl_close($curl);
            $doc = new \DOMDocument();
            $doc->loadHTML($html);
            $xpath = new \DOMXPath($doc);
            $sData = $xpath->query('//font');
            $aTempData = array();
            $iCounter = 0;
            foreach ($sData as $sItem)
            {
                if ($iCounter != 0)
                {
                    $aTempData[] = str_replace(":", "", trim($sItem->nodeValue));
                }
                $iCounter++;
            }
            for ($i = 0; $i < count($aTempData); $i = $i + 2)
            {
                $aResult[] = array($aTempData[$i] => $aTempData[$i + 1]);
            }            
            $aResponse = array
            (
                'Full_name'=>$oPerson->getFullName(),
                'RFC'=>$aResult[0]['RFC'],
                'CURP'=>$aResult[1]['CURP'],
                'Day_Of_Birth'=> date_format($oPerson->getDateOfBirth(),'Y-m-d'),
                'Entity_identifier'=>$oPerson->getEntityIdentifier(),
                'Entity_name'=>$oPerson->getEntityName(),
                'Gender_identifier'=>$oPerson->getGenderIdentifier(),
                'Gender_name'=>$oPerson->getGenderName(),
                'Entity_list'=>array
                (
                    array_flip($oPerson->getEntityList())
                ),
                'Gender_list'=>array
                (
                    array_flip($oPerson->genderList())
                )
            );           
            return json_encode($aResponse);
        }
    }

}
