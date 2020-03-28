<?php

namespace App\DataProvider;

use App\DataProvider\Interfaces\IDataProvider;
use App\User;

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
     * @var int
     */
    public $id_user;

    /**
     * Действия для подготовки данных
     * 
     * Массив вида: [
     *      $field => $action
     * ],
     * где $filed @string,
     * $action @function     
     * 
     * @return array
     */
    private function prepareFields()
    {
        return [
            'id_user' => function() {
                return User::findIdByToken($this->id_user);
            }
        ];
    }

    /**
     * Нормализация данных
     * 
     * @param array $data
     * @return array
     */
    private function normalizeData()
    {
        $actions = $this->prepareFields();

        foreach($this as $filed => $value) 
        {
            if(key_exists($filed, $actions))
            {
                $this->$filed = $actions[$filed]();
            }
        }
    }

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
        $this->normalizeData();
    }
}
