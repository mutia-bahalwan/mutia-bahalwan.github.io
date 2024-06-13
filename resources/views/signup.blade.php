<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
</head>
<body>
    <div class="hal-login">
        <div class="login">
            <form action="{{ route('signup-proses') }}" method="post">
                @csrf
                <div class="fullkonten">
                    <img src="images/2.png" alt="logo">
                    <h1>Signup</h1>
                    <hr>                    
                    <div class="isi">
                        <label for="uname"><b>Nama</b></label>
                        <input type="text" placeholder="Masukkan nama" name="name" value="{{ old('name') }}">
                        @error('name')
                            <small>{{ $message }}</small>
                        @enderror

                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Masukkan email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <small>{{ $message }}</small>
                        @enderror

                        <label for="kontak"><b>Kontak</b></label>
                        <input type="text" placeholder="Masukkan no telepon" name="kontak" value="{{ old('kontak') }}">
                        @error('kontak')
                            <small>{{ $message }}</small>
                        @enderror

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Masukkan password" name="password">
                        @error('password')
                            <small>{{ $message }}</small>
                        @enderror

                        <button type="submit" name="submit">Signup</button>
                    </div>
        
                    <div class="signup">
                        <p>Sudah punya akun? <span><a href="login.blade.php">Login</a></span></p>
                    </div>
                    
                    <div class="cancel">
                        <a href="welcome.blade.php">Cancel</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

    @if($message = \Illuminate\Support\Facades\Session::get('success')) 
    <script>
        Swal.fire("{{ $message }}");
    </script>
    @elseif($message = \Illuminate\Support\Facades\Session::get('failed'))
    <script>
        Swal.fire("{{ $message }}");
    </script>
    @endif

</body>
</html>