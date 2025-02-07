<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory ;


    protected $fillable= ['body' ,'name' , 'post_id'];
    public function post(){
        return  $this->belongsTo(Post::class);
    }
}
