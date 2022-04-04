<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'price',
    ];

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'teacher_courses', 'course_id', 'user_id');
    }

    /**
     * The roles that belong to the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_courses', 'course_id', 'user_id');
    }

    /**
     * The roles that belong to the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_tags', 'course_id', 'tag_id');
    }

    /**
     * Get all of the comments for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'course_id');
    }
}
