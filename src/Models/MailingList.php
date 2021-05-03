<?php

namespace JSefton\MailingList\Models;

use Illuminate\Database\Eloquent\Model;
use JSefton\VirtualFields\VirtualFields;

class MailingList extends Model
{
    use VirtualFields;

    protected $fillable = [
        'name',
        'data'
    ];

    public function emails()
    {
        return $this->hasMany(MailingListEmail::class);
    }
}
