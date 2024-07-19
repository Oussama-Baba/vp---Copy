<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Termwind\Components\Ul;


class UserController extends Controller
{
    public function index(){
        $users = User::latest()->paginate(5);
        return view('admincontent.table.user', compact('users'));
    }

    public function show(string $id): view
    {
        $user = User::findOrFail($id);
        return view('admincontent.showcart.usercart', compact('user'));
    }
    public function create()
    {
        return view('admincontent.form.userform');
    }

    public function store(UserRequest $request)
    {
         $formfield = $request->validated();
         $user = User::create($formfield);
         return redirect()->route('User.index')->with('success', 'Vos données ont été créées avec succès.');
     }


     public function edit(string $id)
     {
        $user = User::findOrFail($id);
         return view('admincontent.form.updateform', compact('user'));
     }

     public function update(UserRequest $request, User $user)
     {
         $formfield = $request->validated();

         if ($request->has('password')) {
             $formfield['password'] = Hash::make($request->password);
         }
         $user->fill($formfield)->save();
         return redirect()->route('User.index')->with('success', 'Vos données ont été mises à jour avec succès.');
     }


    }


