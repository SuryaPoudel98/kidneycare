<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class Report extends Model
{
    use HasFactory;

    public function Patient()
    {
      return $this->belongsTo(Patient::class);
    }

}
