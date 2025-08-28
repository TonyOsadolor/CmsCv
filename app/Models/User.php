<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasName;
use Illuminate\Support\Str;
use Filament\Panel;

class User extends Authenticatable implements MustVerifyEmail, FilamentUser, HasName, HasAvatar
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are not mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];

    /**
     * Grant access to Panel
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * The appended attributes for the model.
     *
     * @var array
     */
    protected $appends = ['full_name', 'is_verified'];

    /**
     * Get the full name of the user.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get the full name of the user.
     *
     * @return string
     */
    public function getFilamentName(): string
    {
        return $this->getFullNameAttribute();
    }

    /**
     * Get the User's Avatar
     */
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->photo ? $this->photo : 'https://picsum.photos/200/200';
    }

    /**
     * Get the User's Photo.
     *
     * @return string
     */
    public function getPhotoAttribute($value)
    {
        return $value ? $value : config('mine.default_avatar');
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->full_name)
            ->explode(' ')
            ->map(fn (string $full_name) => Str::of($full_name)->substr(0, 1))
            ->implode('');
    }

    /**
     * Get the About Me Profile
     */
    public function aboutMe(): HasOne
    {
        return $this->hasOne(AboutMe::class);
    }
}
