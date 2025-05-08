<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/images/favicon.png') }}">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row w-100">
            <div class="col-lg-4 col-md-6 mx-auto">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">Login</h2>
                </div>

                <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="container d-flex justify-content-center align-items-center mb-3">
                    <img src="{{ asset('public/images/logo.png') }}" alt=""
                        style="width: 250px; height: 200px;">
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email"
                                    value="{{ old('email') }}" required placeholder="Enter Email Address">
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-lg" id="password"
                                        name="password" required placeholder="Enter Password">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        👁️
                                    </button>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.textContent = type === 'password' ? '👁️' : '🙈'; // Optional icon change
        });
    </script>

</body>

</html>
