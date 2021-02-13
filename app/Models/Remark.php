<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    use HasFactory;
    protected $fillable = ['remark'];
    public function activity (){
        return $this->belongsTo('\App\Models\Activity');
    }
}
