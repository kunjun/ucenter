<?php
namespace App\Http\Controllers\Oauth;

use App\Http\Controllers\Controller;
use Authorizer;
use Auth;
use Illuminate\Http\Request;
use EasyWeChat\Foundation\Application;

class OauthController extends Controller
{
    public function getAuthorize(Application $wechat)
    {
        $wechat->oauth->redirect();
        $authParams = Authorizer::getAuthCodeRequestParams();
        $formParams = array_except($authParams,'client');
        $formParams['client_id'] = $authParams['client']->getId();
        $formParams['scope'] = implode(config('oauth2.scope_delimiter'), array_map(function ($scope) {
            return $scope->getId();
        }, $authParams['scopes']));

       return view('oauth.authorize', ['params' => $formParams, 'client' => $authParams['client']]);
    }
}
