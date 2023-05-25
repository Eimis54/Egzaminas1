<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Status extends Model
{
    use HasFactory;
    public function status(){
        return $this->hasMany(Status::class);
    }
    public function scopeFilter(Builder $query, $filter){
        if ($filter->name!=null){
            $query->where('name',$filter->name);
        }
    }
    public function scopeName(Builder $query, $name){
        $query->where('name',$name);
    }

}
