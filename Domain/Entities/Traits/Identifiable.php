<?php

namespace Domain\Entities\Traits;

/**
 * Trait Identifiable
 * @package Domain\Entities\Traits
 */
trait Identifiable
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}
