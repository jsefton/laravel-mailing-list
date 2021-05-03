<?php

namespace JSefton\MailingList\Models;

use Illuminate\Database\Eloquent\Model;
use JSefton\VirtualFields\VirtualFields;

class MailingListEmail extends Model
{
    use VirtualFields;

    protected $fillable = [
        'mailing_list_id',
        'email',
        'first_name',
        'last_name',
        'source',
        'subscribed',
        'data'
    ];

    public function mailingList()
    {
        return $this->belongsTo(MailingList::class);
    }

    public static function map($data)
    {
        if (isset($data['name'])) {
            $array = explode(' ', $data['name']);
            $data['first_name'] = $array[0];
            unset($array[0]);
            if (count($array) > 0) {
                $data['last_name'] = implode(' ', $array);
            }
        }

        return $data;
    }
}
