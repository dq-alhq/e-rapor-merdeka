<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeftStudent extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'alasan', 'tanggal_keluar'];

    protected function casts(): array
    {
        return [
            'tanggal_keluar' => 'datetime',
        ];
    }

    /**
     * Get the student that owns the LeftStudent
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
