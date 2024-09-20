<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roster;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RosterStoreRequest;
use App\Http\Requests\RosterUpdateRequest;
use Illuminate\Support\Carbon;

class RosterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Roster::class);

        $search = $request->get('search', '');

        $rosters = Roster::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('rosters.index', compact('rosters', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Roster::class);

        $users = User::pluck('name', 'id');

        return view('rosters.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RosterStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Roster::class);

        $validated = $request->validated();

        $roster = Roster::create($validated);

        return redirect()
            ->route('rosters.index', $roster)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Roster $roster): View
    {
        $this->authorize('view', $roster);

        return view('rosters.show', compact('roster'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Roster $roster): View
    {
        $this->authorize('update', $roster);

        $users = User::pluck('name', 'id');

        return view('rosters.edit', compact('roster', 'users'));
    }

    /**
     * Display the duty roster timetable.
     */
    public function timetable(Request $request): View
    {
        $this->authorize('view-any', Roster::class);

        $search = $request->get('search', '');

        $rosters = Roster::search($search)
            ->with('user')
            ->latest()
            ->get()
            ->groupBy(function ($roster) {
                return Carbon::parse($roster->day)->format('l');
            });

        return view('rosters.timetable', compact('rosters', 'search'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        RosterUpdateRequest $request,
        Roster $roster
    ): RedirectResponse {
        $this->authorize('update', $roster);

        $validated = $request->validated();

        $roster->update($validated);

        return redirect()
            ->route('rosters.index', $roster)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Roster $roster): RedirectResponse
    {
        $this->authorize('delete', $roster);

        $roster->delete();

        return redirect()
            ->route('rosters.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
