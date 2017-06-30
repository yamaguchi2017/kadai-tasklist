<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;   // 2017/06/29 追加

class task extends Model
{
    protected $fillable = ['content','status', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
