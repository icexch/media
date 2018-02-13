<?php namespace App\Http\Controllers;


use App\Http\Requests\AccountUpdateRequest;

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
        $user = auth()->user();
        $user->update($request->only(['name', 'email']));
        $user->profile()->update($request->get('profile'));

        return redirect()->back();
    }
}
