<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'link',
        'description'
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
        'tagsNode'
    ];

    public function tagsNode()
    {
        return $this->hasMany(ToolTag::class);
    }

    protected $appends = ['tags'];

    public function getTagsAttribute()
    {
        return $this->tagsNode()->pluck('tag');
    }
}
