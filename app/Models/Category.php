<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $fillable = [
        'parent_id',
        'title',
        'keywords',
        'description',
        'image',
        'status',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getFullPathAttribute(): string
    {
        $titles   = [];
        $current  = $this;
        $visited  = []; // ✅ Track visited IDs to prevent infinite loop
        $maxDepth = 10; // ✅ Hard limit on depth
        $depth    = 0;

        while ($current && $depth < $maxDepth) {
            // ✅ Break if we've already visited this category (circular reference)
            if (in_array($current->id, $visited)) {
                break;
            }

            $visited[]  = $current->id;
            $titles[]   = $current->title;
            $depth++;

            if (!$current->parent_id || $current->parent_id == 0) {
                break;
            }

            $current = $current->parent;
        }

        return implode(' -> ', array_reverse($titles));
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
