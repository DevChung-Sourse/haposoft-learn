<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'requirements',
        'course_id',
    ];

    /**
     * Get the user that owns the Lesson
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    /**
     * The roles that belong to the Lesson
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lessonUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_lessons', 'lesson_id', 'user_id');
    }

    /**
     * Get all of the comments for the Lesson
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'lesson_id');
    }
}