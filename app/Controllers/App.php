<?php

namespace App\Controllers;

class App extends BaseController
{
    /**
     * This controller is now only for simple/static pages.
     * The `index()` method has been moved to Form.php.
     * The `submissions()`, `handleLogin()`, and `logout()` methods
     * have been moved to Submissions.php.
     */
    public function about()
    {
        $data = ['activePage' => 'about'];
        return view('about', $data);
    }
}