<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getTotal(){
        $total = 0;
        foreach ($this->cart as $key => $item) {
            $total+= $item['total'];
        }
        return $total;
    }
}
