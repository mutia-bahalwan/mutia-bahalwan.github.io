<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
</head>
<body>
    <div class="hal-login">
        <div class="login">
            <form action="{{ route('email-forgetPassword') }}" method="post">
                @csrf
                <div class="fullkonten">
                    <img src="images/2.png" alt="logo">
                    <h1>Reset Password</h1>
                    <hr> 
                    <p class="reset_password">Masukkan email Anda yang sudah terdaftar</p>                   
                    <div class="isi">
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Masukkan email" name="email">
                        @error('email')
                            <small>{{ $message }}</small>
                        @enderror
                        <button type="submit" name="submit">Submit</button>
                    </div>                  
                </div>
            </form>
        </div>
    </div>
</body>
</html>