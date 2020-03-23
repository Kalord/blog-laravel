<?php

namespace App\DataProvider;

use App\DataProvider\Interfaces\IDataProvider;

class PostFindOptions implements IDataProvider
{
    /**
     * @var int
     */
    public $limit;

    /**
     * @var int
     */
    public $pivot;

    /**
     * @var int
     */
    public $id_category;

    /**
     * @var array
     */
    public $tags;

    /**
     * @param array $data
     * @return void
     */
    public function load(Array $data)
    {
        foreach ($data as $property => $value)
        {
            if(property_exists($this, $property))
            {
                $this->$property = $value;
            }
        }
    }
}
