<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit_profil.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
    <title>Edit Profil</title>
</head>
<body>
    <a href="/beranda"><img class="logo" src="images/1.png" alt="logo"></a>
    <h1>Edit Profil</h1>

    <!-- Menampilkan pesan sukses -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('failed'))
    <div class="alert alert-failed">
        {{ session('failed') }}
    </div>
    @endif

    <form action="{{ route('update-profil') }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label class="left-align" for="name">Nama:</label>
            <input type="text" id="name" name="name" value="{{ $user->name ?? '' }}" required>
        </div>

        <div class="form-group">
            <label class="left-align" for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email ?? '' }}" required>
            @error('email')
                <small class="error-message">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="left-align" for="kontak">Kontak:</label>
            <input type="text" id="kontak" name="kontak" value="{{ $user->kontak ?? '' }}" required>
            @error('kontak')
                <small class="error-message">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label class="left-align" for="address">Alamat:</label>
            <input type="text" id="address" name="address" value="{{ $user->address ?? '' }}" required>
        </div>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
