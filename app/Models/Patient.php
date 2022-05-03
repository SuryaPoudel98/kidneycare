<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;

class Patient extends Model
{
    use HasFactory;

    public function Report()
    {
        return $this->hasOne(Report::class);
    }
}
