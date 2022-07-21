<?php

namespace App\Http\Controllers;

use App\Events\PostMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;

class PostController extends Controller
{
    //
    public function sendMessage()
    {
        $message = new Message();
        $message->message = Random::generate(20);
        $message->user_id = auth()->id();
        $message->save();

        event(new PostMessage($message));

        return redirect('/message');
    }
}
