<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    use HasFactory;
    public function task(){
        return $this->belongsTo(Status::class);
    }
    public function scopeFilter(Builder $query, $filter){
        if ($filter->status_id!=null){
            $query->where('status_id',$filter->status_id);
        }
    }
    public function scopeId(Builder $query, $status_id){
        $query->where('status_id',$status_id);
    }
    }
