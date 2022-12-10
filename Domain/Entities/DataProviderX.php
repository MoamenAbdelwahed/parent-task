<?php

namespace Domain\Entities;

use Domain\Entities\Traits\Identifiable;

/**
 * Class DataProviderX
 * @package Domain\Entities
 */
class DataProviderX extends DataProvider
{
    /**
     * @param array $data
     * @return DataProvider
     */
    protected function hydration(array $data): DataProvider
    {
        $dataProviderX = new DataProviderX();
        if (isset($data['parentAmount']) && !empty($data['parentAmount'])) {
            $dataProviderX->setBalance($data['parentAmount']);
        }
        if (isset($data['Currency']) && !empty($data['Currency'])) {
            $dataProviderX->setCurrency($data['Currency']);
        }
        if (isset($data['parentEmail']) && !empty($data['parentEmail'])) {
            $dataProviderX->setEmail($data['parentEmail']);
        }
        if (isset($data['statusCode']) && !empty($data['statusCode'])) {
            $dataProviderX->setStatus(intval($data['statusCode']));
        }
        if (isset($data['registrationDate']) && !empty($data['registrationDate'])) {
            $dataProviderX->setDate($data['registrationDate']);
        }
        if (isset($data['parentIdentification']) && !empty($data['parentIdentification'])) {
            $dataProviderX->setId($data['parentIdentification']);
        }
        return $dataProviderX;
    }
}
