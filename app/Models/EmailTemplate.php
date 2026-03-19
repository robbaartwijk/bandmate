<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
 
class EmailTemplate extends Model
{
    use HasFactory, SoftDeletes;
 
    protected $fillable = [
        'name',
        'subject',
        'body_html',
        'body_text',
        'status',
    ];
 
    protected $casts = [
        'status' => 'string',
    ];
 
    public function jobs(): HasMany
    {
        return $this->hasMany(EmailJob::class, 'template_id');
    }
}