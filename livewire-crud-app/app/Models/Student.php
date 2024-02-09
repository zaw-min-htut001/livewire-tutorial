<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\Section;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;


    protected $fillable =[
        'section_id',
        'class_id',
        'name',
        'email'
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}

