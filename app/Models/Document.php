<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'file_path',
        'title',
        'type',
        'lesson_id',
    ];

    /**
     * Get the user that owns the Document
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
}
