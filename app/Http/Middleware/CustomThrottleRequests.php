<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Exceptions\ThrottleRequestsException;


class CustomThrottleMiddleware
{
    public function handle($request, Closure $next, $maxAttempts = 60, $decayMinutes = 1)
    {
        $key = $this->resolveRequestSignature($request);

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            $retryAfter = RateLimiter::availableIn($key);

            return response()->json([
                'message' => 'Too many requests. Please try again later.',
                'retry_after' => $retryAfter,
            ], 429);
        }

        RateLimiter::hit($key, $decayMinutes * 60);

        $response = $next($request);

        $this->addHeaders(
            $response, $maxAttempts,
            RateLimiter::retriesLeft($key, $maxAttempts),
            RateLimiter::availableIn($key)
        );

        return $response;
    }

    protected function resolveRequestSignature($request)
    {
        if ($user = $request->user()) {
            return sha1($user->getAuthIdentifier());
        }

        return sha1($request->ip());
    }

    protected function addHeaders($response, $maxAttempts, $remainingAttempts, $retryAfter)
    {
        $response->headers->add([
            'X-RateLimit-Limit' => $maxAttempts,
            'X-RateLimit-Remaining' => $remainingAttempts,
            'Retry-After' => $retryAfter,
        ]);
    }
}
