<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipment_id',
        'user_id',
        'person_id',
        'type',
        'quantity',
        'date',
        'remarks',
        'is_reversed',
        'reversal_reason',
        'reversed_by',
    ];

    public function equipment()
    {
        return $this->belongsTo(equipment::class);
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
