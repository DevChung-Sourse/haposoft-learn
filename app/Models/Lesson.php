<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;

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
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    /**
     * The roles that belong to the Lesson
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_lessons', 'lesson_id', 'user_id')->withPivot('count_documents')->withTimestamps();
    }

    /**
     * Get all of the comments for the Lesson
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->hasMany(Document::class, 'lesson_id');
    }

    public function getHaveUserAttribute()
    {
        return $this->users()->pluck('user_id')->count();
    }

    public function lessonIsStarted()
    {
        return $this->getHaveUserAttribute() == 0 ? true : false;
    }

    public function getCheckRegisterCourseAttribute()
    {
        return $this->course()->first()->users()->pluck('user_id', 'course_id')->count();
    }

    public function getDocumentAllCourseAttribute()
    {
        return $this->documents()->count();
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['keywords_lesson'])) {
            $query->where('description', 'LIKE', '%' . $data['keywords_lesson'] . '%');
        }
        return $query;
    }
}
