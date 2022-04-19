<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    const ROLE_USER = 0;
    const ROLE_TEACHER = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'full_name',
        'email',
        'password',
        'birthday',
        'address',
        'phone',
        'role',
        'job',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teacherCourses()
    {
        return $this->belongsToMany(Course::class, 'teacher_courses', 'user_id', 'course_id');
    }

    /**
     * The userCourse that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userCourses()
    {
        return $this->belongsToMany(Course::class, 'user_courses', 'user_id', 'course_id');
    }

    /**
     * The roles that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'user_lessons', 'user_id', 'lesson_id');
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    public function scopeTeacher($query)
    {
        return $query->where('role', User::ROLE_TEACHER);
    }
}
