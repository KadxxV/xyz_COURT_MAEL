<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function tracks(): HasMany
    {
        return  $this->hasMany(Track::class);
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->exists ? $this->attributes['name'] : trans('categories.missing_category')
        );
    }
}
