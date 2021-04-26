<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolTag extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tool_id',
        'tag'
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
        'id',
        'tool_id'
    ];

    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }
}
