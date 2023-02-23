<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {

        //dd(User::where('name', 'LIKE', "%{$request->search}%")->toSql());
        //$users = User::get();
        //$users = User::where('name', 'LIKE', "%{$request->search}%")->get();
        $search = $request->search;
        $users = User::where(function ($query) use ($search){
            if($search){
                $query->where('email', $search );
                $query->orWhere('name', 'like', "%{$search}%" );

            }
        })->get();

        //return view('users.index', ['users' => $users]);
        return view('users.index', compact('users'));
    }

    public function show($id){
        //$user = User::where('id', $id)->first();
        if(!$user = User::find($id)){
            return redirect()->route('users.index');
        }
        return view('users.show', compact('user'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        // $user = new User();
        // $user->name = $request->get('name');
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();


        //User::create($request->all());
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);

        return redirect()->route('users.index');
        //return redirect()->route('users.show', $user->id);
    }

    public function edit($id)
    {
        if(!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if(!$user = User::find($id))
            return redirect()->route('users.index');

        // $user->name = $request->name;
        // $user->email = $request->get('email');
        // $user->save();

        $data = $request->only(['name', 'email']);
        //verifica se o usuário informou senha
        if($request->password)
            $data['password'] = bcrypt($request->password);

        $user->update($data);
        return redirect()->route('users.index');
    }

    public function delete($id){
        if($user = User::find($id)){
            $user->delete($id);
        }
        return redirect()->route('users.index');
    }
}
