<?php

namespace JSefton\MailingList\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JSefton\MailingList\Models\MailingList;
use JSefton\MailingList\Models\MailingListEmail;

class MailingListController extends Controller
{
    public function subscribe(Request $request, MailingList $mailingList)
    {
        $data = MailingListEmail::map($request->all());
        $data['mailing_list_id'] = $mailingList->id;
        $user = MailingListEmail::updateOrCreate(
            ['mailing_list_id' => $mailingList->id, 'email' => $data['email']],
            $data
        );

        return response()->json(['status' => true, 'contact' => $user]);
    }
}
