<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Setting extends Model
{
    /**
     * @return HasOne<User, $this>
     */
    public function settings(): HasOne
    {
        return $this->hasOne(User::class, foreignKey: 'settings_id');
    }
}
