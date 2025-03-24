<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('back-end-assets/images/favicon-32x32.png')}}" type="image/png" />
    <!--plugins-->
    <link href="{{asset('back-end-assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <link href="{{asset('back-end-assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('back-end-assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('back-end-assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <link href="{{asset('back-end-assets/plugins/highcharts/css/highcharts.css')}}" rel="stylesheet" />
    <link href="{{asset('back-end-assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
    <!-- CSRF TOCKEN FOR TEMP IMAGE UPLODE -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- loader-->
    <link href="{{asset('back-end-assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('back-end-assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('back-end-assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('back-end-assets/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="{{asset('back-end-assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('back-end-assets/css/icons.css')}}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset('back-end-assets/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('back-end-assets/css/semi-dark.css')}}" />
    <link rel="stylesheet" href="{{asset('back-end-assets/css/header-colors.css')}}" />
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .required::after {
            content: " *";
            /* Add the asterisk */
            color: red;
            /* Style it with red color */
            font-size: 1em;
            /* Adjust size if needed */
        }
    </style>
    <title>Admin Dashboard</title>
    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Toaster message -->
    <style>
        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }

        .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
        }

        .colored-toast.swal2-icon-warning {
            background-color: #f8bb86 !important;
        }

        .colored-toast.swal2-icon-info {
            background-color: #3fc3ee !important;
        }

        .colored-toast.swal2-icon-question {
            background-color: #87adbd !important;
        }

        .colored-toast .swal2-title {
            color: white;
        }

        .colored-toast .swal2-close {
            color: white;
        }

        .colored-toast .swal2-html-container {
            color: white;
        }
    </style>
</head>