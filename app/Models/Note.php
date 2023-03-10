<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "title", "body"];

    // RELATION TO USER
    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }
}
