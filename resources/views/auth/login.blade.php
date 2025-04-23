<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Persewaan Mobil</title>

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- CSS Custom -->
    @vite(['resources/css/login.css'])
</head>

<body>
    <div class="main-container d-flex">
        <!-- Bagian Kiri (Form Login) -->
        <div class="left-panel d-flex align-items-center justify-content-center">
            <div class="form-container w-75">

                <div class="welcome-text text-center">
                    <h2>Login - Persewaan Mobil</h2>
                </div>

                {{-- Pesan error dari session --}}
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                {{-- Validasi error --}}
                @if ($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" >Login</button>
                </form>

                <div class="text-center mt-3">
                    <p>Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
                </div>
            </div>
        </div>

       <!-- Bagian Kanan (Ilustrasi) -->
    <!-- Bagian Kanan (Ilustrasi) -->
    <div class="right-panel d-none d-md-block">
        <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Mobil" class="centered-image">
        <h2 class="text">RENTAL MOBIL</h2>
    </div>


    <!-- Modal Pesan Error (jika mau pakai) -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesan Kesalahan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        <p>{{ $errors->first() }}</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            @if ($errors->any())
                $('#myModal').modal('show');
            @endif
        });
    </script>
</body>
</html>
