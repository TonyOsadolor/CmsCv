<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SideTag extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are not mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];
    
    /**
     * Get the About Me Profile
     */
    public function aboutMe(): BelongsTo
    {
        return $this->belongsTo(AboutMe::class);
    }
}
