<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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
        'about_me',
        'google_id'
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
        return $this->belongsToMany(Course::class, 'user_courses', 'user_id', 'course_id')->withPivot('status')->withTimestamps();
    }

    /**
     * The roles that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'user_lessons', 'user_id', 'lesson_id')->withTimestamps();
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

    /**
     * The documents that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function documents()
    {
        return $this->belongsToMany(Document::class, 'document_users')->withTimestamps();
    }

    public function getCountUserDocuments($data)
    {
        return $this->documents()->where('lesson_id', $data)->pluck('document_id')->count();
    }

    public function formatButtonDisable($data)
    {
        return $this->documents()->where('document_id', $data)->count() > 0 ? 'disabled' : '';
    }

    public function addClassDisabled($data)
    {
        return $this->documents()->where('document_id', $data)->count() > 0 ? 'bg-danger' : '';
    }

    public function changeTextButton($data)
    {
        return $this->documents()->where('document_id', $data)->count() > 0 ? 'Reviewed' : 'Review';
    }

    public function getFormatValueDateAttribute()
    {
        return $this->birthday == null ? 'Date of birthday' : $this->birthday;
    }

    public function getFormatValuePhoneAttribute()
    {
        return $this->phone == null ? 'Phone number' : $this->phone;
    }

    public function getFormatValueAddressAttribute()
    {
        return $this->address == null ? 'Address' : $this->address;
    }

    public function getFormatAboutMeAttribute()
    {
        return $this->about_me == null ? '' : $this->about_me;
    }

    public function getFormatFullNameAttribute()
    {
        return $this->full_name == null ? 'Your name' : $this->full_name;
    }

    public function getUserCourse($data)
    {
        return $this->userCourses()->where('course_id', $data)->count();
    }

    public function checkIsNullLesson($data)
    {
        return $this->lessons()->get()->where('id', $data)->first() ? false : true;
    }

    public function allDocumentLesson($data)
    {
        return $this->lessons()->get()->where('id', $data)->first()->document_all_course;
    }

    public function progressOfLesson($data)
    {
        return !$this->checkIsNullLesson($data) ? number_format($this->getCountUserDocuments($data) / $this->allDocumentLesson($data) * 100, 2) : 0;
    }

    public function formatTextLearnButton($data)
    {
        if ((int)$this->progressOfLesson($data) >= 100) {
            return "Learned";
        } elseif ((int)$this->progressOfLesson($data) > 0) {
            return "Learning";
        } else {
            return "Learn";
        }
    }

    public function addClassLearnedButton($data)
    {
        return (int)$this->progressOfLesson($data) >= 100 ? "bg-danger" : "";
    }

    public function scopeTeacher($query)
    {
        return $query->where('role', self::ROLE_TEACHER);
    }
}
