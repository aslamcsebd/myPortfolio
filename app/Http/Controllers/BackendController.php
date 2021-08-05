<?php

namespace App\Http\Controllers;
use Validator;
use Redirect;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ProfilePicture;
use App\Models\SocialSite;
use App\Models\Home;
use Illuminate\Support\Facades\Schema;

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
      return view('backend.pages.about');
   }

   public function services(){
      return view('backend.pages.services');
   }

   public function skills(){
      return view('backend.pages.skills');
   }

   public function education(){
      return view('backend.pages.education');
   }

   public function experience(){
      return view('backend.pages.experience');
   }

   public function work(){
      return view('backend.pages.work');
   }

   public function blog(){
      return view('backend.pages.blog');
   }

   public function contact(){
      return view('backend.pages.contact');
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
   
}
