@extends('backend.master')
@section('title') 
   About
@endsection
   <style type="text/css">
      .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate{ display: none; }
   </style>
@section('content')
   @include('common.alertMessage')
   <div class="content-wrapper p-3">
      
      <div class="card border border-danger">
         <div class="card-body p-1">
            <p class="bg-success text-center pb-1 mb-2">About me</p>
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
                              <a href="{{ url('itemStatus', [$AnyTitle->id, 'any_titles', 'tabName']) }}" class="btn px-1 btn-sm btn-success" title="Click for inactive">Active</a>
                           @else
                              <a href="{{ url('itemStatus', [$AnyTitle->id, 'any_titles', 'tabName']) }}" class="btn px-1 btn-sm btn-danger" title="Click for active">Inactive</a>
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
                        <input type="text" name="tab" value="aboutMe" hidden>
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
                        <input type="text" name="title" value="aboutMe" hidden>
                        <input type="text" name="tab" value="aboutMe" hidden>
                        <textarea name="description" class="summernote">
                           No about info added. Please insert now...
                        </textarea>
                     </div>
                     <button class="btn btn-sm btn-primary float-right">Save</button>
                  </div>
               </form>
            @endif
         </div>            
      </div>
   </div>
@endsection

@section('js')

@endsection