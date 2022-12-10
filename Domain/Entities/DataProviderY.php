<?php

namespace Domain\Entities;

/**
 * Class DataProviderY
 * @package Domain\Entities
 */
class DataProviderY extends DataProvider
{
    /**
     * @param array $data
     * @return DataProvider
     */
    protected function hydration(array $data): DataProvider
    {
        $dataProviderY = new DataProviderY();
        if (isset($data['balance']) && !empty($data['balance'])) {
            $dataProviderY->setBalance($data['balance']);
        }
        if (isset($data['currency']) && !empty($data['currency'])) {
            $dataProviderY->setCurrency($data['currency']);
        }
        if (isset($data['email']) && !empty($data['email'])) {
            $dataProviderY->setEmail($data['email']);
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $dataProviderY->setStatus(intval($data['status']));
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $dataProviderY->setDate($data['created_at']);
        }
        if (isset($data['id']) && !empty($data['id'])) {
            $dataProviderY->setId($data['id']);
        }
        return $dataProviderY;
    }
}
