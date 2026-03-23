<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ThrottleLoginAttempts
{
    protected $limiter;

    public function __construct(RateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    public function handle(Request $request, Closure $next, $maxAttempts = 5, $decayMinutes = 15): Response
    {
        $key = $this->resolveRequestSignature($request);

        if ($this->limiter->tooManyAttempts($key, $maxAttempts)) {
            return $this->buildResponse($request, $key);
        }

        $this->limiter->hit($key, $decayMinutes * 60);

        $response = $next($request);

        return $response;
    }

    protected function resolveRequestSignature(Request $request): string
    {
        return sha1(
            $request->ip() . '|' . $request->input('email')
        );
    }

    protected function buildResponse(Request $request, string $key): Response
    {
        $seconds = $this->limiter->availableIn($key);

        return back()->withErrors([
            'email' => "Too many login attempts. Please try again in {$seconds} seconds.",
        ])->withInput($request->only('email'));
    }
}
