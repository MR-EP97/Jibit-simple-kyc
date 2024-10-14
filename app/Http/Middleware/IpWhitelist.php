<?php

namespace App\Http\Middleware;

use App\Traits\JsonResponseTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class IpWhitelist
{
    use JsonResponseTrait;

//    protected array $ips = [];

    public function __construct(protected array $ips = [])
    {

        $this->ips = config('ips.white_list');
    }

    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $clientIp = $request->ip();
        if (!in_array($clientIp, $this->ips, true)) {
            return $this->error(
                'Access denied',
                code: HttpResponse::HTTP_FORBIDDEN
            );
        }
        return $next($request);
    }
}
