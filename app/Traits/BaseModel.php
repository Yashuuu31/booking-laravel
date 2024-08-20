<?php

namespace App\Traits;

trait BaseModel
{
    public function setQB()
    {
        $modelObj = new self;
        $query = $modelObj;
        
        if(!empty($this->getIncludes())) {
            $query = $modelObj->with($this->getIncludes());
        }

        return $query;
    }

    public function getIncludes()
    {
        $include = [];
        if(!empty(request()->get('include'))) {
            $include = request()->get('include');
            $include = explode(',', $include);
        }

        return $include;
    }
}