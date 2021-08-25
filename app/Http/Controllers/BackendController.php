<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use Validator;
use Redirect;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\AnyTitle;
use App\Models\ProfilePicture;
use App\Models\SocialSite;
use App\Models\Home;
use App\Models\About;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Contact;
use App\Models\ContactType;

class BackendController extends Controller {
	
//left
	public function left(){
      $data['ProfilePicture'] = ProfilePicture::all();
      $data['SocialSite'] = SocialSite::all();
      return view('backend.pages.left', $data);
   }

   public function addPicture(Request $request){
      $validator = Validator::make($request->all(),[
         'image'=>'required'
      ]);

      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }

      $path="profilePicture/";
      if ($request->hasFile('image')){
         if($files=$request->file('image')){
            $picture = $request->image;
            $fullName=time().".".$picture->getClientOriginalExtension();
            $files->move(imagePath($path), $fullName);
            $imageLink = imagePath($path). $fullName;

            ProfilePicture::insert([
               'image'=>$imageLink,
               'status'=>1,
               'created_at' => Carbon::now()
            ]);
         }
         return back()->with('success','Image add successfully');
      }else{
         return back()->with('fail','Sorry! Image add Fail..');
      }     
   }

   public function addSocialSite(Request $request){
      $validator = Validator::make($request->all(),[
         'socialLogo'=>'required|unique:social_sites,socialLogo',
         'socialName'=>'required|unique:social_sites,socialName',
         'socialUrl'=>'required|unique:social_sites,socialUrl'
      ]);

      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }
         
      SocialSite::insert([
         'socialLogo'=>$request->socialLogo,
         'socialName'=>$request->socialName,
         'socialUrl'=>$request->socialUrl,
         'status'=>1,
         'created_at' => Carbon::now()
      ]);      
      return back()->with('success','Social site add successfully')->withInput(['tab' => 'socialSite']);
   }

   public function editSocialSite(Request $request){
      $validator = Validator::make($request->all(),[
         'socialName'=>'required|unique:social_sites,socialName',
         'socialUrl'=>'required|unique:social_sites,socialUrl'
      ]);

      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator)->withInput(['tab' => $request->tab]);
      }

      SocialSite::where('id', $request->id)->update([
         'socialName'=>$request->socialName,
         'socialUrl'=>$request->socialUrl
      ]);
      return back()->with('success','Social site edit successfully')->withInput(['tab' => $request->tab]);
   }
   
// Home
   public function home(){
      $data['Home'] = Home::all();
      return view('backend.pages.home', $data);
   }

   public function addHome(Request $request){
      $validator = Validator::make($request->all(),[
         'image'=>'required',
         'firstTitle'=>'required',
         'secondTitle'=>'required'
      ]);

      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }

      $path="home/";
      if ($request->hasFile('image')){
         if($files=$request->file('image')){
            $picture = $request->image;
            $fullName=time().".".$picture->getClientOriginalExtension();
            $files->move(imagePath($path), $fullName);
            $imageLink = imagePath($path). $fullName;

            Home::insert([
               'image'=>$imageLink,
               'firstTitle'=>$request->firstTitle,
               'secondTitle'=>$request->secondTitle,
               'status'=>1,
               'created_at' => Carbon::now()
            ]);
         }
         return back()->with('success','Homes\'s image add successfully');
      }else{
         return back()->with('fail','Sorry! Homes\'s image add fail..');
      }     
   }

   public function editHome(){
      $data['Home'] = Home::find($_REQUEST['id']);
      return view('backend.pages.ajaxView', $data);
   }

   public function editHome2(Request $request){
      $validator = Validator::make($request->all(),[
         'firstTitle'=>'required',
         'secondTitle'=>'required'
      ]);

      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }
      $path="home/";
      if ($request->hasFile('image')){
         if($files=$request->file('image')){
            $picture = $request->image;
            $fullName=time().".".$picture->getClientOriginalExtension();
            $files->move(imagePath($path), $fullName);
            $imageLink = imagePath($path). $fullName;

            Home::where('id', $request->id)->update([
               'image'=>$imageLink,
               'firstTitle'=>$request->firstTitle,
               'secondTitle'=>$request->secondTitle,
            ]);
            unlink($request->oldImage);
         }
      }else{
         Home::where('id', $request->id)->update([
            'firstTitle'=>$request->firstTitle,
            'secondTitle'=>$request->secondTitle,
         ]);
      }
      return back()->with('success','Homes\'s image edit successfully');
   }

