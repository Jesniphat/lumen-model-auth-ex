<?php
use Illuminate\Database\Eloquent\Builder;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
  return $router->app->version();
});

$router->get('/api/get-submit', [
  'uses' => 'ExampleController@first'
]);

$router->post(
  'auth/login', 
  [
    'uses' => 'AuthController@authenticate'
  ]
);

$router->group(
  ['middleware' => ['jwt.auth', 'role:admin']], 
  function() use ($router) {
    $router->get('users', function() {
      $users = \App\User::with(['role:id,role', 'profiles:id,name,lastname,user_id'])->get();
      $just = \App\User::get();
      $role  = \App\Role::with('users')->get();
      return response()->json([
        'users' => $users,
        'just_users' => $just,
        'role' => $role,
      ]);
    });
  }
);
