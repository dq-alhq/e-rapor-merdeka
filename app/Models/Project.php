<?php

namespace App\Models;

use App\Enums\ProjectTheme;
use App\Observers\ProjectObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy([ProjectObserver::class])]
class Project extends Model
{
    protected $fillable = [
        'tapel_id',
        'tema',
        'kegiatan',
        'deskripsi',
        'subelement_1',
        'subelement_2',
        'subelement_3',
    ];

    protected function casts(): array
    {
        return [
            'tema' => ProjectTheme::class
        ];
    }

    /**
     * Get the tapel that owns the Project
     */
    public function tapel(): BelongsTo
    {
        return $this->belongsTo(Tapel::class, 'tapel_id', 'id');
    }

    /**
     * Get the subelement_1 that owns the Project
     */
    public function sub1(): BelongsTo
    {
        return $this->belongsTo(Project\Subelement::class, 'subelement_1', 'id');
    }

    /**
     * Get the subelement_1 that owns the Project
     */
    public function sub2(): BelongsTo
    {
        return $this->belongsTo(Project\Subelement::class, 'subelement_2', 'id');
    }

    /**
     * Get the subelement_1 that owns the Project
     */
    public function sub3(): BelongsTo
    {
        return $this->belongsTo(Project\Subelement::class, 'subelement_3', 'id');
    }

    /**
     * The classmembers that belong to the Project
     */
    public function classmembers(): BelongsToMany
    {
        return $this->belongsToMany(Classmember::class, 'projectmembers', 'project_id', 'classmember_id');
    }

    /**
     * Get all of the projectmembers for the Project
     */
    public function projectmembers(): HasMany
    {
        return $this->hasMany(Projectmember::class, 'project_id', 'id');
    }
}
