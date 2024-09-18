<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield("title")</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href={{asset("assets/img/kaiadmin/favicon.ico")}} type="image/x-icon" />

    <!-- Fonts and icons -->


    <!-- CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href={{asset("assets/css/bootstrap.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/css/plugins.min.css")}} />
    <link rel="stylesheet" href={{asset("assets/css/kaiadmin.min.css")}} />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href={{asset("assets/css/demo.css")}} />
    @stack("css")
</head>


