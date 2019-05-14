<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function send(Request $message)
    {
        $data = $message->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'body' => 'required'
        ]);
        $job = (new SendEmail($data));
        dispatch($job);

        \Session::flash('message', __('Your message has been sent. Please allow 24-48 hours for a reply. Have a wonderful day!'));
        \Session::flash('title', sprintf('Thank you %s', $data['name']));

        return back();
    }
}
