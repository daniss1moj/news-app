<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Profile;
use App\Services\AuthService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{


    public function __construct(public AuthService $authService)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $news = News::with('images')->paginate(3);
        return view('profile.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $profile = auth()->user()->profile;
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'gender' => 'required|string',
            'avatar' => 'nullable|mimes:jpg,png,jpeg|max:5000'
        ],
            [
                'avatar.mimes' => 'The file should be jpg, png format!'
            ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $path = $file->store('images', 'public');
            $data['avatar'] = $path;
        }

        $request->user()->profile()->update($data);

        return redirect()->route('profile.show')->with('success', 'Profile was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        auth()->user()->profile()->delete();

        $this->authService->logout();

        return redirect()->route('auth.login');
    }
}
