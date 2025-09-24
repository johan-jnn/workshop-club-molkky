<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|email|max:255',
      'message' => 'required|string',
    ]);

    ContactMessage::create($validated);
    return redirect('/contact')->with('success', 'Votre message a été envoyé avec succès !');
  }
}