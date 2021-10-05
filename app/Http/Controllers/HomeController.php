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

class HomeController extends Controller{
    
   public function __construct(){
     $this->middleware('auth');
   }

   public function admin(){
     return view('backend.index');
   }

   public function index(Request $request){
      $data['profilePicture'] = ProfilePicture::all();
      $data['SocialSite'] = SocialSite::all();
      
      $data['Home'] = Home::all();

      $data['aboutMe'] = AnyTitle::all();

      $data['Service'] = Service::all();

      $data['aboutSkill'] = AnyTitle::all();
      $data['Skill'] = Skill::all();

      $data['Education'] = Education::all();
      
      $data['Experience'] = Experience::all();

      $data['Work'] = Work::all();
      
      $data['Contact'] = Contact::all();
      $data['ContactEmail'] = ContactEmail::all();
   
      return view('backend.index', $data);
   }
   
   public function project(Request $request){
      $data['profilePicture'] = ProfilePicture::where('status', 1)->orderBy('orderBy')->first();
      $data['SocialSite'] = SocialSite::where('status', 1)->orderBy('orderBy')->get();
      $data['Work'] = Work::where('status', 1)->orderBy('orderBy')->get();
      
      return view('frontend.project', $data);
   }
   
}
