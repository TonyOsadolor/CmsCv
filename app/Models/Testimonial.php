<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SortOrderTrait;

class Testimonial extends Model
{
    use SoftDeletes, SortOrderTrait;

    /**
     * The attributes that are not mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];

    /**
     * The appended attributes for the model.
     *
     * @var array
     */
    protected $appends = ['default_img'];
    
    /**
     * Get the About Me Profile
     */
    public function aboutMe(): BelongsTo
    {
        return $this->belongsTo(AboutMe::class);
    }
    
    /**
     * Get formatted phone number for texting user.
     *
     * @return string
     */
    public function getDefaultImgAttribute()
    {
        return $this->photo ? $this->photo : config('mine.default_avatar');
    }
}
