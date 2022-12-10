<?php

namespace Domain\Services;

use Domain\Contracts\Service\ServiceInterface;
use Domain\Repositories\DataProviderXRepository;
use Domain\Repositories\DataProviderYRepository;

/**
 * Class UserService
 * @package Domain\Services
 */
class UserService implements ServiceInterface
{
    /**
     * @var DataProviderXRepository $dataProviderXRepository
     */
    private $dataProviderXRepository;

    /**
     * @var DataProviderYRepository $dataProviderYRepository
     */
    private $dataProviderYRepository;

    /**
     * UserService constructor.
     * @param DataProviderXRepository $dataProviderXRepository
     * @param DataProviderYRepository $dataProviderYRepository
     */
    public function __construct(
        DataProviderXRepository $dataProviderXRepository,
        DataProviderYRepository $dataProviderYRepository
    ) {
        $this->dataProviderXRepository = $dataProviderXRepository;
        $this->dataProviderYRepository = $dataProviderYRepository;
    }

    /**
     * @param array $filters
     * @return array
     */
    function getAllDataProviders(array $filters = []): array
    {
        $dataProviderX = $this->getDataProviderX($filters);
        $dataProviderY = $this->getDataProviderY($filters);
        return array_merge($dataProviderX, $dataProviderY);
    }

    /**
     * @param array $filters
     * @return array
     */
    function getDataProviderX(array $filters = []): array
    {
        return $this->dataProviderXRepository->getAll($filters);
    }

    /**
     * @param array $filters
     * @return array
     */
    function getDataProviderY(array $filters = []): array
    {
        return $this->dataProviderYRepository->getAll($filters);
    }
}
