 <script>
     $(document).ready(function() {

         function dates() {
             var today = new Date();
             let day = today.getDate();
             var mon = today.toLocaleString('default', {
                 month: 'long'
             });
             var month = mon.substring(0, 3);
             var year = today.getFullYear()
             var dates = month + ' ' + day + ', ' + year;
             document.getElementById('datess').innerHTML = dates;
         }

         function display_c() {
             mytime = setTimeout(function() {
                 display_ct();
             }, 1000);
         }

         function display_ct() {
             var d = new Date();
             let am_pm = d.toLocaleTimeString();
             document.getElementById('times').innerHTML = am_pm;
         }
     });
 </script>

 <script>
     document.addEventListener('DOMContentLoaded', function() {

         var statusMessageElement = document.getElementById('status-message');
         if (statusMessageElement) {
             var statusMessage = statusMessageElement.getAttribute('data-status');
             if (statusMessage) {
                 toastr.success(statusMessage);
             }
         }

         // Check if error message exists
         var errorMessageElement = document.getElementById('error-message');
         if (errorMessageElement) {
             var errorMessage = errorMessageElement.getAttribute('data-error');
             if (errorMessage) {
                 toastr.error(errorMessage, 'Error');
             }
         }
     });
 </script>
 <script>
     $(document).ready(function() {

         var languages = sessionStorage.getItem("languages");
         if (languages == "Arabic") {
             $('#lang_name [value="Arabic"]').attr('selected', 'true');
         } else {
             $('#lang_name [value="English"]').attr('selected', 'true');
         }

         $('.changeLang').change(function() {

             var url = "{{ route('language-switch') }}";

             Swal.fire({
                 text: '',
                 icon: 'success',
                 title: "{{ __('frontend.language-changed-successfully') }}",
                 confirmButtonText: "{{ __('frontend.ok') }}",
                 confirmButtonColor: '#404bcb',
                 timer: 8000,
                 customClass: {
                     popup: document.documentElement.getAttribute('lang') === 'ar' ? 'swal-rtl' :
                         ''
                 }
             });


             window.location.href = url + "?lang=" + $(this).val();
         })

     });
 </script>


 <script>
     document.addEventListener("DOMContentLoaded", function() {
         document.body.classList.add("loaded");
     });

     window.addEventListener("pageshow", function(event) {
         if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
             document.body.classList.remove(
                 "loaded");
             setTimeout(() => document.body.classList.add("loaded"), 0); // Hide the loader after a short delay
         }
     });

     window.addEventListener("beforeunload", function() {
         document.body.classList.remove("loaded");
     });
 </script>
