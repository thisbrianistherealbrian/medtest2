<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
            'current_projects_count' => 'integer',
            'email_verified_at' => 'datetime',
            'max_projects' => 'integer',
            'password' => 'hashed',
            'subscription_end' => 'datetime',
        ];
    }

    /**
     * @return HasMany<Project, $this>
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    /**
     * @return HasMany<Document, $this>
     */
    public function uploadedDocuments(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    /**
     * @return HasMany<Visitors, $this>
     */
    public function visitors(): HasMany
    {
        return $this->hasMany(Visitors::class);
    }

    /**
     * @return HasMany<MailingList, $this>
     */
    public function mailingLists(): HasMany
    {
        return $this->hasMany(MailingList::class);
    }

    /**
     * @return HasOne<Subscription, $this>
     */
    public function subscription(): HasOne
    {
        return $this->hasOne(Subscription::class);
    }

    /**
     * @return BelongsTo<Setting, $this>
     */
    public function settings(): BelongsTo
    {
        return $this->belongsTo(Setting::class, foreignKey: 'settings_id');
    }

    /**
     * @return BelongsTo<Visitors, $this>
     */
    public function visitors(): BelongsTo
    {
        return $this->belongsTo(Visitors::class);
    }
}
