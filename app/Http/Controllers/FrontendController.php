<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\AnyTitle;
use App\Models\ProfilePicture;
use App\Models\SocialSite;
use App\Models\Home;
use App\Models\About;
use App\Models\Service;
use App\Models\Skill;

class FrontendController extends Controller{
   
   public function index(){
      $data['profilePicture'] = ProfilePicture::where('status', 1)->first();
      $data['SocialSite'] = SocialSite::all();
      $data['Home'] = Home::where('status', 1)->get();
      $data['aboutMe'] = AnyTitle::where('title', 'aboutMe')->first();
      $data['Service'] = Service::where('status', 1)->get();

      $data['aboutSkill'] = AnyTitle::where('title', 'aboutSkill')->first();
      $data['Skill'] = Skill::where('status', 1)->get();
      return view('frontend.index', $data);
   }
}
