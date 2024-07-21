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
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $query->where('name', 'LIKE', "%{$request->search}%")
                  ->orWhere('email', 'LIKE', "%{$request->search}%")
                  ->orWhere('telephone', 'LIKE', "%{$request->search}%")
                  ->orWhere('role', 'LIKE', "%{$request->search}%");
        }

        $users = $query->latest()->paginate(5);

        return view('admincontent.table.user', compact('users'));
    }

    public function show(string $id): view
    {
        $user = User::findOrFail($id);
        return view('admincontent.showcart.usercart', compact('user'));
    }
    public function create()
    {
        return view('admincontent.form.user_form');
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
         return view('admincontent.form.user_updat_form', compact('user'));
     }

     public function update(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $formfield = $request->validated();

        if ($request->filled('password')) {
            $formfield['password'] = Hash::make($request->password);
        } else {
            unset($formfield['password']);
        }
        $user->update($formfield);

        return redirect()->route('User.index')->with('success', 'Vos données ont été mises à jour avec succès.');
    }
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('User.index')->with('success', 'Utilisateur supprimé avec succès.');
    }


    }


