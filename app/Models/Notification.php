<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model {
    protected $fillable = ['user_id', 'message', 'is_read'];

    public function user() {
        return $this->belongsTo( User::class );
    }
}
