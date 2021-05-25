<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory;
    use HasSlug;
    protected $fillable = ['title', 'content', 'description', 'thumbnail', 'category_id'];

    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public static function uploadImage(Request $request, $image = null)
    {
        if($request->hasFile('thumbnail')){
            $folder = date('Y-m-d');
            $path =  $request->file('thumbnail')->store("images/$folder");
            if($image){
                Storage::delete($image);
                return $path;
            }
            return $path;
        }

        return null;

    }

    public function getPostDate(){
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d F, Y');
    }

    public function getImage(){
        if($this->thumbnail){
            return asset('uploads/' .$this->thumbnail);
        }
        return asset('no-image.png');
    }
}
