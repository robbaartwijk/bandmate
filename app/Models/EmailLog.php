<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 
class EmailLog extends Model
{
    use HasFactory;
 
    public $timestamps = false;
 
    protected $fillable = [
        'recipient_id',
        'status',
        'message_id',
        'error_message',
        'sent_at',
        'failed_at',
    ];
 
    protected $casts = [
        'sent_at'    => 'datetime',
        'failed_at'  => 'datetime',
        'created_at' => 'datetime',
    ];
 
    public function recipient(): BelongsTo
    {
        return $this->belongsTo(EmailJobRecipient::class, 'recipient_id');
    }
}
