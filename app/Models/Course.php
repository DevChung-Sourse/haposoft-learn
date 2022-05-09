<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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
        return $this->belongsToMany(User::class, 'user_courses', 'course_id', 'user_id')->withPivot('status')->withTimestamps();
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

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id', 'id');
    }

    public function getLearnersAttribute()
    {
        return number_format($this->users()->count());
    }

    public function getLessonsCountAttribute()
    {
        return number_format($this->lessons()->count());
    }

    public function getTimeSumAttribute()
    {
        return number_format($this->lessons()->sum('time')) . " " . "(h)";
    }

    public function getTimeSumHoursAttribute()
    {
        return number_format($this->lessons()->sum('time')) . " " . "hours";
    }

    public function getProcessedPriceAttribute()
    {
        return $this->price == 0 ? "Free" : number_format($this->price) . " $";
    }

    public function getStatusCourse($data)
    {
        return $this->users()->where('user_id', $data)->pluck('status')->first();
    }

    public function getDisableButtonAttribute()
    {
        return $this->getStatusCourse(Auth::id()) === 1 ? "disabled" : "";
    }

    public function getDangerButtonAttribute()
    {
        if ($this->getStatusCourse(Auth::id()) === 0) {
            return "bg-danger";
        } else if ($this->getStatusCourse(Auth::id()) === 1) {
            return "bg-light text-dark";
        } else {
            return "";
        }
    }

    public function getTextButtonAttribute()
    {
        if ($this->getStatusCourse(Auth::id()) === 0) {
            return "Đã đăng kí khóa học";
        } else if ($this->getStatusCourse(Auth::id()) === 1) {
            return "Đã kết thúc khóa học";
        } else {
            return "Đăng kí khóa học";
        }
    }

    public function getAvgStarAttribute()
    {
        return $this->reviews()->pluck('vote')->avg();
    }

    public function getCountStarAttribute()
    {
        return $this->reviews()->pluck('vote')->count();
    }

    public function getVoteFiveStarAttribute()
    {
        return $this->reviews()->where('vote', 5)->count();
    }

    public function getVoteFourStarAttribute()
    {
        return $this->reviews()->where('vote', 4)->count();
    }

    public function getVoteThreeStarAttribute()
    {
        return $this->reviews()->where('vote', 3)->count();
    }

    public function getVoteTwoStarAttribute()
    {
        return $this->reviews()->where('vote', 2)->count();
    }

    public function getVoteOneStarAttribute()
    {
        return $this->reviews()->where('vote', 1)->count();
    }

    public function getPercentVoteFiveAttribute()
    {
        return $this->getVoteFiveStarAttribute() / $this->getCountStarAttribute() * 100;
    }

    public function getPercentVoteFourAttribute()
    {
        return $this->getVoteFourStarAttribute() / $this->getCountStarAttribute() * 100;
    }

    public function getPercentVoteThreeAttribute()
    {
        return $this->getVoteThreeStarAttribute() / $this->getCountStarAttribute() * 100;
    }

    public function getPercentVoteTwoAttribute()
    {
        return $this->getVoteTwoStarAttribute() / $this->getCountStarAttribute() * 100;
    }

    public function getPercentVoteOneAttribute()
    {
        return $this->getVoteOneStarAttribute() / $this->getCountStarAttribute() * 100;
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['keywords'])) {
            $query->where('title', 'LIKE', '%' . $data['keywords'] . '%')
                  ->orWhere('description', 'LIKE', '%' . $data['keywords'] . '%');
        }

        if (isset($data['created_time'])) {
            $query->orderBy('created_at', $data['created_time']);
        } else {
            $query->orderBy('created_at', config('filter.sort.desc'));
        }

        if (isset($data['teacher'])) {
            $query->whereHas('teachers', function ($subquery) use ($data) {
                $subquery->where('user_id', $data['teacher']);
            });
        }

        if (isset($data['learner'])) {
            $query->withCount('users')->orderBy('users_count', $data['learner']);
        }

        if (isset($data['learn_time'])) {
            $query->withSum('lessons', 'time')->orderBy('lessons_sum_time', $data['learn_time']);
        }

        if (isset($data['lesson'])) {
            $query->withCount('lessons')->orderBy('lessons_count', $data['lesson']);
        }

        if (isset($data['tag'])) {
            $query->whereHas('tags', function ($subquery) use ($data) {
                $subquery->where('tag_id', $data['tag']);
            });
        }
        return $query;
    }

    public function scopeRandomCourses($query, $id)
    {
        return $query->where('id', '!=', $id)->limit(config('filter.limited_courses'));
    }
}
