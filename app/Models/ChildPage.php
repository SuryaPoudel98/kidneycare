<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ParentPage;

class ChildPage extends Model
{
    use HasFactory;
    
    public function parentpage()
    {
        return $this->belongsTo(ParentPage::class, 'parentpage_id');
    }

    public function ChildContent()
    {
        return $this->hasOne(ChildContent::class);
    }
}


