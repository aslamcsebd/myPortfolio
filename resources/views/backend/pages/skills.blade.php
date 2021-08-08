@extends('backend.master')
@section('title') 
   Skills
@endsection
<style type="text/css">
   .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate{ display: none; }
</style>

@section('content')
   @include('common.alertMessage')
   <div class="content-wrapper p-3">
      <div class="btn-group mb-2" role="group" aria-label="Basic example">
         <button class="btn btn-sm btn-info text-light" data-toggle="modal" data-original-title="test" data-target="#addSkill">Add Skill</button>
      </div>

      <div class="card border border-danger">
         <div class="card-header p-1">
            <ul class="nav nav-pills" id="tabMenu">
               <li class="nav-item">
                  <a class="nav-link active btn-sm py-1 m-1" data-toggle="pill" href="#skills">All skill</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link btn-sm py-1 m-1" data-toggle="pill" href="#aboutSkill">About skill</a>
               </li>
            </ul>
         </div>

         <div class="card-body p-1">
            <div class="tab-content" id="pills-tabContent">

               <div class="tab-pane fade show active" id="skills">
                  <p class="bg-success text-center pb-1">Profile picture [{{$Skill->count()}}]</p>
                  <table class="table table-bordered table-striped table-hover">
                     <thead class="text-center">
                        <th>No</th>                           
                        <th>Skill name</th>
                        <th>Range[%]</th>
                        <th>Status</th>
                        <th>Action</th>
                     </thead>
                     <tbody>
                        @foreach($Skill as $item)
                           <tr>
                              <td width="5%">{{$loop->iteration}}</td>                              
                              <td class="p-2">{{$item->title}}</td>
                              <td class="p-2">{{$item->range}}%</td>
                              <td width="8%">
                                 @if($item->status == 1)
                                    <a href="{{ url('itemStatus', [$item->id, 'skills', 'skills'])}}" class="btn px-1 btn-sm btn-success" title="Click for inactive">Active</a>
                                 @else
                                    <a href="{{ url('itemStatus', [$item->id, 'skills', 'skills'])}}" class="btn px-1 btn-sm btn-danger" title="Click for active">Inactive</a>
                                 @endif
                              </td>
                              <td width="16%">
                                 <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-sm btn-success text-light" data-toggle="modal" data-target="#editSkill" data-id="{{$item->id}}" data-title="{{$item->title}}" data-range="{{$item->range}}">Edit</a>

                                    <a class="btn btn-sm btn-danger text-light" href="{{ url('itemDelete', [$item->id, 'skills', 'skills'])}}" onclick="return confirm('Are you want to delete this?')">Delete</a>
                                 </div>
                              </td>
                           </tr> 
                        @endforeach                                            
                     </tbody>
                  </table>
               </div>

               <div class="tab-pane fade show" id="aboutSkill">
                 <p class="bg-success text-center pb-1 mb-2">About skill</p>
                  @if($AnyTitle)
                     <table class="table table-bordered mb-3">
                        <thead class="text-center">
                           <th>Title</th>
                           <th>Status</th>
                        </thead>
                        <tbody>
                           <tr>
                              <td>{{$AnyTitle->title}}</td>
                              <td idth="8%">
                                 @if($AnyTitle->status == 1)
                                    <a href="{{ url('itemStatus', [$AnyTitle->id, 'any_titles', 'aboutSkill']) }}" class="btn px-1 btn-sm btn-success" title="Click for inactive">Active</a>
                                 @else
                                    <a href="{{ url('itemStatus', [$AnyTitle->id, 'any_titles', 'aboutSkill']) }}" class="btn px-1 btn-sm btn-danger" title="Click for active">Inactive</a>
                                 @endif
                              </td>
                           </tr>                                  
                        </tbody>
                     </table>
                     <form action="{{ url('editAnyTitle') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                        @csrf                   
                        <div class="form">
                           <div class="form-group">
                              <input type="text" name="id" value="{{$AnyTitle->id}}" hidden>
                              <input type="text" name="title" value="{{$AnyTitle->title}}" hidden>
                              <input type="text" name="tab" value="aboutSkill" hidden>
                              <textarea name="description" class="summernote">{{$AnyTitle->description}}</textarea>
                           </div>
                           <button class="btn btn-sm btn-success float-right">Update</button>
                        </div>
                     </form>
                  @else
                     <form action="{{ url('addAnyTitle') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                        @csrf                   
                        <div class="form">
                           <div class="form-group">
                              <input type="text" name="title" value="aboutSkill" hidden>
                              <input type="text" name="tab" value="aboutSkill" hidden>
                              <textarea name="description" class="summernote">
                                 No about skill added. Please insert now...
                              </textarea>
                           </div>
                           <button class="btn btn-sm btn-primary float-right">Save</button>
                        </div>
                     </form>
                  @endif
                 
               </div>
            </div>
         </div>            
      </div>
   </div>
@endsection

@section('js')

   {{-- Add skill --}}
      <div class="modal fade" id="addSkill" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title text-center" id="exampleModalLabel">Add skill</h6>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               </div>
               <div class="modal-body">
                  <form action="{{ url('addSkill') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                     @csrf
                     <div class="form">
                        <div class="form-group">
                           <label for="title">Skill name :</label>
                           <input name="title" class="form-control" id="title" type="text" placeholder="Ex: html, css, php etc" required>
                        </div>
                        <div class="form-group">
                           <label for="range">Skill range :</label>
                           <input type="range" name="range" value="0" min="0" max="100" step="5" class="form-control px-0" oninput="num.value = this.value" list=mapsettings>
                           Value : <output id="num">0</output>
                        </div>
                     </div>
                     <datalist id=mapsettings>
                        <option>10</option>
                        <option>20</option>
                        <option>30</option>
                        <option>40</option>
                        <option>50</option>
                        <option>60</option>
                        <option>70</option>
                        <option>80</option>
                        <option>90</option>
                        <option>100</option>
                     </datalist>                     
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

   {{-- Edit skill --}}
      <div class="modal fade" id="editSkill" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title text-center" id="exampleModalLabel">Add skill</h6>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               </div>
               <div class="modal-body">
                  <form action="{{ url('editSkill') }}" method="post" enctype="multipart/form-data" class="needs-validation">
                     @csrf
                     <div class="form">
                        <input name="id" id="id" hidden>
                        <div class="form-group">
                           <label for="title">Skill name :</label>
                           <input name="title" class="form-control" id="title" type="text" placeholder="Ex: html, css, php etc" required>
                        </div>
                        <div class="form-group">
                           <label for="range">Skill range :</label>
                           <input type="range" name="range" id="range" value="0" min="0" max="100" step="5" class="form-control px-0" oninput="num.value = this.value" list=mapsettings>
                           Value : <output id="num">0</output>
                        </div>
                     </div>
                     <datalist id=mapsettings>
                        <option>10</option>
                        <option>20</option>
                        <option>30</option>
                        <option>40</option>
                        <option>50</option>
                        <option>60</option>
                        <option>70</option>
                        <option>80</option>
                        <option>90</option>
                        <option>100</option>
                     </datalist>                     
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
         $('#editSkill').on('show.bs.modal', function (event) {
            console.log('Model Opened')
            var button = $(event.relatedTarget)

            var id = button.data('id')
            var title = button.data('title')
            var range = button.data('range')
            
            var modal = $(this)
            
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #title').val(title);
            modal.find('.modal-body #range').val(range);
            modal.find('.modal-body #num').val(range);
         })
      </script>


@endsection
