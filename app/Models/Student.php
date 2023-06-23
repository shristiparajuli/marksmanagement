<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['stuname', 'address', 'contact','image'];

    public function grades(){
        return $this->hasMany(Grade::class);
    }

    public function subject(){
        return $this->hasMany(Subject::Class);
    }
}
