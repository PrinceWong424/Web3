<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PW extends Model
{
    protected $table = 'PWs';

    protected $fillable = [
        'id','Title', 'Text', 'Picfile','author'
    ];
    //
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    public function comments(){
        return $this->hasMany('App\Comment','article_id');
    }
}
