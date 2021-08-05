@if(isset($Home))
   <form action="{{ url('editHome2') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
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


<!-- summernote -->
<script src="{{ asset('/') }}summernote/summernote.min.js" ></script>
<script type="text/javascript">
   $(document).ready(function() {
     $('.summernote').summernote();
   });
</script>


