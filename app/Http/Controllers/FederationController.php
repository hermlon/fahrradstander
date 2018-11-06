<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Webfinger;
use App\Util\Nickname;
use App\Bike;

class FederationController extends Controller
{
    public function webfinger(Request $request)
    {
      dd('success');
      $this->validate($request, ['resource'=>'required|string|min:3|max:255']);

      $resource = $request->input('resource');
      $parsed = Nickname::normalizeProfileUrl($resource);
      $username = $parsed['username'];
      $bike = Bike::whereId($username)->firstOrFail();
      return new Webfinger($bike);
    }
}
