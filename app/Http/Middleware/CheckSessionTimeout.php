<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Session\Store;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class CheckSessionTimeout
{
  protected $session;
  protected $timeout;

  public function __construct(Store $session)
  {
    $this->session = $session;
    $this->timeout = config('session.lifetime') * 60; // Session lifetime in seconds
  }

  public function handle($request, Closure $next)
  {
    if (!auth()->check()) {
      return $next($request);
    }

    // Check if the last activity timestamp exists in the session
    if ($this->session->has('lastActivityTime')) {
      $lastActivityTime = $this->session->get('lastActivityTime');

      // Log the user out if they have been inactive for too long
      if (time() - $lastActivityTime > $this->timeout) {
        auth()->logout();
        $this->session->flush();
        return redirect()->route('login')->with('timeout', 'Your session has timed out due to inactivity.');
      }
    }

    // Update the last activity timestamp in the session
    $this->session->put('lastActivityTime', time());

    return $next($request);
  }
}
