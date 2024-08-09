<?php

namespace App\Models\Project;

use App\Enums\Level;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dimension extends Model
{
    protected $fillable = ['jenjang', 'deskripsi'];

    protected function casts(): array
    {
        return [
            'jenjang' => Level::class
        ];
    }

    /**
     * Get all of the elements for the Dimension
     */
    public function elements(): HasMany
    {
        return $this->hasMany(Element::class, 'dimension_id', 'id');
    }
}
