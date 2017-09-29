<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'sn',
        'name',
        'sex',
        'YearClass_id',
        'num',
        'at_school',
    ];
    public function YearClass()
    {
        return $this->belongsTo(YearClass::class);
    }

}
