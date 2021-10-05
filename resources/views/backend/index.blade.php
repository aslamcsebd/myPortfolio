@extends('backend.master')
@section('title')
   Portfolio Admin
@endsection
@section('content')   
   <div class="content-wrapper">
      
      <section class="content mt-4">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-3 col-6">
                  <div class="small-box bg-info">
                     <div class="inner text-center">
                        <table class="table">
                           <tr>
                              <td><h3 lass="mt-0 mb-0" style="margin:-0.7rem;">{{$profilePicture->count()}}</h3></td> 
                              <td><h3 lass="mt-0 mb-0" style="margin:-0.7rem;">{{$SocialSite->count()}}</h3></td> 
                           </tr>
                           <tr>
                              <td>Profile Image</td>
                              <td>Social Site</td>
                           </tr>
                           <tr>
                              <td colspan="2">Left Side</td>
                           </tr>
                        </table>
                     </div>
                     <div class="icon">
                        <i class="ion ion-bag"></i>
                     </div>
                     <a href="{{ route('left') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>

               <div class="col-lg-3 col-6">
                  <div class="small-box bg-primary">
                     <div class="inner text-center">
                        <h3>{{$Home->count()}}</h3>
                        <p>Home</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                     </div>
                     <a href="{{ route('home') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>

               <div class="col-lg-3 col-6">
                  <div class="small-box bg-secondary">
                     <div class="inner text-center">
                        <h3>{{$Service->count()}}</h3>
                        <p>Service</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-person-add"></i>
                     </div>
                     <a href="{{ route('services') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>

               <div class="col-lg-3 col-6">
                  <div class="small-box bg-danger">
                     <div class="inner text-center">
                        <h3>{{$Skill->count()}}</h3>
                        <p>Skill</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                     </div>
                     <a href="{{ route('skills') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>

               <div class="col-lg-3 col-6">
                  <div class="small-box bg-warning">
                     <div class="inner text-center">
                        <h3>{{$Education->count()}}</h3>
                        <p>Education</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-bag"></i>
                     </div>
                     <a href="{{ route('education') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>

               <div class="col-lg-3 col-6">
                  <div class="small-box bg-info">
                     <div class="inner text-center">
                        <h3>{{$Experience->count()}}</h3>
                        <p>Experience</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                     </div>
                     <a href="{{ route('experience') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>

               <div class="col-lg-3 col-6">
                  <div class="small-box bg-light">
                     <div class="inner text-center">
                        <h3>{{$Work->count()}}</h3>
                        <p>Work</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-person-add"></i>
                     </div>
                     <a href="{{ route('work') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>

               <div class="col-lg-3 col-6">
                  <div class="small-box bg-dark">
                     <div class="inner text-center">
                        <table class="table">
                           <tr>
                              <td><h3 tyle="margin:-0.7rem;">{{$ContactEmail->count()}}</h3></td> 
                              <td><h3 tyle="margin:-0.7rem;">{{$Contact->count()}}</h3></td> 
                           </tr>
                           <tr>
                              <td>All Mail</td>
                              <td>Contact type</td>
                           </tr>
                        </table>
                     </div>
                         <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                     </div>
                     <a href="{{ route('contact') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>

            </div>           
         </div>
      </section>
      
   </div>
   <footer class="main-footer">
      <strong>Copyright &copy; <script>document.write(new Date().getFullYear());</script>
      All rights reserved.
   </footer>
@endsection