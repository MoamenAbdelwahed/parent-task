<?php

namespace Domain\Repositories;

use Domain\Contracts\Repository\RepositoryInterface;

/**
 * Class DataProviderXRepository
 * @package Domain\Repositories
 */
class DataProviderXRepository implements RepositoryInterface
{
    function getAll(array $filters = []): array
    {
        $path = storage_path() . "/json/DataProviderX.json";
        $json = json_decode(file_get_contents($path), true);
        $result = [];
        if (empty($filters)) {
            $result = $json;
        } else {
            foreach ($json as $jsonObject) {
                if (isset($filters['statusCode']) && !empty($filters['statusCode'])) {
                    if ($filters['statusCode'] == 'authorised' && $jsonObject['statusCode'] == '1') {
                        array_push($result, $jsonObject);
                        continue;
                    } elseif ($filters['statusCode'] == 'decline' && $jsonObject['statusCode'] == '2') {
                        array_push($result, $jsonObject);
                        continue;
                    } elseif ($filters['statusCode'] == 'refunded' && $jsonObject['statusCode'] == '3') {
                        array_push($result, $jsonObject);
                        continue;
                    }
                }
                if (isset($filters['balanceMin']) && !empty($filters['balanceMin']) && isset($filters['balanceMax']) && !empty($filters['balanceMax'])) {
                    if (intval($jsonObject['parentAmount']) >= intval($filters['balanceMin']) && intval($jsonObject['parentAmount']) <= intval($filters['balanceMax'])) {
                        array_push($result, $jsonObject);
                        continue;
                    }
                }
                if (isset($filters['currency']) && !empty($filters['currency'])) {
                    if ($jsonObject['Currency'] == $filters['currency']) {
                        array_push($result, $jsonObject);
                    }
                }
            }
        }
        return $result;
    }
}
