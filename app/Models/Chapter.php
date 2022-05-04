<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'manga_id',
        'episode_name',
        'images',
    ];
    public function parent(){
        $manga = Manga::find($this->manga_id);
        return $manga;
    }
}
