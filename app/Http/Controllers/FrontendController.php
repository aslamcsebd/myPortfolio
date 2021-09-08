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
use App\Models\Education;
use App\Models\Experience;
use App\Models\Work;
use App\Models\ContactEmail;
use App\Models\Contact;


class FrontendController extends Controller{
   
   public function index(){
      $data['profilePicture'] = ProfilePicture::where('status', 1)->orderBy('orderBy')->first();
      $data['SocialSite'] = SocialSite::where('status', 1)->orderBy('orderBy')->get();
      
      $data['Home'] = Home::where('status', 1)->orderBy('orderBy')->get();

      $data['aboutMe'] = AnyTitle::where('title', 'aboutMe')->first();

      $data['Service'] = Service::where('status', 1)->orderBy('orderBy')->get();

      $data['aboutSkill'] = AnyTitle::where('title', 'aboutSkill')->first();
      $data['Skill'] = Skill::where('status', 1)->orderBy('orderBy')->get();

      $data['Education'] = Education::where('status', 1)->orderBy('orderBy')->get();
      
      $data['Experience'] = Experience::where('status', 1)->orderBy('orderBy')->get();

      $data['Work'] = Work::where('status', 1)->orderBy('orderBy')->get();
      
      $data['Contact'] = Contact::where('status', 1)->orderBy('orderBy')->get();
      return view('frontend.index', $data);
   }
}
