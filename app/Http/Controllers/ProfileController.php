<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        return view('profile', [
            'user' => auth()->user()
        ]);
    }

    public function update(ProfileRequest $request)
    {
        $user = auth()->user();

        $user->fill($request->validated())->save();

        return back()->with('message', 'Perfil atualizado com sucesso!');
    }
}
