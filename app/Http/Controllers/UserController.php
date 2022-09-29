<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(15);
        $access = Auth::id() == config('app.admin');

        return view('pages.users', compact(['users', 'access']));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('pages.users_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|min:10',
            'password' => 'required|min:6|alpha',
            'photo' => 'required|image'
        ]);
        dd($data);

        $user = User::where('email', $request->input('email'))->first();
        if($user)
        {
            return redirect()->back()->with('message', 'Email already exists');
        }

        User::create($data);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('pages.users_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        if(Auth::id() == $id){
            return redirect()->route('users.index')->with('message', 'Delete error');
        }

        $user = User::find($id);
        if(!$user) {
            return redirect()->route('users.index');
        }

        $numProjects = $user->tasks()->count();
        $message = 'Користувача' . $user->name .'було вилучено з ' . $numProjects . ' задач та повністю видалено';
        $user->delete();

        return redirect()->route('users.index')->with('message', $message);
    }

    public function location(Request $request)
    {
        dump($_SERVER);
        dd($request->ip());

    }
}
