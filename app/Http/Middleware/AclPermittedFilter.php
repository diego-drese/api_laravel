<?php namespace App\Http\Middleware;

use Closure;
use LucaDegasperi\OAuth2Server\Authorizer;
use Illuminate\Http\RedirectResponse;
use App\AclPermission;

class AclPermittedFilter {

    public function __construct(Authorizer $authorizer){
        $this->authorizer = $authorizer;
    }
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next){
        $authorizer     = $this->authorizer;
        $user_id        = $authorizer->getResourceOwnerId(); // the token user_id

        if(!AclPermission::isPermition($user_id, $request->getPathInfo())){
            return response()->json(['errorDesc'=>"not Allowed permition"]);
        }

        return $next($request);

	}


}
