<?php

namespace Domain\Contracts\Repository;

/**
 * Interface RepositoryInterface
 * @package Domain\Contracts\Repository
 */
interface RepositoryInterface
{
    function getAll(array $filters = []): array;
}
