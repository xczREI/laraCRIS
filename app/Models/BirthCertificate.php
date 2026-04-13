<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BirthCertificate extends Model
{
    use HasFactory, SoftDeletes;

    // Explicitly connect to your custom table name
    protected $table = 'birth_records';

    protected $guarded = ['id'];

    // Format your specific date columns
    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'parents_marriage_date' => 'date',
            'date_registered' => 'date',
        ];
    }

    // Link the record to the Staff Member who encoded it
    public function staff()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
