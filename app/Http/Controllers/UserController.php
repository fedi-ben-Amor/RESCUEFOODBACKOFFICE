<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
        public function index($role) 
        {
            $users = User::where('role', $role)->get();
            
            return view('Dashboard-Admin.UserList', compact('users', 'role'));
        }
        public function edit($id)
        {
            $user = User::findOrFail($id);
            return view('Dashboard-Admin.UserList', compact('user'));
        }
    
        // Mettre à jour un utilisateur
        public function update(Request $request, $id)
        {
            $user = User::findOrFail($id);
            $user->update($request->all());
            return redirect()->route('Dashboard-Admin.UserList')->with('success', 'Utilisateur mis à jour avec succès');
        }
    
        // Supprimer un utilisateur
        public function destroy($id)
        {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->back()->with('success', 'Utilisateur supprimé avec succès');
        }
}