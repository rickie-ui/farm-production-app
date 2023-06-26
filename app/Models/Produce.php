<?php

namespace App\Models;

use App\Models\Farmer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produce extends Model
{
   use HasFactory, SoftDeletes;

       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'quantity',
        'farmer_id',
    ];

     //Relationship to farmer
    public function produce()
    {
        return $this->belongsTo(Farmer::class, 'farmer_id');
    }
}
