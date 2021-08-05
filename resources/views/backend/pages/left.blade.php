@extends('backend.master')
@section('title') 
   Left side
@endsection

@section('content')
   @include('common.alertMessage')
   <div class="content-wrapper p-3">
      <div class="btn-group mb-2" role="group" aria-label="Basic example"> 
         <button class="btn btn-sm btn-success text-light" data-toggle="modal" data-original-title="test" data-target="#addImage">Add Image</button>
         <button class="btn btn-sm btn-info text-light" data-toggle="modal" data-original-title="test" data-target="#addSocialSite">Add Social Side</button>
      </div>

      <div class="card border border-danger">
         <div class="card-header p-1">
            <ul class="nav nav-pills" id="tabMenu">
               <li class="nav-item">
                  <a class="nav-link active btn-sm py-1 m-1" data-toggle="pill" href="#image">Profile image</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link btn-sm py-1 m-1" data-toggle="pill" href="#socialSite">Social Site</a>
               </li>
            </ul>
         </div>

         <div class="card-body p-1">
            <div class="tab-content" id="pills-tabContent">

               <div class="tab-pane fade show active" id="image">
                  <p class="bg-success text-center pb-1">Profile picture [{{$ProfilePicture->count()}}]</p>
                  <table class="table table-bordered table-striped table-hover">
                     <thead class="text-center">
                        <th>No</th>                           
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                     </thead>
                     <tbody>
                        @foreach($ProfilePicture as $item)
                           <tr>
                              <td width="5%">{{$loop->iteration}}</td>                              
                              <td class="p-2"><img src="{{$item->image}}" width="120" height="100"></td>
                              <td width="8%">
                                 @if($item->status == 1)
                                    <a href="{{ url('itemStatus', [$item->id, 'profile_pictures', 'image'])}}" class="btn px-1 btn-sm btn-success" title="Click for inactive">Active</a>
                                 @else
                                    <a href="{{ url('itemStatus', [$item->id, 'profile_pictures', 'image'])}}" class="btn px-1 btn-sm btn-danger" title="Click for active">Inactive</a>
                                 @endif
                              </td>
                              <td width="8%">
                                 <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-sm btn-danger text-light" href="{{ url('itemDelete', [$item->id, 'profile_pictures', 'image'])}}" onclick="return confirm('Are you want to delete this?')">Delete</a>
                                 </div>
                              </td>
                           </tr> 
                        @endforeach                                            
                     </tbody>
                  </table>
               </div>

               <div class="tab-pane fade show" id="socialSite">
                  <p class="bg-info text-center pb-1">Social site [{{$SocialSite->count()}}]</p>
                  <table class="table table-bordered table-striped table-hover">
                     <thead class="text-center">
                        <th>No</th>                           
                        <th>Logo</th>
                        <th>Social name</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Action</th>
                     </thead>
                     <tbody>
                        @foreach($SocialSite as $item)
                           <tr>
                              <td width="7%">{{$loop->iteration}}</td>
                              <td>
                                 <a href='{{ url($item->socialUrl) }}' target="_blank">{!! $item->socialLogo !!}</a>
                              </td>
                              <td>
                                 <a class="capitalize" href='{{ url($item->socialUrl) }}' target="_blank">{!! $item->socialName !!}</a>
                              </td>
                              <td>
                                 <a href='{{ url($item->socialUrl) }}' target="_blank">{{ $item->socialUrl }}</a>
                              </td>
                              <td width="8%">
                                 @if($item->status == 1)
                                    <a href="{{ url('itemStatus', [$item->id, 'social_sites', 'socialSite'])}}" class="btn px-1 btn-sm btn-success" title="Click for inactive">Active</a>
                                 @else
                                    <a href="{{ url('itemStatus', [$item->id, 'social_sites', 'socialSite'])}}" class="btn px-1 btn-sm btn-danger" title="Click for active">Inactive</a>
                                 @endif
                              </td>
                              <td width="15%">
                                 <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-sm btn-success text-light" data-toggle="modal" data-target="#editSocialSite" data-id="{{$item->id}}" data-name="{{$item->socialName}}" data-url="{{$item->socialUrl}}" data-tab="socialSite">Edit</a>
                                    
                                    <a class="btn btn-sm btn-danger text-light" href="{{ url('itemDelete', [$item->id, 'social_sites', 'socialSite'])}}" onclick="return confirm('Are you want to delete this?')">Delete</a>
                                 </div>
                              </td>
                           </tr> 
                        @endforeach                                        
                     </tbody>
                  </table>
               </div>
            </div>
         </div>            
      </div>
   </div>
