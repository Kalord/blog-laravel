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
    public $start;

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
        foreach ($data as $key => $value)
        {
            $this->$key = $value;
        }
    }
}
