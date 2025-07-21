<?php

namespace Modules\ShowRoom\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ShowRoom\Database\factories\ShowRoomFactory;

class ShowRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'images',
        'active',
    ];

    // Optional: Accessor for images as array
    public function getImagesArrayAttribute()
    {
        return explode(',', $this->images);
    }


}
