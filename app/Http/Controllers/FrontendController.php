<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\ProfilePicture;
use App\Models\SocialSite;

class FrontendController extends Controller{
   
   public function index(){
      $data['profilePicture'] = ProfilePicture::where('status', 1)->first();
      $data['SocialSite'] = SocialSite::all();

      return view('frontend.index', $data);
   }
}
