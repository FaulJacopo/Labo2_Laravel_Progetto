<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\File;

class Book extends Model
{
    use HasFactory;

    protected $defaultImage = 'img/no-cover.webp';

    protected $fillable = [
        'name',
        'title',
        'description',
        'pages',
        'author_id',
        'category_id',
        'cover_image',
    ];

    public function author(): BelongsTo {
        return $this->belongsTo(Author::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    protected static  function boot()
    {
        parent::boot();

        static::deleting(function($book){
            if ($book->cover_image && $book->cover_image !== $book->defaultImage) {
                $filePath = public_path($book->cover_image);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }
        });

    }

}
