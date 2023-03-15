<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Bike extends Model {
    use HasFactory;

    protected $fillable = [
        'weight',
        'name',
        'color_id',
        'image',
        'price',
    ];

    public function color() {
        return $this->belongsTo(Color::class);
    }

    protected function image(): Attribute {
        return new Attribute(
            get: fn($image) => filter_var($image, FILTER_VALIDATE_URL) ?
                $image : Storage::disk('public')->url($image)
        );
    }
}
