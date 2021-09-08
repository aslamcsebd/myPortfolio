
   <!-- jQuery -->
   <script src="{{ asset('backend/js/jquery.min.js') }}"></script>

   <!-- Bootstrap v4.6.0 -->
   <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>

   <!-- overlayScrollbars -->
   <script src="{{ asset('backend/js/jquery.overlayScrollbars.min.js') }}"></script>
   
   <!-- AdminLTE App -->
   <script src="{{ asset('backend/js/adminlte.min.js') }}"></script>
   
   {{-- Pushmenu --}}
   <script src="{{ asset('backend/js/custom.js') }}"></script>
   
   {{-- dataTables --}}
   <script src="{{ asset('js/dataTables.min.js') }}"></script>

   <!-- summernote -->
   <script src="{{ asset('/') }}summernote/summernote.min.js" ></script>
  
   <!-- Datepicker -->
   <script src="{{ asset('/') }}js/datepicker.min.js"></script>
   
   <script type="text/javascript">
   
      // if ($(window).width() > 992) {
        $(window).scroll(function(){
           if ($(this).scrollTop() > 0) { //default: 40
              $('#navbar_top').addClass("fixed-top");
              // add padding top to show content behind navbar
              $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
            }else{
              $('#navbar_top').removeClass("fixed-top");
               // remove padding top from body
              $('body').css('padding-top', '0');
            }   
        });
      // } // end
   
      $(document).ready(function(){
         $('.table').DataTable();
      });

      window.setTimeout(function(){
         $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
         });
      }, 5000);

      $(document).ready(function(){
        $('.summernote').summernote();
      });    
      
      //redirect to specific tab
      $(document).ready(function(){
         $('#tabMenu a[href="#{{ old('tab') }}"]').tab('show')
      });

      $(".datepicker").datepicker({
         format: "MM-yyyy",
         startView: "months", 
         minViewMode: "months"
      });
   </script>
