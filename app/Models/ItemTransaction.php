<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTransaction extends Model
{
    use HasFactory;
    protected $fillable = [

        'person_id',
        'user_id',
        'item_id',
        'quantity_taken',
        'date',
        'is_reversed',
        'reversal_reason',
        'reversed_by',
        'reverses',
    ];

    // Define relationships if necessary
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function person()
    {
        return $this->belongsTo(People::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
