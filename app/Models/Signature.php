<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    protected $fillable = ['user_id', 'signature_name', 'image_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
