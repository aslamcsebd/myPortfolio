@extends('backend.master')

@section('title') 
   Experience
@endsection

@section('css') 
@endsection

@section('content')
   @include('common.alertMessage')
   <div class="content-wrapper p-3">
      <div class="card border border-danger">
         <div class="card-header p-1">
            <button class="btn btn-sm btn-success text-light" data-toggle="modal" data-original-title="test" data-target="#addExperience">Add experience</button>
         </div>
         <div class="card-body p-1">
            <table class="table table-bordered table-striped table-hover">
               <thead class="text-center">
                  <th>No</th>
                  <th>Experience</th>
                  <th>Start date</th>
                  <th>End date</th>
                  <th>Description</th>
                  <th>Order By</th>
                  <th>Status</th>
                  <th>Action</th>
               </thead>
               <tbody>
                  @foreach($Experience as $item)
                     <tr>
                        <td width="3%">{{$loop->iteration}}</td>
                        <td>{!! $item->experience !!}</td>                        
                        <td width="9%">{!! date('M-Y', strtotime($item->startDate)) !!}</td>
                        <td width="9%">
                           {!! ($item->endDate!=null) ? date('M-Y', strtotime($item->endDate)): 'to now' !!}
                        </td>
                        <td class="left" width="">{!! $item->description !!}</td>
                        <td width="8%">
                           <div class="btn-group">
                              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                 <i class="far fa-check-circle"></i>
                                 {{$item->orderBy}}
                              </button>
                              <div class="dropdown-menu">
                                 @for($i=1; $i <= $Experience->count(); $i++)                                          
                                    <a href="{{ url('orderBy', ['experiences', $item->id, $i, 'tabName'])}}"
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
                        <td width="5%">
                           @if($item->status == 1)
                              <a href="{{ url('itemStatus', [$item->id, 'experiences', 'tabName'])}}" class="btn px-1 btn-sm btn-success" title="Click for inactive">Active</a>
                           @else
                              <a href="{{ url('itemStatus', [$item->id, 'experiences', 'tabName'])}}" class="btn px-1 btn-sm btn-danger" title="Click for active">Inactive</a>
                           @endif
                        </td>
                        <td width="10%">
                           <div class="btn-group" role="group" aria-label="Basic example">
                              <a class="btn btn-sm btn-success text-light editExperience" data-toggle="modal" data-target="#editExperience" data-id="{{$item->id}}">Edit</a>
                              
                              <a class="btn btn-sm btn-danger text-light" href="{{ url('itemDelete', [$item->id, 'experiences', 'tabName'])}}" onclick="return confirm('Are you want to delete this?')">Delete</a>
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

   {{-- Add experience --}}
      <div class="modal fade" id="addExperience" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title text-center" id="exampleModalLabel">Add Experience</h6>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               </div>
               <div class="modal-body">
                  <form action="{{ url('addExperience') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                     @csrf
                     <div class="form">
                        <div class="form-group">
                           <label for="experience">Add experience name :</label>
                           <input type="text" name="experience" class="form-control" id="experience" placeholder="Ex: Front End Developer, System Analyst..." required />
                        </div>
                        <div class="form-group row">
                           <div class="col">
                              <label for="date">Start date :</label>
                              <input type="text" class="form-control datepicker" name="startDate" placeholder="Month-Year" required />
                           </div>
                           <div class="col">
                              <label for="date">End date :</label>
                              <input type="text" class="form-control datepicker" name="endDate" placeholder="Month-Year"/>
                           </div>
                        </div>                                    
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
   
   {{-- Edit Experience --}}
      <div class="modal fade" id="editExperience" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            $(".editExperience").click(function(){

               var id = $(this).data('id');

               //alert("first value " + userid + "And second value is " + catid );
               $.ajax({
                  method: "GET", // post does not work
                  url: "{{ url('editExperience') }}",
                     data: {id: id},

                  success:function(response){   
                     $('.modal-body').html(response);
                     // $("div#CityResShow").html(result);
                     $('#editExperience').modal('show');
                  }
               });

            });
         // function ends
         }); 
     
         $(".datepicker").datepicker({
            format: "MM-yyyy",
            startView: "months", 
            minViewMode: "months"
         });
      </script>
      
@endsection
