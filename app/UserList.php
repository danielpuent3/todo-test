<?php

namespace Todo;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{

    protected $table = 'lists';

    protected $fillable = [
        'user_id', 'name'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'list_id');
    }
}
