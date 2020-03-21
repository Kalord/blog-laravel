<?php

namespace App\DataProvider\Interfaces;

interface IDataProvider
{
    /**
     * @param array $data
     * @return void
     */
    public function load(Array $data);
}
