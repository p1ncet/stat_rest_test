<?php

declare(strict_types=1);

namespace App\Entity;

/**
 * Class Country
 * @package App\Entity
 */
class Country
{
    private $countryCode;

    /**
     * Country constructor.
     * @param string $countryCode
     */
    public function __construct(string $countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }
}
