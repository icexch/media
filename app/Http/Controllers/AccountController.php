<?php namespace App\Http\Controllers;


use App\Http\Requests\AccountUpdateRequest;
use App\Models\User\User;

class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('pages.profile.index');
    }

    /**
     * @param AccountUpdateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AccountUpdateRequest $request)
    {
        /** @var User $user */
        $user = auth()->user();

        $userData = $request->only(['name', 'email', 'password']);

        if(!$request->input('password')) {
            $userData = $request->except(['password']);
        }

        $user->fill($userData)->save();
        $user->profile()->update($request->get('profile'));

        return redirect()->back();
    }
}
