<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // public static function all(){
    //     return cache()->Cache::rememberForever('posts.all', function () {
    //         return collect(File::files(resource_path("posts")))
    //             ->map(fn($file)=>Yaml)

    //     });
    // }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
            )
        );
    }
        public static function find($slug){
            $post= static::all()->firstWhere('slug',$slug);
            if(! $post){
                throw new ModelNotFoundException();
            }
            return $post;
        }
}
