<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Vendor Stall Monitoring')</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding-top: 70px;
            background-color: #f8f9fa;
        }
        .stall-box {
            width: 150px;
            height: 100px;
            margin: 10px;
            border-radius: 8px;
            color: white;
            text-align: center;
            padding: 10px;
            display: inline-flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-weight: 600;
            font-size: 1.2rem;
            user-select: none;
        }
        .stall-box.vacant {
            background-color: #198754; /* Bootstrap green */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .stall-box.vacant:hover {
            background-color: #157347;
        }
        .stall-box.occupied {
            background-color: #dc3545; /* Bootstrap red */
            cursor: default;
        }
    </style>

    @stack('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{ route('stalls.index') }}">Vendor Stalls</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('stalls.index') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('stalls.history') }}">Rental History</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success my-3">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger my-3">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Main Content --}}
    @yield('content')
</div>

<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>
