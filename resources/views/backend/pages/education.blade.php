@extends('backend.master')

@section('title') 
   Education
@endsection

@section('css') 
@endsection

@section('content')
   @include('common.alertMessage')
   
   <div class="content-wrapper p-3">
      <div class="card border border-danger">
         <div class="card-header p-1">
            <button class="btn btn-sm btn-success text-light" data-toggle="modal" data-original-title="test" data-target="#addEducation">Add education</button>
         </div>
         <div class="card-body p-1 dataTableHide">
            <table class="table table-bordered table-striped table-hover">
               <thead class="text-center">
                  <th>No</th>
                  <th>Degree name</th>
                  <th>Complete date</th>
                  <th>Description</th>
                  <th>Order By</th>
                  <th>Status</th>
                  <th>Action</th>
               </thead>
               <tbody>
                  @foreach($Education as $item)
                     <tr>
                        <td width="3%">{{$loop->iteration}}</td>
                        <td>{!! $item->degree !!}</td>                        
                        <td width="13%">{!! date('Y-M', strtotime($item->date)) !!} <br>
                           [{{\Carbon\Carbon::parse($item->date)->diffForHumans()}}]
                        </td>
                        <td>{!! $item->description !!}</td>
                        <td width="8%">
                           <div class="btn-group">
                              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                 <i class="far fa-check-circle"></i>
                                 {{$item->orderBy}}
                              </button>
                              <div class="dropdown-menu">
                                 @for($i=1; $i <= $Education->count(); $i++)                                          
                                    <a href="{{ url('orderBy', ['education', $item->id, $i, 'tabName'])}}"
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
                        <td width="8%">
                           @if($item->status == 1)
                              <a href="{{ url('itemStatus', [$item->id, 'education', 'tabName'])}}" class="btn px-1 btn-sm btn-success" title="Click for inactive">Active</a>
                           @else
                              <a href="{{ url('itemStatus', [$item->id, 'education', 'tabName'])}}" class="btn px-1 btn-sm btn-danger" title="Click for active">Inactive</a>
                           @endif
                        </td>
                        <td width="10%">
                           <div class="btn-group" role="group" aria-label="Basic example">
                              <a class="btn btn-sm btn-success text-light editEducation" data-toggle="modal" data-target="#editEducation" data-id="{{$item->id}}">Edit</a>
                              
                              <a class="btn btn-sm btn-danger text-light" href="{{ url('itemDelete', [$item->id, 'education', 'tabName'])}}" onclick="return confirm('Are you want to delete this?')">Delete</a>
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

   {{-- Add education --}}
      <div class="modal fade" id="addEducation" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title text-center" id="exampleModalLabel">Add education</h6>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               </div>
               <div class="modal-body">
                  <form action="{{ url('addEducation') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                     @csrf
                     <div class="form">
                        <div class="form-group">
                           <label for="degree">Add degree name :</label>
                           <input name="degree" class="form-control" id="degree" type="text" placeholder="Ex: SSC, HSC..." required>
                        </div>
                        <div class="form-group">
                           <label for="date">Add degree date :</label>
                           <input type="text" class="form-control datepicker" name="date" placeholder="Month-Year" required />
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
   
   {{-- Edit education --}}
      <div class="modal fade" id="editEducation" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title text-center" id="exampleModalLabel">Edit education</h6>
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
            $(".editEducation").click(function(){

               var id = $(this).data('id');

               //alert("first value " + userid + "And second value is " + catid );
               $.ajax({
                  method: "GET", // post does not work
                  url: "{{ url('editEducation') }}",
                     data: {id: id},

                  success:function(response){   
                     $('.modal-body').html(response);
                     // $("div#CityResShow").html(result);
                     $('#editEducation').modal('show');
                  }
               });

            });
         // function ends
         }); 
      </script>

@endsection

@section('js')
   <script type="text/javascript">
      $(".datepicker").datepicker({
         format: "MM-yyyy",
         startView: "months", 
         minViewMode: "months"
      });
   </script>
@endsection
