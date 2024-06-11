<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class FunctionalMedicine extends Model
{
    use HasFactory;
    protected $table = 'functional_medicine';
    protected $fillable = [
        'id','patient_id','details','created_at','updated_at'
        ];

        public function patient()
        {
            return $this->belongsTo(Patient::class);
        }
}
