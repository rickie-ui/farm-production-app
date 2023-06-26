<?php

namespace App\Models;

use App\Models\Produce;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Farmer extends Model
{
    use HasFactory, SoftDeletes;

       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullName',
        'phone',
        'location',
        'coffee',
        'account',
    ];

      public function produces(){
        return $this->hasMany(Produce::class, 'farmer_id', 'id');
    }
}
