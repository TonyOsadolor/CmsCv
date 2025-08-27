<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'about_me';

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
    protected $appends = ['othernames', 'call_number'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'core_skills' => 'array',
        ];
    }

    /**
     * Get the full name of the user.
     *
     * @return string
     */
    public function getOtherNamesAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name;
    }
    
    /**
     * Get formatted phone number for texting user.
     *
     * @return string
     */
    public function getCallNumberAttribute()
    {
        if (empty($this->phone)) {
            return null;
        }

        $phone = preg_replace('/[^0-9]/', '', $this->phone);

        return str_starts_with($phone, '0') ? '234' . substr($phone, 1) : (str_starts_with($phone, '234') ? $phone : '234' . $phone);
    }
    
    /**
     * Get the User Profile
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
