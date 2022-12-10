<?php

namespace Domain\Repositories;

use Domain\Contracts\Repository\RepositoryInterface;

/**
 * Class DataProviderYRepository
 * @package Domain\Repositories
 */
class DataProviderYRepository implements RepositoryInterface
{
    function getAll(array $filters = []): array
    {
        $path = storage_path() . "/json/DataProviderY.json";
        $json = json_decode(file_get_contents($path), true);
        $result = [];
        if (empty($filters)) {
            $result = $json;
        } else {
            foreach ($json as $jsonObject) {
                if (isset($filters['statusCode']) && !empty($filters['statusCode'])) {
                    if ($filters['statusCode'] == 'authorised' && $jsonObject['status'] == '100') {
                        array_push($result, $jsonObject);
                        continue;
                    } elseif ($filters['statusCode'] == 'decline' && $jsonObject['status'] == '200') {
                        array_push($result, $jsonObject);
                        continue;
                    } elseif ($filters['statusCode'] == 'refunded' && $jsonObject['status'] == '300') {
                        array_push($result, $jsonObject);
                        continue;
                    }
                }
                if (isset($filters['balanceMin']) && !empty($filters['balanceMin']) && isset($filters['balanceMax']) && !empty($filters['balanceMax'])) {
                    if (intval($jsonObject['balance']) >= intval($filters['balanceMin']) && intval($jsonObject['balance']) <= intval($filters['balanceMax'])) {
                        array_push($result, $jsonObject);
                        continue;
                    }
                }
                if (isset($filters['currency']) && !empty($filters['currency'])) {
                    if ($jsonObject['currency'] == $filters['currency']) {
                        array_push($result, $jsonObject);
                    }
                }
            }
        }
        return $result;
    }
}
