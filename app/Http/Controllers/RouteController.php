<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class RouteController extends Controller
{

    public function inSession(): bool {
        return Session::get('email') ? true : false;
    }

    public function getLinkController(): LinkController {
        return new LinkController();
    }

    public function renderHomePage() {
        return $this->renderShortenPage();
    }

    public function renderShortenPage() {
        if (!$this->inSession()) {
            return redirect(route('Login'));
        }

        return view('shorten.index');
    }

    public function renderLoginPage() {
        return view('login.index');
    }

    public function renderRegisterPage() {
        return view('register.index');
    }

    public function renderMyPage() {
        if (!$this->inSession()) {
            return redirect(route('Login'));
        }

        return view('shorten.links', [
            'links' => $this->getLinkController()->getAllLinks()
        ]);
    }

    public function redirectPage($unicode) {
        $data = $this->getLinkController()->getLinkByUnicode($unicode);

        if ($data == null) {
            return abort(404);
        }

        return redirect($data->link);
    }

}
