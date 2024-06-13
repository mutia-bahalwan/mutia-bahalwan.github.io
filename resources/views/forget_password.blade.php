<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
</head>
<body>
    <div class="hal-login">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <a href="{{ route('login') }}">Kembali ke halaman login</a>
        </div>
    @endif
    @if (session('failed'))
        <div class="alert alert-failed">
            {{ session('failed') }}
        </div>
    @endif
        <div class="login">
            <form action="{{ route('reset_password') }}" method="post">
                @csrf
                <div class="fullkonten">
                    <img src="images/2.png" alt="logo">
                    <h1>Reset Password</h1>
                    <hr>                    
                    <div class="isi">
                        <label for="password"><b>Password Baru</b></label>
                        <input type="password" placeholder="Masukkan password" name="password" required>
                        @error('password')
                            <small>{{ $message }}</small>
                        @enderror

                        <label for="password_confirmation"><b>Konfirmasi Password Baru</b></label>
                        <input type="password" placeholder="Masukkan Konfirmasi Password Baru" name="password_confirmation" required>
                        @error('password_confirmation')
                            <small>{{ $message }}</small>
                        @enderror

                        <button type="submit" name="submit">Ubah Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
