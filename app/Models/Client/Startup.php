<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;
use Carbon\Carbon;

class Startup extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'slug_name',
        'company_name',
        'cover_photo',
        'profile_photo',
        'bio',
        'country',
        'office_address',
        'industry',
        'establishment_date',
        'project_level',
        'description',
        'client_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getEstablishmentDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
