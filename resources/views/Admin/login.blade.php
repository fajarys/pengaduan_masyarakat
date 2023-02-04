<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
  integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <title>Login Petugas</title>

  {{-- style css --}}
  <style>
    body {
        background: #645CBB;
    }

    .btn-purple {
        background: #645CBB;
        width: 100%;
        color: #fff;
    }

</style>
  {{-- end style --}}
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <h4 class="text-center text-white mt-5">Pengaduan Masyarakat</h4>
            <div class="card mt-5">
                <div class="card-body">
                    <h3 class="text-center mb-3">Login Petugas</h3>
                    <form action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Username" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-purple">Masuk</button>
                    </form>
                </div>
            </div>
            @if (Session::has('pesan'))
            <div class="alert alert-danger mt-2">
                {{ Session::get('pesan') }}
            </div>
            @endif
            <a href="{{ route('pekat.index') }}" class="btn btn-warning text-white mt-3" style="width: 100%">Kembali ke Halaman Utama</a>
        </div>
    </div>
</div>
</body>
</html>