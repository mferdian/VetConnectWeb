<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VetTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'vet_date_id',
        'jam_mulai',
        'jam_selesai',
    ];

    // Casting yang tepat untuk PostgreSQL TIME field
    protected $casts = [
        'jam_mulai' => 'string',
        'jam_selesai' => 'string',
    ];

    public function vetDate(): BelongsTo
    {
        return $this->belongsTo(VetDate::class);
    }


    public function getJamMulaiFormattedAttribute()
    {
        return $this->jam_mulai ? substr($this->jam_mulai, 0, 5) : null; // HH:MM
    }

    public function getJamSelesaiFormattedAttribute()
    {
        return $this->jam_selesai ? substr($this->jam_selesai, 0, 5) : null; // HH:MM
    }


    public function setJamMulaiAttribute($value)
    {
        $this->attributes['jam_mulai'] = is_string($value) ? $value :
            (is_object($value) ? $value->format('H:i:s') : null);
    }

    public function setJamSelesaiAttribute($value)
    {
        $this->attributes['jam_selesai'] = is_string($value) ? $value :
            (is_object($value) ? $value->format('H:i:s') : null);
    }
}
