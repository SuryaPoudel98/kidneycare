<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildPage;
use App\Models\ParentContent;


class ParentPage extends Model
{
    use HasFactory;

    
    public function childpages()
    {
        return $this->hasMany(ChildPage::class);
    } 
    
    public function ParentContent()
    {
        return $this->hasOne(ParentContent::class);
    }
}
