<?php

namespace App\Models;

use App\Enums\MapelType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mapping extends Model
{
    use HasFactory;

    protected $fillable = ['mapel_id', 'kelompok', 'order'];

    protected function casts(): array
    {
        return [
            'kelompok' => MapelType::class,
            'order' => 'integer',
        ];
    }

    /**
     * Get the mapel that owns the Mapping
     */
    public function mapel(): BelongsTo
    {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id');
    }
}
