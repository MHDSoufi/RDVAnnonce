<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model
{
    protected $fillable = [
        'from_id', 'to_id', 'content', 'read_at', 'created_at'
    ];

    public $timestamps = false;

    protected $date = ['created_at', 'read_at'];

    public function from(){
    	return $this->belongsTo(User::class, 'from_id');
    }

}