// About
   public function about(){
      $data['AnyTitle'] = AnyTitle::where('title', 'aboutMe')->first();
      return view('backend.pages.about', $data);
   }

// Service
   public function services(){
      $data['Service'] = Service::all();
      return view('backend.pages.services', $data);
   }

   public function addService(Request $request){
      $validator = Validator::make($request->all(),[
         'title'=>'required',
         'logo'=>'required',
         'description'=>'required'
      ]);
      
      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }
      
      Service::insert([
         'title'=>$request->title,
         'logo'=>$request->logo,
         'description'=>$request->description,
         'status'=>1,
         'created_at' => Carbon::now()
      ]);
         
      return back()->with('success', 'Service add successfully'); 
   }

   public function editService(){
      $data['Service'] = Service::find($_REQUEST['id']);
      return view('backend.pages.ajaxView', $data);
   }

   public function editService2(Request $request){
      $validator = Validator::make($request->all(),[
         'title'=>'required',
         'logo'=>'required',
         'description'=>'required'
      ]);
      
      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }
      
      Service::where('id', $request->id)->update([
         'title'=>$request->title,
         'logo'=>$request->logo,
         'description'=>$request->description
      ]);
      return back()->with('success','Service edit successfully');
   }

//Skill
   public function skills(){
      $data['AnyTitle'] = AnyTitle::where('title', 'aboutSkill')->first();
      $data['Skill'] = Skill::orderBy('orderBy')->get();
      return view('backend.pages.skills', $data);
   }

   public function addSkill(Request $request){
      $validator = Validator::make($request->all(),[
         'title'=>'required',
         'range'=>'required'
      ]);
      
      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }
      
      $id=DB::table('skills')->latest()->first();
      ($id==null) ? $orderId=1 : $orderId=$id->orderBy+1;
      
      Skill::insert([
         'title'=>$request->title,
         'range'=>$request->range,
         'status'=>1,
         'orderBy'=>$orderId,
         'created_at' => Carbon::now()
      ]);         
      return back()->with('success', 'Skills add successfully');  
   }

   public function editSkill(Request $request){
      $validator = Validator::make($request->all(),[
         'title'=>'required',
         'range'=>'required'
      ]);
      
      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }
      
      Skill::where('id', $request->id)->update([
         'title'=>$request->title,
         'range'=>$request->range
      ]);         
      return back()->with('success', 'Skills update successfully');  
   }

// Education
   public function education(){
      $data['Education'] = Education::all();
      return view('backend.pages.education', $data);
   }

   public function addEducation(Request $request){
      $validator = Validator::make($request->all(),[
         'degree'=>'required',
         'date'=>'required',
         'description'=>'required'
      ]);

      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }
      
      Education::insert([
         'degree'=>$request->degree,
         'date'=>$request->date,
         'description'=>$request->description,
         'status'=>1,
         'created_at' => Carbon::now()
      ]);         
      return back()->with('success', 'Education add successfully');  
   }

   public function editEducation(){
      $data['Education'] = Education::find($_REQUEST['id']);
      return view('backend.pages.ajaxView', $data);
   }

   public function editEducation2(Request $request){
      $validator = Validator::make($request->all(),[
         'degree'=>'required',
         'date'=>'required',
         'description'=>'required'
      ]);

      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }

      Education::where('id', $request->id)->update([
         'degree'=>$request->degree,
         'date'=>$request->date,
         'description'=>$request->description
      ]);         
      return back()->with('success', 'Education update successfully');  
   }

// Experience
   public function experience(){
      $data['Experience'] = Experience::all();
      return view('backend.pages.experience', $data);
   }

   public function addExperience(Request $request){
      $validator = Validator::make($request->all(),[
         'experience'=>'required',
         'startDate'=>'required',
         'endDate'=>'required',
         'description'=>'required'
      ]);

      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }
      
      Experience::insert([
         'experience'=>$request->experience,
         'startDate'=>$request->startDate,
         'endDate'=>$request->endDate,
         'description'=>$request->description,
         'status'=>1,
         'created_at' => Carbon::now()
      ]);         
      return back()->with('success', 'Experience add successfully');  
   }

   public function editExperience(){
      $data['Experience'] = Experience::find($_REQUEST['id']);
      return view('backend.pages.ajaxView', $data);
   }

   public function editExperience2(Request $request){
      $validator = Validator::make($request->all(),[
         'experience'=>'required',
         'startDate'=>'required',
         'endDate'=>'required',
         'description'=>'required'
      ]);

      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }

      Experience::where('id', $request->id)->update([
         'experience'=>$request->experience,
         'startDate'=>$request->startDate,
         'endDate'=>$request->endDate,
         'description'=>$request->description
      ]);         
      return back()->with('success', 'Experience update successfully');  
   }

