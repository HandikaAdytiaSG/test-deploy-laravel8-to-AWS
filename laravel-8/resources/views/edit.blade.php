<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/dashboard/profile-edit/{{$user->id}}" method="post">
        @method('put')
        @csrf

        <div class="form-floating mb-3">
          <input type="text" name="name" class="form-group form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="nama" autocomplete="off" value="{{$user->name}}">
          <label for="floatingInput">Masukkan Nama Pengguna Akun</label>

          @error('name')

          <div class="invalid-feedback">
            {{$message}}
          </div>

          @enderror

        </div>

        <div class="form-floating mb-3">
          <input type="text" name="email" class="form-group form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="Masukkan Email" autocomplete="off" value="{{$user->email}}">
          <label for="floatingInput">Masukkan Email Pengguna Akun</label>

          @error('email')

          <div class="invalid-feedback">
            {{$message}}
          </div>

          @enderror

        </div>
        <div class="container text-center">
            <div class="form-check d-inline me-5">
                <input class="form-check-input" type="radio" name="gender" id="gender" value="laki-laki" {{($user->gender == 'laki-laki') ? 'checked' : ''}} required>
                <label class="form-check-label" for="gender">
                    Laki-laki
                </label>
            </div>
            <div class="form-check d-inline ms-5">
                <input class="form-check-input" type="radio" name="gender" id="gender2" value="perempuan" {{($user->gender == 'perempuan') ? 'checked' : ''}} required>
                <label class="form-check-label" for="gender2">
                    Perempuan
                </label>
            </div>
          </div>
        <div class="form-group form-floating mt-3">
            <select class="form-select" id="floatingSelect" name="role" required>
                <option selected disabled>Pilih</option>
                <option value="admin"  {{($user->role == 'admin') ? 'selected' : ''}}>Admin</option>
                <option value="supervisor"  {{($user->role == 'supervisor') ? 'selected' : ''}}>Supervisor</option>
                <option value="freelancer"  {{($user->role == 'freelancer') ? 'selected' : ''}}>Freelancer</option>
            </select>
            <label for="floatingSelect">Pilih Role Pengguna Akun!</label>
        </div>
        <div class="form-group form-floating mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingInput" placeholder="password" value="{{$user->password}}">
          <label for="floatingInput">Masukkan Password Pengguna Akun</label>
        </div>
        
    
        <button type="submit" class="btn btn-primary  mb-2">Submit</button>
    
      </form>

      <br><br><br><br>
      <hr>
      <br><br><br><br>



</body>
</html>