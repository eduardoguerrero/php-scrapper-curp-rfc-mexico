<?php

error_reporting(E_ERROR | E_PARSE);

/**
 * CurpRfcProperties
 *
 * @author rene.escobar
 * 
 * Get CURP/RFC from http://www.ossc.com.mx/curp.php
 * 
 */
class CurpRfcProperties 
{
  
    protected $firstName;
    
    protected $firstSurname;
    
    protected $secondSurname;
    
    protected $entity;
    
    protected $gender;
    
    protected $dateOfBirth;

    /**
    * Get firstname
    *
    * @return string
    */
    public function getFirstName()
    {
        return $this->firstName;    
    }
    
    public function setFirstName($firstName)
    {
       $this->firstName = $firstName;
       return $this;
    } 

    /**
    * Get firstSurname
    *
    * @return string
    */
    public function getFirstSurname()
    {
        return $this->firstSurname;
    }
    
    public function setFirstSurname($firstSurname)
    {
       $this->firstSurname = $firstSurname;
       return $this;
    }    
    
    /**
    * Get secondSurname
    *
    * @return string
    */
    public function getSecondSurname()
    {
        return $this->secondSurname;
    }
    
    public function setSecondSurname($secondSurname)
    {
        $this->secondSurname = $secondSurname;
        return $this;
    }    
    
    /**
    * Get genderList  
    * 
    * @return array
    */
    public function genderList()
    {
       return array("Hombre" => 'H', "Mujer" => 'M'); 
    }
    
    
    /**
    * Set gender
    * @param $key (Hombre, Mujer)
    * @return string
    */
    public function setGender($key)
    {      
        $aGender = $this->genderList();
        $this->gender =  $aGender[$key];        
        return $this;      
    }    
     
    /**
    * Get getGenderIdentifier 
    * 
    * @return string
    */
    public function getGenderIdentifier()
    {    
        return $this->gender;       
    } 
    
    /**
    * Get getGenderName
    * 
    * @return string
    */
    public function getGenderName()
    {
       $aGender = array_flip($this->genderList());
       return $aGender[$this->gender];  
    }

    
    /**
     * Get getFullName 
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->getFirstName()." ".$this->getFirstSurname(). " ".$this->getSecondSurname();        
    }
    
    
    /**
    * Get getEntityList  
    * 
    * @return array
    */
    public function getEntityList()
    {
        return array(
            "AGUASCALIENTES"=>"AS",
            "BAJA CALIFORNIA"=>"BC",
            "BAJA CALIF. SUR"=>"BS",
            "CAMPECHE"=>"CC",
            "CHIAPAS"=>"CS",
            "CHIHUHUA"=>"CH",            
            "COAHUILA"=>"CL",
            "COLIMA"=>"CM",
            "DISTRITO FEDERAL"=>"DF",
            "DURANGO"=>"DG",
            "GUANAJUATO"=>"GT",
            "GUERRERO"=>"GR",
            "HIDALGO"=>"HG",
            "JALISCO"=>"JC",
            "MICHOACAN"=>"MN",
            "MORELOS"=>"MS",
            "NAYARIT"=>"NT",
            "NUEVO LEON"=>"NL",
            "OAXACA"=>"OC",
            "PUEBLA"=>"PL",
            "QUERETARO"=>"QT",
            "QUINTANA ROO"=>"QR",
            "SAN LUIS POTOSI"=>"SP",
            "SINALOA"=>"SL",
            "SONORA"=>"SR",
            "TABASCO"=>"TC",
            "TAMAULIPAS"=>"TS",
            "TLAXCALA"=>"TL",
            "VERACRUZ"=>"VZ",
            "YUCATAN"=>"YN",
            "ZACATECAS"=>"ZS"                    
        );         
    }
    
    /**
    * set setEntity 
    * @param  $key (DURANGO,JALISCO, etc)
    * @return string
    */
    public function setEntity($key)
    {
        $entities = $this->getEntityList();      
        $this->entity =  $entities[$key];
    }
    
    /**
    * Get getEntityIdentifier 
    *
    * @return string
    */
    public function getEntityIdentifier()
    {
       return $this->entity;
    }
    
    /**
    * Get getEntityName
    *
    * @return string
    */
    public function getEntityName()
    {
       $aEntity = array_flip($this->getEntityList());
       return $aEntity[$this->entity];  
    }
    
    /**
    * Get getDateOfBirth 
    *
    * @return string
    */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }    
    
     /**
     * Get setDateOfBirth 
     * @param Datetime $dateOfBirth
     * @return Datetime
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }   

}
