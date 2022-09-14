<?php

namespace App\Models;

use App\Actions\GetTeamsFromTitle;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameVideo extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    use HasFactory;

    public function teams(): Attribute
    {
        return Attribute::make(
            get: fn() => (new GetTeamsFromTitle())($this->title),
        );
    }
}
