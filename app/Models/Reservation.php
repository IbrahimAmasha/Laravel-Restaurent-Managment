<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [  
        'first_name',
        'name_name',
        'email',
        'tel_number',
        'guest_number',
        'res_date',
        'table_id',
        'user_id'
    ];

    protected $casts = [
        'res_date' => 'datetime'
    ];

    
    public function table() 
    {
        return $this->belongsTo(Table::class);
    }
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
