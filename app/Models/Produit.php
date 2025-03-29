<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Produit extends Model
{
    //
    use HasFactory,Notifiable;
    protected $guarded = [''];
    public $timestamps = false;
}
