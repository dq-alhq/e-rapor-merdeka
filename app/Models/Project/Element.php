<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Element extends Model
{
    protected $fillable = ['deskripsi'];

    /**
     * Get the dimension that owns the Element
     */
    public function dimension(): BelongsTo
    {
        return $this->belongsTo(Dimension::class, 'dimension_id', 'id');
    }

    /**
     * Get all of the subelements for the Element
     */
    public function subelements(): HasMany
    {
        return $this->hasMany(Subelement::class, 'element_id', 'id');
    }
}
