<?php

namespace Domain\Entities;

use Domain\Entities\Traits\Identifiable;

/**
 * Class DataProvider
 * @package Domain\Entities
 */
abstract class DataProvider
{
    use Identifiable;

    /**
     * @var string $balance
     */
    private $balance;

    /**
     * @var string $currency
     */
    private $currency;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var int $status
     */
    private $status;

    /**
     * @var string $date
     */
    private $date;

    /**
     * @param string $balance
     */
    public function setBalance(string $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * @return string
     */
    public function getBalance(): string
    {
        return $this->balance;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param array $data
     * @return DataProvider
     */
    abstract protected function hydration(array $data): DataProvider;
}
