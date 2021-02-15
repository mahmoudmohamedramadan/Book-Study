<?php

namespace App\Models;

use App\Http\Collections\DepartmentCollection;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $fillable = [
        'name'
    ];

    //appends property used to append accessor with returned data
    protected $appends = [
        'full_info'
    ];

    public function getFullInfoAttribute()
    {
        return $this->departmentable_type.' '.$this->departmentable_id;
    }

    public function departmentable()
    {
        return $this->morphTo();
    }

    //newCollection is a function in Model Class
    public function newCollection(array $models = [])
    {
        return new DepartmentCollection($models);
    }
}
