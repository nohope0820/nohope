<?php

namespace App\Repositories;

class Repository
{
    protected $model;

    public function __construct()
    {
        //
    }

    public function raw()
    {
        return $this->model;
    }

    /**
     * Store information
     * @param array $params
     * @return \App\Models
     */
    public function store(array $params)
    {
        return $this->model->create($params);
    }
}
