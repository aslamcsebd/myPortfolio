   
@if(isset($Home))
   <form action="{{ url('editService2') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
      @csrf                   
      <div class="form">
         <div class="form-group row">
            <input  name="id" value="{{$Home->id}}" hidden>
            <input  name="oldImage" value="{{$Home->image}}" hidden>
            <div class="col-4">
               <label for="old">Present image :</label>
               <img class="border border-dark" src="{{$Home->image}}" width="200" height="80">
            </div>
            <div class="col">
               <label for="image">Upload new image :</label>
               <input type="file" class="form-control col" id="image" name="image">
            </div>
         </div>
         <div class="form-group">
            <label for="firstTitle">1st title :</label>
            <textarea type="text" class="form-control summernote" id="firstTitle" name="firstTitle" value="{{$Home->id}}" required>{{$Home->firstTitle}}</textarea>
         </div>
         <div class="form-group">
            <label for="secondTitle">2nd title :</label>
            <textarea type="text" class="form-control summernote" id="secondTitle" name="secondTitle" required>{{$Home->secondTitle}}</textarea>
         </div>
      </div>
      <div class="modal-footer">
         <div class="btn-group">
            <button class="btn btn-sm btn-primary">Edit now</button>
            <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Close</button>
         </div>
      </div>
   </form>   
@endif

@if(isset($Service))
   <form action="{{ url('editService2') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
      @csrf
      <div class="form row">
         <input  name="id" value="{{$Service->id}}" hidden>
         <div class="form-group col-5">
            <label for="title">Service name :</label>
            <input name="title" class="form-control" id="title" value="{{$Service->title}}" type="text" placeholder="Ex: Web Design..." required>
         </div>
         <div class="form-group col">
            <label for="logo">Service logo :</label>
            <input type="text" name="logo" id="logo" value="{{$Service->logo}}" class="form-control mb-2" placeholder="<i class='fa fa-name'></i>" required>                       
            <a class="btn-sm btn-success" href="https://fontawesome.com/" target="_blank">Search Font</a>
         </div>
      <small class="bg-info p-1 ml-2">Example : Innovative Ideas, Graphic Design, Web Design, Software, Application etc</small>         
      </div>
      <div class="form">
         <div class="form-group">
            <label for="description" class="mb-2">Description :</label>
            <textarea type="text" id="description" class="form-control summernote" name="description" placeholder="Example : www.facebook.com/userName" required>{{$Service->description}}</textarea>
         </div>
      </div>
      <div class="modal-footer">
         <div class="btn-group">
            <button class="btn btn-sm btn-primary">Edit now</button>
            <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Close</button>
         </div>
      </div>
   </form>   
@endif

@if(isset($Education))
   <form action="{{ url('editEducation2') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
      @csrf
      <div class="form">
         <input  name="id" value="{{$Education->id}}" hidden>
         <div class="form-group">
            <label for="degree">Degree name :</label>
            <input name="degree" class="form-control" id="degree" value="{{$Education->degree}}" type="text" placeholder="Ex: SSC, HSC..." required>
         </div>
         <div class="form-group">
            <label for="date">Degree date :</label>
            <input name="date" class="form-control datepicker" id="date" value="{!! date('Y-M', strtotime($Education->date)) !!}">
         </div>                                 
      </div>
      <div class="form">
         <div class="form-group">
            <label for="description" class="mb-2">Description :</label>
            <textarea type="text" id="description" class="form-control summernote" name="description" placeholder="Example : www.facebook.com/userName" required>{{$Education->description}}</textarea>
         </div>
      </div>
      <div class="modal-footer">
         <div class="btn-group">
            <button class="btn btn-sm btn-primary">Edit now</button>
            <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Close</button>
         </div>
      </div>
   </form>
@endif

@if(isset($Experience))
   <form action="{{ url('editExperience2') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
      @csrf
      <div class="form">
         <input  name="id" value="{{$Experience->id}}" hidden>
         <div class="form-group">
            <label for="experience">Add experience name :</label>
            <input type="text" name="experience" class="form-control" value="{{$Experience->experience}}" id="experience" placeholder="Ex: Front End Developer, System Analyst..." required />
         </div>
         <div class="form-group row">
            <div class="col">
               <label for="date">Start date :</label>
               <input type="text" class="form-control datepicker" value="{{date('M-Y', strtotime($Experience->startDate))}}" name="startDate" placeholder="Month-Year" required />
            </div>
            <div class="col">
               <label for="date">End date :</label>
               <input type="text" class="form-control datepicker" value="{{date('M-Y', strtotime($Experience->endDate))}}" name="endDate" placeholder="Month-Year" required />
            </div>
         </div>                                    
      </div>
      <div class="form">
         <div class="form-group">
            <label for="description" class="mb-2">Description :</label>
            <textarea type="text" id="description" class="form-control summernote" name="description" placeholder="Example : www.facebook.com/userName" required>{!!$Experience->description!!}</textarea>
         </div>
      </div>
      <div class="modal-footer">
         <div class="btn-group">
            <button class="btn btn-sm btn-primary">Save</button>
            <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Close</button>
         </div>
      </div>
   </form>
@endif

<!-- summernote -->
<script src="{{ asset('/') }}summernote/summernote.min.js"></script>
<link rel="stylesheet" href="{{ asset('/')}}css/datepicker.min.css">
<script src="{{ asset('/') }}js/datepicker.min.js"></script>

<script type="text/javascript">
   $(document).ready(function() {
     $('.summernote').summernote();
   });

   $(".datepicker").datepicker({
      format: "MM-yyyy",
      startView: "months", 
      minViewMode: "months"
   });
</script>
