<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Attributes\SearchUsingPrefix;

class Post extends Model
{
    use Searchable;

    protected $fillable = ['title', 'content', 'user_id'];

    public function searchableAs()
    {
        return 'posts_index';
    }

    #[SearchUsingPrefix(['id', 'title'])]
    #[SearchUsingFullText(['title', 'content'])]
    public function toSearchableArray()
    {
        return [
            'id' => (int) $this->id,
            'title' => $this->title,
            'content' => $this->content,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
