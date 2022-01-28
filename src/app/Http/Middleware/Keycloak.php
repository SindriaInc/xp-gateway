<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Http;
use App\Traits\Api;

class Keycloak
{
    use Api;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        try {
            $form = [];
            $form['client_id'] = env('AUTH_CLIENT_ID');
            $form['client_secret'] = env('AUTH_CLIENT_SECRET');

            $token = NULL;
            $value = NULL;

            if ($request->headers->has('authorization')) {
                $token = $request->header('authorization');
            }

            // Extract only token value without Bearer
            if (strpos($token, 'Bearer ') !== false) {
                $value = substr($token, strlen('Bearer '));
            }

            $form['token'] = $value;

            $url = env('AUTH_SERVICE').'/auth/realms/'.env('AUTH_REALM').'/protocol/openid-connect/token/introspect';

            $response = Http::asForm()->post($url, $form);
            $result = $response->body();
            $resource = json_decode($result);

            if (isset($resource->error)) {
                return $this->sendError('Unauthorized', 401, $resource);
            }

            if (isset($resource->active)) {
                if (!$resource->active) {
                    return $this->sendError('Forbidden', 403);
                }
            }

        } catch (\Exception $e) {
            return $this->sendError('Internal Server Error', 500, array($e));
        }

        return $next($request);
    }
}