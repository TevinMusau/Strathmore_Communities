<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
class CheckDisabled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = Auth::user()->id;
        $user = new User;
        if ($user->checkDisabled($id)==TRUE) {
            return $next($request);
        } else {
            return redirect('users/'.strval($id))
            ->with('danger','Your Account has been disabled. Kindly contact SCommunities@gmail.com for further assistance');
            //->with('danger','Your Account has been disabled. Kindly contact SCommunities@gmail.com for further assistance');
        }
        
    }
}
