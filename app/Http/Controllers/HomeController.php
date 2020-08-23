<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMessage;
use App\User;
use App\Models\Message;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }
    public function message()
    {
        $users = User::all()->where('id', '!=', Auth::user()->id);

        return view('message.liste', compact('users'));
    }

    public function showMessage($id) {
        $from = Auth::user()->id;
        $users = User::all()->where('id', '!=', $from);
        $user = User::findOrFail($id);
        $msg = Message::whereRaw("(from_id = $from AND to_id = $id) OR (from_id = $id AND to_id = $from)")->orderBy('created_at', 'DESC')->get()->reverse();
        return view('message.show', compact('users', 'user', 'msg'));
    }

    public function storeMessage($id, StoreMessage $request) {
        Message::create([
            'content' => $request->content,
            'from_id' => Auth::user()->id,
            'to_id' => $id,

        ]);
        return redirect(route('showM', ['id' => $id]));
    }
}
