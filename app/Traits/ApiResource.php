<?php

namespace App\Traits;

trait ApiResource
{
    public function getFields()
    {
        $model = new $this->model;
        $fields = [$model->getKeyName()];
        $fields = array_merge($fields, $model->getFillable());
        $data = [];
        foreach($fields as $field) {
            $data[$field] = $this->$field;
        }

        return $data;
    }
}