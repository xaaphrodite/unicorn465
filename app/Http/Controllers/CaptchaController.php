<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CaptchaController extends Controller
{
    public function Index()
    {
        $md5 = md5(uniqid(rand(), true));
        $captcha = substr($md5, 0, 5);
        Session::put('unicorn465_captcha', $captcha);
        return view('unicorn465', compact('captcha'));
    }

    public function Compare(Request $request)
    {
        $user_captcha = $request->get('user_captcha');
        $unicorn465_captcha = Session::get('unicorn465_captcha');
        if ($user_captcha == $unicorn465_captcha) {
            Session::forget('unicorn465_captcha');
            Session::put('unicorn465_captcha_key', $unicorn465_captcha);
            Cookie::queue('unicorn465_captcha_key', $unicorn465_captcha, 60);
            return dd(Cookie::get('unicorn465_captcha_key'));
        } else {
            return redirect('/')->with('unicorn465_captcha_error', 'Bring your eyes closer');
        }
    }
}
