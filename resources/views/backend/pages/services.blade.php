@extends('backend.master')
@section('title') 
   Services
@endsection

@section('content')
   @include('common.alertMessage')
   <div class="content-wrapper p-3">
      <div class="card border border-danger">
         <div class="card-header p-1">
            <button class="btn btn-sm btn-success text-light" data-toggle="modal" data-original-title="test" data-target="#addService">Add service</button>
         </div>

         <div class="card-body p-1">
            <p class="bg-info text-center pb-1">Service list [{{$Service->count()}}]</p>
            <table class="table table-bordered table-striped table-hover">
               <thead class="text-center">
                  <th>No</th>                           
                  <th>Logo</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
               </thead>
               <tbody>
                  @foreach($Service as $item)
                     <tr>
                        <td width="5%">{{$loop->iteration}}</td>
                        <td>{!! $item->logo !!}</td>
                        <td>{!! $item->title !!}</td>                        
                        <td>{!! $item->description !!}</td>
                        <td width="8%">
                           @if($item->status == 1)
                              <a href="{{ url('itemStatus', [$item->id, 'services', 'socialSite'])}}" class="btn px-1 btn-sm btn-success" title="Click for inactive">Active</a>
                           @else
                              <a href="{{ url('itemStatus', [$item->id, 'services', 'socialSite'])}}" class="btn px-1 btn-sm btn-danger" title="Click for active">Inactive</a>
                           @endif
                        </td>
                        <td width="15%">
                           <div class="btn-group" role="group" aria-label="Basic example">
                              <a class="btn btn-sm btn-success text-light editService" data-toggle="modal" data-target="#editSocialSite" data-id="{{$item->id}}">Edit</a>
                              
                              <a class="btn btn-sm btn-danger text-light" href="{{ url('itemDelete', [$item->id, 'services', 'socialSite'])}}" onclick="return confirm('Are you want to delete this?')">Delete</a>
                           </div>
                        </td>
                     </tr> 
                  @endforeach                                        
               </tbody>
            </table>
         </div>            
      </div>
   </div>
@endsection

@section('js')

   {{-- Add service --}}
      <div class="modal fade" id="addService" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title text-center" id="exampleModalLabel">Add service</h6>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               </div>
               <div class="modal-body">
                  <form action="{{ url('addService') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                     @csrf
                     <div class="form row">
                        <div class="form-group col-5">
                           <label for="title">Service name :</label>
                           <input name="title" class="form-control" id="title" type="text" placeholder="Ex: Web Design..." required>
                        </div>
                        <div class="form-group col">
                           <label for="logo">Service logo :</label>
                           <input type="text" name="logo" id="logo" class="form-control mb-2" placeholder="<i class='fa fa-name'></i>" required>                       
                           <a class="btn-sm btn-success" href="https://fontawesome.com/" target="_blank">Search Font</a>
                        </div>
                     <small class="bg-info p-1 ml-2">Example : Innovative Ideas, Graphic Design, Web Design, Software, Application etc</small>         
                     </div>
                     <div class="form">
                        <div class="form-group">
                           <label for="description" class="mb-2">Description :</label>
                           <textarea type="text" id="description" class="form-control summernote" name="description" placeholder="Example : www.facebook.com/userName" required></textarea>
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

   {{-- Edit service --}}
      <div class="modal fade" id="editService" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title text-center" id="exampleModalLabel">Edit service</h6>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               </div>
               <div class="modal-body">
                  
               </div>
            </div>
         </div>
      </div>

      <script type="text/javascript"> 
         $(document).ready(function() {
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
            // function starts
            $(".editService").click(function(){

               var id = $(this).data('id');

               //alert("first value " + userid + "And second value is " + catid );
               $.ajax({
                  method: "GET", // post does not work
                  url: "{{ url('editService') }}",
                     data: {id: id},

                  success:function(response){   
                     $('.modal-body').html(response);
                     // $("div#CityResShow").html(result);
                     $('#editService').modal('show');
                  }
               });

            });
         // function ends
         }); 
      </script>   

@endsection