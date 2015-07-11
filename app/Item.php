<?php

namespace Todo;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = ['list_id', 'name'];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function _list()
    {
        return $this->belongsTo(UserList::class);
    }
}
