<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
 
class EmailJobRecipient extends Model
{
    use HasFactory;
 
    public $timestamps = false;
 
    protected $fillable = [
        'job_id',
        'email',
        'name',
        'variables',
    ];
 
    protected $casts = [
        'variables'  => 'array',
        'created_at' => 'datetime',
    ];
 
    public function job(): BelongsTo
    {
        return $this->belongsTo(EmailJob::class, 'job_id');
    }
 
    public function log(): HasOne
    {
        return $this->hasOne(EmailLog::class, 'recipient_id');
    }
}