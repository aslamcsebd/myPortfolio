<?php

namespace App\Http\Controllers;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ProfilePicture;
use App\Models\SocialSite;

class BackendController extends Controller {
	
//left
	public function left(){
      $data['ProfilePicture'] = ProfilePicture::all();
      $data['SocialSite'] = SocialSite::all();
      return view('backend.pages.left', $data);
   }

   public function addPicture(Request $request){
      $validator = Validator::make($request->all(),[
         'profilePicture'=>'required'
      ]);

      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }

      $path="profilePicture/";
      if ($request->hasFile('profilePicture')){
         if($files=$request->file('profilePicture')){
            $picture = $request->profilePicture;
            $fullName=time().".".$picture->getClientOriginalExtension();
            $files->move(imagePath($path), $fullName);
            $imageLink = imagePath($path). $fullName;

            ProfilePicture::insert([
               'profilePicture'=>$imageLink,
               'status'=>1,
               'created_at' => Carbon::now()
            ]);
         }
         return back()->with('success','Image add successfully');
      }else{
         return back()->with('fail','Sorry! Image add Fail..');
      }     
   }

   public function pictureStatus($id, $tab){
      $pictureId = ProfilePicture::find($id);
      ($pictureId->status == true) ? $pictureId->status = false : $pictureId->status = true;     
      $pictureId->save();  
      return back()->with('success','Profile picture status change')->withInput(['tab' => $tab]);
   }

   public function pictureDelete($id, $tab){
      $imageId = ProfilePicture::where('id', $id)->first();
      unlink($imageId->profilePicture);
      ProfilePicture::find($id)->delete();
      return back()->with('success','Profile picture delete successfully')->withInput(['tab' => $tab]);
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

   public function socialStatus($id, $tab){
      $pictureId = SocialSite::find($id);
      ($pictureId->status == true) ? $pictureId->status = false : $pictureId->status = true;     
      $pictureId->save();  
      return back()->with('success','Social site status change')->withInput(['tab' => $tab]);
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

   public function socialDelete($id, $tab){
      SocialSite::find($id)->delete();
      return back()->with('success','Social site delete successfully')->withInput(['tab' => $tab]);
   }
   
// Home

   public function home(){
      return view('backend.pages.home');
   }

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
   
}
