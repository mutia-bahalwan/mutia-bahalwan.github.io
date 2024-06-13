<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
</head>
<body>
    <div class="hal-login">
        @if (session('failed'))
        <div class="alert alert-failed">
            {{ session('failed') }}
        </div>
        @endif
        <div class="login">
            <form action="{{ route('login-proses') }}" method="post">
                @csrf
                <div class="fullkonten">
                    <img src="images/2.png" alt="logo">
                    <h1>Login Member</h1>
                    <hr>                    
                    <div class="isi">
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Masukkan email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <small>{{ $message }}</small>
                        @enderror

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Masukkan password" name="password">
                        @error('password')
                            <small>{{ $message }}</small>
                        @enderror

                        <button type="submit" name="submit">Login</button>
                    </div>

                    <div class="forgetpswd">
                        <a href="{{ route('email_forgetPassword') }}">Lupa kata sandi?</a>
                    </div>
        
                    <div class="signup">
                        <p>Belum punya akun? <span><a href="signup.blade.php">Signup</a></span></p>
                    </div>
                    
                    <div class="cancel">
                        <a href="welcome.blade.php">Cancel</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}


</body>
</html>