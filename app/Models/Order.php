<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        'master_id',
        'full_name_client',
        'mark',
        'model',
        'state_number',
        'region',
        'price',
        'description',
        'status',
        'EndTime',
        'images'
    ];
    protected $table = 'orders';

    public function master(): belongsTo
    {
        return $this->belongsTo(Master::class, 'master_id');
    }

    public function getEndTimeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d.m.Y') : null;
    }

    public function setEndTimeAttribute($value)
    {
        $parsedDate = Carbon::createFromFormat('Y-m-d', $value);
        $this->attributes['EndTime'] = $parsedDate->setTime(18, 0, 0)->format('Y-m-d H:i:s');
    }
}
