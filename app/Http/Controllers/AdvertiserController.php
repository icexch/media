<?php namespace App\Http\Controllers;

use App\Http\Requests\AdMaterialCreateRequest;
use App\Http\Requests\AdvertiserUpdateProfileRequest;
use App\Models\AdMaterial;
use App\Models\AdType;
use App\Models\Category;
use App\Models\Region;

class AdvertiserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ads()
    {
        $adMaterials = AdMaterial::where('user_id', auth()->user()->id)->get();

        return view('pages.ads.index', compact('adMaterials'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createAd()
    {
        $adTypes = AdType::all();
        $regions = Region::all();
        $categories = Category::all();

        return view('pages.ads.create', compact('adTypes', 'regions', 'categories'));
    }

    /**
     * @param AdMaterialCreateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeAd(AdMaterialCreateRequest $request)
    {
        $adMaterial = (new AdMaterial())->fill($request->all());
        $adMaterial->user_id = $request->user()->id;
        $adMaterial->is_active = 0;

        $adMaterial->save();

        return redirect()->route('advertiser.ads');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProfile()
    {
        return view('pages.profile.advertiser.index');
    }

    /**
     * @param AdvertiserUpdateProfileRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(AdvertiserUpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user->update($request->only(['name', 'email']));
        $user->profile()->update($request->get('profile'));

        return redirect()->back();
    }
}
