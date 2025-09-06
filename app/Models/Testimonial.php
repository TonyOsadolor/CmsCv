<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Traits\SortOrderTrait;
use App\Mail\ThankYouMail;

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
     * Send Appreciation Email
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            try {
                Mail::to($model->email)->send(new ThankYouMail($model));
            } catch (\Exception $er) {
                Log::info('Error sending Appreciation Mail, Error: '.$er->getMessage());
            }
        });
    }
    
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
