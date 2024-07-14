<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $primaryKey = 'orderID';

    protected $fillable = [
        'items',
        'order_value',
        'address',
        'phoneNumber',
    ];

    protected $casts = [
        'items' => 'array', // تحويل حقل العناصر إلى مصفوفة
    ];
}
