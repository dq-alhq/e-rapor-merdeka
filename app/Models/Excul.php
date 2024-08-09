<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Excul extends Model
{
    protected $fillable = ['teacher_id', 'nama', 'code'];

    /**
     * Get the teacher that owns the Excul
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

    /**
     * The classmembers that belong to the Excul
     */
    public function classmembers(): BelongsToMany
    {
        return $this->belongsToMany(Classmember::class, 'exculmembers', 'excul_id', 'classmember_id');
    }

}
