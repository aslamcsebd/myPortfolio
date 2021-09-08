@extends('backend.master')

@section('title') 
   Work
@endsection

@section('css') 
@endsection

@section('content')
   @include('common.alertMessage')
   <div class="content-wrapper p-3">
      <div class="card border border-danger">
         <div class="card-header p-1">
            <button class="btn btn-sm btn-success text-light" data-toggle="modal" data-original-title="test" data-target="#addWork">Add project</button>
         </div>
         <div class="card-body p-1 dataTableHide">
            <table class="table table-bordered table-striped table-hover">
               <thead class="text-center">
                  <th>No</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>End date</th>
                  <th>Link</th>
                  <th>Github</th>
                  <th>Order By</th>
                  <th>Status</th>
                  <th>Action</th>
               </thead>
               <tbody>
                  @foreach($Work as $item)
                     <tr>
                        <td width="3%">{{$loop->iteration}}</td>
                        <td>{!! $item->name !!}</td>
                        <td class="p-2"><img src="{{$item->image}}" width="120" height="100"></td>
                        <td>{!! date('Y-M', strtotime($item->date)) !!}</td>
                        <td>
                           @if($item->link != null)
                              <a class="btn btn-sm btn-success disabled" title="Project link availavle">Yes, have</a>
                           @else
                              <a class="btn btn-sm btn-danger disabled" title="Click for active">Don't have</a>
                           @endif
                        </td>
                        <td>
                           @if($item->github != null)
                              <a class="btn btn-sm btn-success disabled" title="Project github availavle">Yes, have</a>
                           @else
                              <a class="btn btn-sm btn-danger disabled" title="Click for active">Don't have</a>
                           @endif
                        </td>
                        <td>
                           <div class="btn-group ">
                              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                 <i class="far fa-check-circle"></i>
                                 {{$item->orderBy}}
                              </button>
                              <div class="dropdown-menu" style="min-width: 4rem; background-color: thistle;">
                                 @for($i=1; $i <= $Work->count(); $i++)                                          
                                    <a href="{{ url('orderBy', ['works', $item->id, $i, 'tabName'])}}"
                                       class="{{$i==$item->orderBy ? 'bg-info text-white disabled pl-2' : 'text-center'}} dropdown-item">
                                       @if($i==$item->orderBy)
                                          <i class="far fa-check-circle"></i>
                                       @endif
                                       {{$i}}
                                    </a>
                                 @endfor
                              </div>
                           </div>
                        </td>
                        <td>
                           @if($item->status == 1)
                              <a href="{{ url('itemStatus', [$item->id, 'works', 'tabName'])}}" class="btn px-1 btn-sm btn-success" title="Click for inactive">Active</a>
                           @else
                              <a href="{{ url('itemStatus', [$item->id, 'works', 'tabName'])}}" class="btn px-1 btn-sm btn-danger" title="Click for active">Inactive</a>
                           @endif
                        </td>
                        <td width="10%">
                           <div class="btn-group" role="group" aria-label="Basic example">
                              <a class="btn btn-sm btn-success text-light editWork" data-toggle="modal" data-target="#editWork" data-id="{{$item->id}}">Edit</a>
                              
                              <a class="btn btn-sm btn-danger text-light" href="{{ url('itemDelete', [$item->id, 'works', 'tabName'])}}" onclick="return confirm('Are you want to delete this?')">Delete</a>
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

@section('modal')

   {{-- Add project --}}
      <div class="modal fade" id="addWork" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title text-center" id="exampleModalLabel">Add project</h6>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               </div>
               <div class="modal-body">
                  <form action="{{ url('addWork') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                     @csrf
                     <div class="form-group">
                        <label for="name">Add project name :</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Ex: Hotel booking, HRM, CMS..." required>
                     </div>

                     <div class="row">
                        <div class="form-group col-8">
                           <label for="image">Project image :</label>
                           <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <div class="col">
                           <label for="date">Complete date :</label>
                           <input type="text" class="form-control datepicker" id="date" name="date" placeholder="Month-Year" required>
                        </div>
                     </div>

                     <div class="form-group">
                        <label for="skill">Project skill  name :</label>
                        <input type="text" name="skill" class="form-control" value="@foreach($Skill as $s){{$s->title}}, @endforeach" id="skill" placeholder="Ex: html, css, js...">
                     </div>
                     
                     <div class="row">
                        <div class="form-group col">
                           <label for="link">Project link :</label>
                           <input type="text" name="link" class="form-control" id="link" placeholder="Ex: www.projectName.com">
                        </div>
                        <div class="form-group col">
                           <label for="github">Github link:</label>
                           <input type="text" name="github" class="form-control" id="github" placeholder="Ex: https://github.com">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="description" class="mb-2">Description :</label>
                        <textarea type="text" id="description" class="form-control summernote required" name="description" required></textarea>
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
   
   {{-- Edit Experience --}}
      <div class="modal fade" id="editWork" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title text-center" id="exampleModalLabel">Edit Experience</h6>
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
            $(".editWork").click(function(){

               var id = $(this).data('id');

               //alert("first value " + userid + "And second value is " + catid );
               $.ajax({
                  method: "GET", // post does not work
                  url: "{{ url('editWork') }}",
                     data: {id: id},

                  success:function(response){   
                     $('.modal-body').html(response);
                     // $("div#CityResShow").html(result);
                     $('#editWork').modal('show');
                  }
               });

            });
         // function ends
         }); 
     
         $(".datepicker").datepicker({
            format: "yyyy-MM",
            startView: "months", 
            minViewMode: "months"
         });
      </script>
      
@endsection


