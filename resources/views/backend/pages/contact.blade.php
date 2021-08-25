@extends('backend.master')
@section('title') 
   Left side
@endsection

@section('content')
   @include('common.alertMessage')
   <div class="content-wrapper p-3">
      <div class="btn-group mb-2" role="group" aria-label="Basic example">
         <button class="btn btn-sm btn-info text-light" data-toggle="modal" data-original-title="test" data-target="#addContactType">Add Contact Type</button>
      </div>

      <div class="card border border-danger">
         <div class="card-header p-1">
            <ul class="nav nav-pills" id="tabMenu">
               <li class="nav-item">
                  <a class="nav-link active btn-sm py-1 m-1" data-toggle="pill" href="#contact">Contact</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link btn-sm py-1 m-1" data-toggle="pill" href="#contactType">Social Site</a>
               </li>
            </ul>
         </div>

         <div class="card-body p-1">
            <div class="tab-content" id="pills-tabContent">

               <div class="tab-pane fade show active" id="contact">
                  <p class="bg-success text-center pb-1">Contact [{{$Contact->count()}}]</p>
                  <table class="table table-bordered table-striped table-hover">
                     <thead class="text-center">
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Action</th>
                     </thead>
                     <tbody>
                        @foreach($Contact as $item)
                           <tr class={{ ($item->status==0)? "bg-info":"" }}>
                              <td width="3%">{{$loop->iteration}}</td>
                              <td>{!! $item->name !!}</td>                        
                              <td>{!! $item->email !!}</td>                        
                              <td>{!! $item->subject !!}</td>
                              <td width="12%">
                                 <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-sm btn-success text-light viewContact" data-toggle="modal" data-target="#viewContact" data-id="{{$item->id}}">View</a>

                                    <a class="btn btn-sm btn-danger text-light" href="{{ url('itemDelete', [$item->id, 'contacts', 'tabName'])}}" onclick="return confirm('Are you want to delete this?')">Delete</a>
                                 </div>
                              </td>                      
                           </tr> 
                        @endforeach                                        
                     </tbody>
                  </table>
               </div>

               <div class="tab-pane fade show" id="contactType">
                  <p class="bg-info text-center pb-1">Contact Type [{{$ContactType->count()}}]</p>
                  <table class="table table-bordered table-striped table-hover">
                     <thead class="text-center">
                        <th>No</th>                        
                        <th>Logo</th>
                        <th>Type</th>
                        <th>Info</th>
                        <th>Order By</th>
                        <th>Status</th>
                        <th>Action</th>
                     </thead>
                     <tbody>
                        @foreach($ContactType as $item)
                           <tr>
                              <td width="7%">{{$loop->iteration}}</td>
                              <td>{!! $item->logo !!}</td>
                              <td>{!! $item->name !!}</td>
                              <td>{!! $item->details !!}</td>                              
                              <td width="8%">
                                 <div class="btn-group ">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                       <i class="far fa-check-circle"></i>
                                       {{$item->orderBy}}
                                    </button>
                                    <div class="dropdown-menu" style="min-width: 4rem; background-color: thistle;">
                                       @for($i=1; $i <= $ContactType->count(); $i++)                                          
                                          <a href="{{ url('orderBy', ['contact_types', $item->id, $i, 'contactType'])}}"
                                             class="{{$i==$item->orderBy ? 'bg-info disabled pl-2' : 'text-center'}} dropdown-item">
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
                                    <a href="{{ url('itemStatus', [$item->id, 'contact_types', 'contactType'])}}" class="btn px-1 btn-sm btn-success" title="Click for inactive">Active</a>
                                 @else
                                    <a href="{{ url('itemStatus', [$item->id, 'contact_types', 'contactType'])}}" class="btn px-1 btn-sm btn-danger" title="Click for active">Inactive</a>
                                 @endif
                              </td>
                              <td width="12%">
                                 <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-sm btn-success text-light" data-toggle="modal" data-target="#editContactType" data-id="{{$item->id}}" data-name="{{$item->name}}" data-logo="{{$item->logo}}" data-details="{{$item->details}}" data-tab="contactType">Edit</a>
                                    
                                    <a class="btn btn-sm btn-danger text-light" href="{{ url('itemDelete', [$item->id, 'contact_types', 'contactType'])}}" onclick="return confirm('Are you want to delete this?')">Delete</a>
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

   {{-- Add contact type --}}
      <div class="modal fade" id="addContactType" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title text-center" id="exampleModalLabel">Add Contact Type</h6>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               </div>
               <div class="modal-body">
                  <form action="{{ url('addContactType') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                     @csrf
                     <div class="form row">
                        <div class="form-group col">
                           <label for="contactName">Contact name :</label>
                           <input name="name" class="form-control" id="contactName" type="text" placeholder="Gmail, Address, Mobile etc" required>
                        </div>
                        <div class="form-group col">
                           <label for="logo">Contact logo :</label>
                           <input type="text" name="logo" id="logo" class="form-control mb-2" placeholder="<i class='fa fa-name'></i>" required>                       
                           <a class="btn-sm btn-success" href="https://fontawesome.com/" target="_blank">Search Font</a>
                        </div>
                     </div>                
                     <div class="form">
                        <div class="form-group">
                           <label for="details" class="mb-2">Contact details :</label>
                           <textarea type="text" id="details" class="form-control" name="details" placeholder="Add information..." required></textarea>
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
      <div class="modal fade" id="editContactType" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title text-center" id="exampleModalLabel">Edit Contact Type</h6>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               </div>
               <div class="modal-body">
                  <form action="{{ url('editContactType') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                     @csrf
                     <div class="form row">
                        <input name="id" id="id" hidden>
                        <input name="tab" id="tab" hidden>
                        <div class="form-group col-5">
                           <label for="name">Contact name :</label>
                           <input name="name" class="form-control" id="name" type="text" placeholder="Gmail, Address, Mobile etc" required>
                        </div>
                        <div class="form-group col">
                           <label for="logo">Contact logo :</label>
                           <input type="text" name="logo" id="logo" class="form-control mb-2" placeholder="<i class='fa fa-name'></i>" required>                       
                           <a class="btn-sm btn-success" href="https://fontawesome.com/" target="_blank">Search Font</a>
                        </div>
                     </div>                
                     <div class="form">
                        <div class="form-group">
                           <label for="details" class="mb-2">Contact details :</label>
                           <textarea type="text" id="details" class="form-control" name="details" placeholder="Add information..." required></textarea>
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
         $('#editContactType').on('show.bs.modal', function (event) {
            console.log('Model Opened')
            var button = $(event.relatedTarget)

            var id = button.data('id')
            var name = button.data('name')
            var logo = button.data('logo')
            var details = button.data('details')
            var tab = button.data('tab') 
            
            var modal = $(this)
            
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #logo').val(logo);
            modal.find('.modal-body #details').val(details);
            modal.find('.modal-body #tab').val(tab);
         })
      </script>

   {{-- edit home image --}}
      <div class="modal fade" id="viewContact" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title text-center" id="exampleModalLabel">View emaill</h6>
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
            $(".viewContact").click(function(){
               var id = $(this).data('id');
               $.ajax({
                  method: "GET",
                  url: "{{ url('viewContact') }}",
                  data: {id: id},

                  success:function(response){   
                     $('.modal-body').html(response);
                     // $("div#CityResShow").html(result);
                     $('#viewContact').modal('show');
                  }
               });
            });
         }); 
      </script>   
@endsection