// Work
   public function work(){
      return view('backend.pages.work');
   }

// Contact
   public function contact(){
      $data['Contact'] = Contact::all();
      $data['ContactType'] = ContactType::orderBy('orderBy')->get();
      return view('backend.pages.contact', $data);
   }

   public function addContact(Request $request){
      $validator = Validator::make($request->all(),[
         'name'=>'required',
         'email'=>'required',
         'subject'=>'required',
         'message'=>'required'
      ]);
      
      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }
      
      Contact::insert([
         'name'=>$request->name,
         'email'=>$request->email,
         'subject'=>$request->subject,
         'message'=>$request->message,
         'status'=>false,
         'created_at' => Carbon::now()
      ]);
         
      return back()->with('danger', 'Your message send successfully'); 
   }

   public function viewContact(){
      $data['Contact'] = Contact::find($_REQUEST['id']);
      $data['Contact']->status = true;     
      $data['Contact']->save();
      return view('backend.pages.ajaxView', $data);
   }
   
   public function addContactType(Request $request){
      $validator = Validator::make($request->all(),[
         'name'=>'required',
         'logo'=>'required',
         'details'=>'required'
      ]);
      
      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }

      $id=DB::table('contact_types')->latest()->first();
      ($id==null) ? $orderId=1 : $orderId=$id->orderBy+1;
      
      ContactType::insert([
         'name'=>$request->name,
         'logo'=>$request->logo,
         'details'=>$request->details,
         'status'=>1,
         'orderBy'=>$orderId,
         'created_at' => Carbon::now()
      ]);
         
      return back()->with('success', 'Contact type add successfully')->withInput(['tab' => 'contactType']);
   }

   public function editContactType(Request $request){
      $validator = Validator::make($request->all(),[
         'name'=>'required',
         'logo'=>'required',
         'details'=>'required'
      ]);
      
      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }
      
      ContactType::where('id', $request->id)->update([
         'name'=>$request->name,
         'logo'=>$request->logo,
         'details'=>$request->details
      ]);
         
      return back()->with('success', 'Contact type update successfully')->withInput(['tab' => $request->tab]);
   }

   
// Status [Active vs Inactive]
   public function itemStatus($id, $model, $tab){
      //Much code because save() function not working...
      $itemId = DB::table($model)->find($id);
      ($itemId->status == true) ? $action=$itemId->status = false : $action=$itemId->status = true;     
      DB::table($model)->where('id', $id)->update(['status' => $action]);
      return back()->with('success', $model.' status change')->withInput(['tab' => $tab]);
   }

// Delete
   public function itemDelete($id, $model, $tab){
      $itemId = DB::table($model)->find($id);
      if (Schema::hasColumn($model, 'image')){
         unlink($itemId->image);
      }
      DB::table($model)->where('id', $id)->delete();
      return back()->with('success', $model.' delete successfully')->withInput(['tab' => $tab]);
   }

// Any title
   public function addAnyTitle(Request $request){
      $validator = Validator::make($request->all(),[
         'description'=>'required',
      ]);

      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }

      AnyTitle::insert([
         'title'=>$request->title,
         'description'=>$request->description,
         'status'=>1,
         'created_at' => Carbon::now()
      ]);
      return back()->with('success', $request->title.' add successfully')->withInput(['tab' => $request->tab]);
   }

   public function editAnyTitle(Request $request){
      $validator = Validator::make($request->all(),[
         'description'=>'required',
      ]);

      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }

      AnyTitle::where('id', $request->id)->update([
         'description'=>$request->description
      ]);
      return back()->with('success', $request->title.' update successfully')->withInput(['tab' => $request->tab]);
   }

// Order By
   public function orderBy($model, $id, $targetId, $tab){
      DB::table($model)->where('id', $id)->update(['orderBy' => $targetId]);      
      return back()->with('success', $model.' orderBy change')->withInput(['tab' => $tab]);
   }


}
