<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;

class LinkController extends Controller
{
    public function create()
    {
        return view('links.create');
    }

    public function store(StoreLinkRequest $request)
    {
        $user = auth()->user();

        $user->links()->create($request->validated());

        return to_route('dashboard');
    }

    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    public function update(UpdateLinkRequest $request, Link $link)
    {
        $link->fill($request->validated())->save();
        return to_route('dashboard')
            ->with('message', 'Link atualizado com sucesso.');
    }

    public function destroy(Link $link)
    {
        $link->delete();

        return to_route('dashboard')->with('message', 'Link deletado com sucesso.');
    }

    public function up(Link $link){
        $order = $link->sort;
        $newOrder = $order - 1;

        $user = auth()->user();

        $swapWith = $user->links()->where('sort', $newOrder)->first();

        $link->update(['sort' => $newOrder]);
        $swapWith->update(['sort' => $order]);

        return back();
    }

    public function down(Link $link){
        $order = $link->sort;
        $newOrder = $order + 1;

        $user = auth()->user();

        $swapWith = $user->links()->where('sort', $newOrder)->first();

        $link->update(['sort' => $newOrder]);
        $swapWith->update(['sort' => $order]);

        return back();
    }
}
