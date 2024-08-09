<?php

namespace App\Models\Project;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subelement extends Model
{
    protected $fillable = ['deskripsi'];

    /**
     * Get the element that owns the Subelement
     */
    public function element(): BelongsTo
    {
        return $this->belongsTo(Element::class, 'element_id', 'id');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'subelement_1');
    }
}
