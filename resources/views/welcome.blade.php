<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stall Rental Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            /* Background image with cover */
            background-image: url('{{ asset('images/jenel.jpg') }}');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

            /* Make sure body takes full height */
            min-height: 100vh;
            margin: 0;

            /* flex to center content */
            display: flex;
            align-items: center;
            justify-content: center;

            position: relative;
            color: white; /* text white for contrast */
        }

        /* Dark transparent overlay
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 0;
        } */

        /* Container and card above overlay */
        .container,
        .card {
            position: relative;
            z-index: 1;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            background-color: rgba(255, 255, 255, 0.15); /* translucent white */
            backdrop-filter: blur(10px);
        }

        .btn-primary {
            background-color: #007bff;
            border-radius: 30px;
            border: none;
        }
    </style>
</head>

<body>

    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card p-5">
                    <h1 class="mb-4">🏠 Stall Rental Management System</h1>
                    <p class="lead mb-4">
                        Easily monitor, manage, and update rental stalls within Jenel Subdivision.
                        This system is for admin use only to track stall availability, tenants, and payment status.
                    </p>

                    <a href="{{ route('login') }}" class="btn btn-primary px-5">Admin Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional, for components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
