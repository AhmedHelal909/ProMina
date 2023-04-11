<?php

namespace App\Http\Middleware;

use App\CustomClass\response;
use Closure;

use Exception;
use Illuminate\Support\Facades\Config;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class authenticateEmployee
{
    
    public function handle($request, Closure $next)
    {
        if($request->type !=null){
            Config::set('auth.guards.customer.driver','session');
            Config::set('auth.guards.employee.driver','session');
        }else {

            try {
                if (! $customer = auth('employee')->user()) {
                    return response::falid('user_not_found', 404);
                }

            } catch (TokenExpiredException $e) {

                return response::falid('token_expired', 400);

        } catch (TokenInvalidException $e) {

            return response::falid('token_invalid', 400);
            
        } catch (JWTException $e) {

            return response::falid('token_absent', 400);
        }
    }
        return $next($request);
    }
}
