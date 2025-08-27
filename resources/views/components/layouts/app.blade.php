<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Anthony Osadolor</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Ighiwiyisi Anthony Osadolor, Anthony, Osadolor, Ighiwiyisi" name="keywords">
        <meta content="Dedicated, Patient and Focused, young adventurous Programmer" name="description">

        <!-- Favicon -->
        <link rel="icon" href="{{ url('/public/assets/img/relicon.jpg') }}" type="image/jpg">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                
            </div>
        </div>
        <!-- Spinner End -->
        
        {{ $slot }}

        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('assets/lib/typed/typed.min.js') }}"></script>
        <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/lib/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/lib/lightbox/js/lightbox.min.js') }}"></script>

        <!-- Email Javascript File -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            function errorReport(str){
                console.log(str)
                Swal.fire({
                    title: 'Empty Field Found!',
					text: '"'+ str + '" Field is Empty, Pls, Enter a Valid Response',
					icon: 'error',
					allowOutsideClick: false,
				});
            }

            $('#contactMe').on('submit', function(event) {
                event.preventDefault(); // prevent reload
                var from_name = document.getElementById("from_name").value;
                var sender_email = document.getElementById("sender_email").value;
                var msg_subject = document.getElementById("msg_subject").value;
                var main_message = document.getElementById("main_message").value;

                if(from_name == ""){
                    document.getElementById("from_name").focus();
                    errorReport("Your Name");                    
                    return false;
                }else if(sender_email == ""){
                    document.getElementById("sender_email").focus();
                    errorReport("Your Email");
                    return false;
                }else if(msg_subject == ""){
                    document.getElementById("msg_subject").focus();
                    errorReport("Message Subject"); 
                    return false;
                }else if(main_message == ""){
                    document.getElementById("main_message").focus();
                    errorReport("Message"); 
                    return false;
                }
			});

            document.addEventListener('livewire:init', () => {
                // On Success
                Livewire.on('success', (event) => {
                    event.forEach(function(element){
                        Swal.fire({
                            title: element.title,
                            text: element.message,
                            icon: element.status,
                            allowOutsideClick: false,
                        });
                    });
                });

                // On Error
                Livewire.on('error', (event) => {
                    event.forEach(function(element){
                        Swal.fire({
                            title: element.title,
                            text: element.message,
                            icon: 'error',
                            allowOutsideClick: false,
                        });
                    });
                });

                // On Info
                Livewire.on('info', (event) => {
                    event.forEach(function(element){
                        Swal.fire({
                            title: element.title,
                            text: element.message,
                            icon: 'info',
                            allowOutsideClick: false,
                        });
                    });
                });

                // On Warning
                Livewire.on('warning', (event) => {
                    event.forEach(function(element){
                        Swal.fire({
                            title: element.title,
                            text: element.message,
                            icon: 'warning',
                            allowOutsideClick: false,
                        });
                    });
                });

                // On Question
                Livewire.on('question', (event) => {
                    event.forEach(function(element){
                        Swal.fire({
                            title: element.title,
                            text: element.message,
                            icon: 'question',
                            allowOutsideClick: false,
                        });
                    });
                });
            });
		</script>

        <!-- Template Javascript -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>
