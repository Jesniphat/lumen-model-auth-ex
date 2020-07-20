<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\User;

class RoleMiddleware {
  const DELIMITER = '|';

  public function handle($request, Closure $next, $roles = '') {
    if (!is_array($roles)) {
			$roles = explode(self::DELIMITER, $roles);
    }

    $roleName = $request->auth->role['role'];
    if (!in_array($roleName, $roles)) {
      return response()->json([
				'error' => 'Access denied.'
			], 403);
    }

    return $next($request);
  }
}