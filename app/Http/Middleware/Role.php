<?php namespace App\Http\Middleware;

use App\Models\User\User;
use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param array   ...$roles
     *
     * @return Closure
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        if (
            ($user->isModerator() && in_array(User::MODERATOR_SLUG, $roles))
            || ($user->isAdvertiser() && in_array(User::ADVERTISER_SLUG, $roles))
            || ($user->isPublisher() && in_array(User::PUBLISHER_SLUG, $roles))
        ) {
            return $next($request);
        }

        if ($user->isModerator()) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->isAdvertiser()) {
            return redirect()->route('advertiser.dashboard');
        }

        if ($user->isPublisher()) {
            return redirect()->route('publisher.dashboard');
        }

        return abort(403);
    }
}
