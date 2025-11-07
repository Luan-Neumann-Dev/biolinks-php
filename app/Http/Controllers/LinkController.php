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

    }

    public function update(UpdateLinkRequest $request, Link $link)
    {

    }

    public function destroy(Link $link)
    {

    }
}
