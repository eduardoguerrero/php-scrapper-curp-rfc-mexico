<?php

/**
 * Class CurpRfcProperties
 * @author escobarguerrero@gmail.com
 */
class CurpRfcProperties
{

    /** @var string */
    protected $firstName;

    /** @var string */
    protected $firstSurname;

    /** @var string */
    protected $secondSurname;

    /** @var string */
    protected $entity;

    /** @var string */
    protected $gender;

    /** @var \DateTime */
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

    /**
     * @param $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstSurname()
    {
        return $this->firstSurname;
    }

    /**
     * @param $firstSurname
     * @return $this
     */
    public function setFirstSurname($firstSurname)
    {
        $this->firstSurname = $firstSurname;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecondSurname()
    {
        return $this->secondSurname;
    }

    /**
     * @param $secondSurname
     * @return $this
     */
    public function setSecondSurname($secondSurname)
    {
        $this->secondSurname = $secondSurname;

        return $this;
    }

    /**
     * @return string[]
     */
    public function genderList()
    {
        return ["Hombre" => 'H', "Mujer" => 'M'];
    }


    /**
     * @param $key
     * @return $this
     */
    public function setGender($key)
    {
        $aGender = $this->genderList();
        $this->gender = $aGender[$key];

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGenderIdentifier()
    {
        return $this->gender;
    }

    /**
     * @return int|mixed|string
     */
    public function getGenderName()
    {
        $aGender = array_flip($this->genderList());

        return $aGender[$this->gender];
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->getFirstName() . " " . $this->getFirstSurname() . " " . $this->getSecondSurname();
    }

    /**
     * @return string[]
     */
    public function getEntityList()
    {
        return [
            "AGUASCALIENTES" => "AS",
            "BAJA CALIFORNIA" => "BC",
            "BAJA CALIF. SUR" => "BS",
            "CAMPECHE" => "CC",
            "CHIAPAS" => "CS",
            "CHIHUHUA" => "CH",
            "COAHUILA" => "CL",
            "COLIMA" => "CM",
            "DISTRITO FEDERAL" => "DF",
            "DURANGO" => "DG",
            "GUANAJUATO" => "GT",
            "GUERRERO" => "GR",
            "HIDALGO" => "HG",
            "JALISCO" => "JC",
            "MICHOACAN" => "MN",
            "MORELOS" => "MS",
            "NAYARIT" => "NT",
            "NUEVO LEON" => "NL",
            "OAXACA" => "OC",
            "PUEBLA" => "PL",
            "QUERETARO" => "QT",
            "QUINTANA ROO" => "QR",
            "SAN LUIS POTOSI" => "SP",
            "SINALOA" => "SL",
            "SONORA" => "SR",
            "TABASCO" => "TC",
            "TAMAULIPAS" => "TS",
            "TLAXCALA" => "TL",
            "VERACRUZ" => "VZ",
            "YUCATAN" => "YN",
            "ZACATECAS" => "ZS",
        ];
    }

    /**
     * @param $key
     * @return $this
     */
    public function setEntity($key)
    {
        $entities = $this->getEntityList();
        $this->entity = $entities[$key];

        return $this;
    }

    /**
     * @return string
     */
    public function getEntityIdentifier()
    {
        return $this->entity;
    }

    /**
     * @return int|mixed|string
     */
    public function getEntityName()
    {
        $aEntity = array_flip($this->getEntityList());
        return $aEntity[$this->entity];
    }

    /**
     * @return string
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param DateTime $dateOfBirth
     * @return $this
     */
    public function setDateOfBirth(\DateTime $dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }
}
