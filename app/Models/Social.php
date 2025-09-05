<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SortOrderTrait;

class Social extends Model
{
    use SoftDeletes, SortOrderTrait;

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

    /**
     * Scope a query to only include active records.
     */
    #[Scope]
    protected function active(Builder $query): void
    {
        $query->where('is_active', 1);
    }
}
