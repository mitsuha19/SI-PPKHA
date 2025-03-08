<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SI-PPKHA</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- Box Icons --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>

<body style='overflow-y:hidden'>
    <div class="container-fluid-navbar" style="overflow:auto">
        @yield('content')
    </div>

    <script src="{{ asset('assets/js/form-builder.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        function showLogoutConfirmation(event) {
            event.preventDefault(); // Prevent default link behavior
            Swal.fire({
                title: "Are you sure you want to leave?",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "Cancel",
                background: "linear-gradient(to bottom, #a2d9e0, #468c98)", // Teal gradient matching your image
                backdrop: true, // Use default backdrop (or 'swal2-backdrop-blur' for custom blur)
                width: '500px', // Maintain larger width
                customClass: {
                    popup: 'swal-popup',
                    title: 'swal-title',
                    confirmButton: 'swal-confirm',
                    cancelButton: 'swal-cancel'
                },
                buttonsStyling: false // Disable default button styling to apply custom CSS
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Logged out!",
                        text: "You have successfully logged out.",
                        icon: "success",
                        background: "linear-gradient(to bottom, #a2d9e0, #468c98)", // Match the success message background
                        confirmButtonColor: "#4aa3a3", // Teal color for the confirm button in success message
                        width: '500px', // Maintain larger width for the success message
                        backdrop: true, // Use default backdrop (or 'swal2-backdrop-blur' for custom blur)
                        customClass: {
                            popup: 'swal-popup',
                            title: 'swal-title',
                            confirmButton: 'swal-confirm'
                        },
                        buttonsStyling: false
                    }).then(() => {
                        window.location.href = '/logout'; // Replace with your actual logout route
                    });
                }
            });
        }
    </script>
</body>
@include('sweetalert::alert')

</html>
