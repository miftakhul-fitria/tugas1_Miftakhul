<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
	public function send()
	{
		Mail::to("user1@biodata-mahasiswa.com")->send(new WelcomeEmail());

		return response()->json("Email send successfully!");
	}
}
