<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
public $timestamps = false;
     protected $fillable = [
        'pedido',
        'precio',
        'mesa',
        'estado',
        'user_id'
      
    ];

    public function user()
    {
        // 🚨 Esto asume que tienes la columna 'user_id' en tu tabla 'orders'.
        return $this->belongsTo(User::class);
    }
}