@endsection

@section('js')

   {{-- Add image --}}
      <div class="modal fade" id="addImage" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title text-center" id="exampleModalLabel">Add Image</h6>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               </div>
               <div class="modal-body">
                  <form action="{{ url('addPicture') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                     @csrf                   
                     <div class="form">
                        <div class="form-group">
                           <label for="image">Profile picture :</label>
                           <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="btn-group">
                           <button class="btn btn-sm btn-primary">Save</button>
                           <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>

   {{-- Add social site --}}
      <div class="modal fade" id="addSocialSite" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title text-center" id="exampleModalLabel">Add social site</h6>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               </div>
               <div class="modal-body">
                  <form action="{{ url('addSocialSite') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                     @csrf
                     <div class="form row">
                        <div class="form-group col-5">
                           <label for="socialName">Social Media Name :</label>
                           <input name="socialName" class="form-control" id="socialName" type="text" placeholder="Ex: Facebook, Youtube etc" required>
                        </div>
                        <div class="form-group col">
                           <label for="socialLogo">Social Logo :</label>
                           <input type="text" name="socialLogo" id="socialLogo" class="form-control mb-2" placeholder="<i class='fa fa-name'></i>" required>                       
                           <a class="btn-sm btn-success" href="https://fontawesome.com/" target="_blank">Search Font</a>
                        </div>
                     </div>                
                     <div class="form">
                        <div class="form-group">
                           <label for="socialUrl" class="mb-2">Social site URL :</label>
                           <input type="text" id="socialUrl" class="form-control" name="socialUrl" placeholder="Example : www.facebook.com/userName" required>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="btn-group">
                           <button class="btn btn-sm btn-primary">Save</button>
                           <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>

   {{-- Edit social site --}}
      <div class="modal fade" id="editSocialSite" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title text-center" id="exampleModalLabel">Edit social site</h6>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               </div>
               <div class="modal-body">
                  <form action="{{ url('editSocialSite') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                     @csrf                   
                     <div class="form">
                        <input name="id" id="id" hidden>
                        <input name="tab" id="tab" hidden>
                        <div class="form-group">
                           <label for="socialName" class="mb-2">Social site name :</label>
                           <input type="text" id="socialName" class="form-control" name="socialName" placeholder="Example : Facebook, Instagram..." required>
                        </div>
                        <div class="form-group">
                           <label for="socialUrl" class="mb-2">Social site URL :</label>
                           <input type="text" id="socialUrl" class="form-control" name="socialUrl" placeholder="Example : www.facebook.com/userName" required>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="btn-group">
                           <button class="btn btn-sm btn-primary">Save</button>
                           <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>

      <script type="text/javascript">
         $('#editSocialSite').on('show.bs.modal', function (event) {
            console.log('Model Opened')
            var button = $(event.relatedTarget)

            var id = button.data('id')
            var socialName = button.data('name')
            var socialUrl = button.data('url')
            var tab = button.data('tab') 
            
            var modal = $(this)
            
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #socialName').val(socialName);
            modal.find('.modal-body #socialUrl').val(socialUrl);
            modal.find('.modal-body #tab').val(tab);
         })
      </script>

@endsection