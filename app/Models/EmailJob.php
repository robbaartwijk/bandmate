<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
 
class EmailJob extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'template_id',
        'type',
        'status',
        'from_address',
        'from_name',
        'metadata',
        'scheduled_at',
        'started_at',
        'completed_at',
    ];
 
    protected $casts = [
        'metadata'     => 'array',
        'scheduled_at' => 'datetime',
        'started_at'   => 'datetime',
        'completed_at' => 'datetime',
    ];
 
    public function template(): BelongsTo
    {
        return $this->belongsTo(EmailTemplate::class, 'template_id');
    }
 
    public function recipients(): HasMany
    {
        return $this->hasMany(EmailJobRecipient::class, 'job_id');
    }
}
