<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopGameNew extends Model
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = 'nha_cai';
    }
    public function getCategoryAttribute()
    {
        return Category::where('id', $this->attributes['type'])->get();
    }   

    public function Post(){
        return $this->belongsTo(Post::class, 'post_id' ,'id');
    }
}
