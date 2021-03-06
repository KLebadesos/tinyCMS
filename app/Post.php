<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use App\Tag;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'description',
        'content',
        'published_at',
        'image',
        'category_id'
    ];


     /**
     * Deleting image in the storage folder
     *
     * @return void
     */

     public function deleteImage(){
        Storage::delete($this->image);
     }

     public function category(){
        return $this->belongsTo(Category::class);
     }

     public function tags(){
        return $this->belongsToMany(Tag::class);
     }

     public function hasTag($tagId){
         return in_array($tagId, $this->tags->pluck('id')->toArray());
     }
}
