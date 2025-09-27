<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BiodataModel; // We need the model to fetch data

class Submissions extends BaseController
{
    /**
     * Displays the submissions page.
     * It checks if the user is logged in. If not, it shows the login form.
     * If logged in, it fetches all biodata from the database and shows the table.
     */
    public function index()
    {
        $data = ['activePage' => 'submissions'];

        // Only fetch data if the user is logged in
        if (session()->get('isLoggedIn')) {
            $model = new BiodataModel();
            // Fetch all submissions, newest first
            $data['submissions'] = $model->orderBy('id', 'DESC')->findAll();
        }

        return view('submissions', $data);
    }

    /**
     * Handles the login form submission.
     */
    public function handleLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // IMPORTANT: In a real app, you would check against a user in the database.
        // This is just a simple example.
        if ($username === 'admin' && $password === 'password') {
            session()->set('isLoggedIn', true);
            return redirect()->to('/submissions');
        }

        return redirect()->back()->with('error', 'Invalid username or password.');
    }

    /**
     * Logs the user out by destroying the session.
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/submissions');
    }
}