{{-- Small Modal --}}
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Modal Header</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>
         <div class="modal-body">            
            <form action="{{ url('#') }}" method="post" class="needs-validation" >
               @csrf
               <div class="form justify-content-center">
                  <div class="form-group">
                     <label for="validationCustom01" class="mb-1">Modal Title :</label>
                     <input name="addItem" class="form-control" id="validationCustom01" type="text" value="{{ old('name')}}" placeholder="input something" required>
                  </div>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-primary" type="submit">Save</button>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

{{--  Small : <div class="modal-dialog modal-sm">
      Large :  modal-lg
      Extra Large : modal-xl  --}}
      
{{-- Large Modal --}}
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Modal Header</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>
         <div class="modal-body">            
            <form action="{{ url('#') }}" method="post" class="needs-validation" >
               @csrf
               <div class="form justify-content-center">
                  <div class="form-group">
                     <label for="validationCustom01" class="mb-1">Modal Title :</label>
                     <input name="addItem" class="form-control" id="validationCustom01" type="text" value="{{ old('name')}}" placeholder="input something" required>
                  </div>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-primary" type="submit">Save</button>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

{{-- Fixed Modal 
data-backdrop="static" data-keyboard="false" --}}
<div class="modal fade" id="fixedModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Modal Header</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>
         <div class="modal-body">            
            <form action="{{ url('#') }}" method="post" class="needs-validation" >
               @csrf
               <div class="form justify-content-center">
                  <div class="form-group">
                     <label for="validationCustom01" class="mb-1">Modal Title :</label>
                     <input name="addItem" class="form-control" id="validationCustom01" type="text" value="{{ old('name')}}" placeholder="input something" required>
                  </div>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-primary" type="submit">Save</button>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
