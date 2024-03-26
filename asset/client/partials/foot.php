 <!-- end footer -->
 <!-- Javascript files-->
 <script src="../../dist/client/js/jquery.min.js"></script>
 <script src="../../dist/client/js/popper.min.js"></script>
 <script src="../../dist/client/js/bootstrap.bundle.min.js"></script>
 <script src="../../dist/client/js/jquery-3.0.0.min.js"></script>
 <script src="../../dist/client/js/plugin.js"></script>
 <!-- sidebar -->
 <script src="../../dist/client/js/jquery.mCustomScrollbar.concat.min.js"></script>
 <script src="../../dist/client/js/custom.js"></script>
 <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
 <script>
     $(document).ready(function() {
         $(".fancybox").fancybox({
             openEffect: "none",
             closeEffect: "none"
         });

         $(".zoom").hover(function() {

             $(this).addClass('transition');
         }, function() {

             $(this).removeClass('transition');
         });
     });
 </script>