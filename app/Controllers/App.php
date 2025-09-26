<?php

namespace App\Controllers;

class App extends BaseController
{
  public function index()
  {
    $data = ['activePage' => 'form'];
    return view('form', $data);
  }

  public function about()
  {
    $data = ['activePage' => 'about'];
    return view('about', $data);
  }

  public function submissions()
  {
    $data = ['activePage' => 'submissions'];

    // We'll replace this with a real database call later
    // For now, we continue using LocalStorage on the client side
    // to show how the view logic works. A full implementation
    // would fetch this data from a database.
    $data['submissions'] = []; // Pass an empty array for now

    return view('submissions', $data);
  }

  public function handleLogin()
  {
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    if ($username === 'admin' && $password === 'password') {
      session()->set('isLoggedIn', true);
      return redirect()->to('/submissions');
    }

    return redirect()->back()->with('error', 'Invalid username or password.');
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to('/submissions');
  }

  // This is where you would handle the form submission
  public function submitForm()
  {
    // Here you would get data, validate it, and save it to a database.
    // For example:
    // $name = $this->request->getPost('fullName');
    // $email = $this->request->getPost('email');
    // ... save to database ...

    // After saving, redirect the user back to the form with a success message.
    return redirect()->to('/')->with('success', 'Form submitted successfully!');
  }
}