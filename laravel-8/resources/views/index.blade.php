<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/dashboard-add" method="post">

        @csrf

        <div class="form-floating mb-3">
          <input type="text" name="name" class="form-group form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="nama" autocomplete="off">
          <label for="floatingInput">Masukkan Nama Pengguna Akun</label>

          @error('name')

          <div class="invalid-feedback">
            {{$message}}
          </div>

          @enderror

        </div>

        <div class="form-floating mb-3">
          <input type="text" name="email" class="form-group form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="Masukkan Email" autocomplete="off">
          <label for="floatingInput">Masukkan Email Pengguna Akun</label>

          @error('email')

          <div class="invalid-feedback">
            {{$message}}
          </div>

          @enderror

        </div>
        <div class="container text-center">
            <div class="form-check d-inline me-5">
                <input class="form-check-input" type="radio" name="gender" id="gender" value="Laki-laki" required>
                <label class="form-check-label" for="gender">
                    Laki-laki
                </label>
            </div>
            <div class="form-check d-inline ms-5">
                <input class="form-check-input" type="radio" name="gender" id="gender2" value="Perempuan" required>
                <label class="form-check-label" for="gender2">
                    Perempuan
                </label>
            </div>
          </div>
        <div class="form-group form-floating mt-3">
            <select class="form-select" id="floatingSelect" name="role" required>
                <option selected disabled>Pilih</option>
                <option value="admin">Admin</option>
                <option value="supervisor">Supervisor</option>
                <option value="freelancer">Freelancer</option>
            </select>
            <label for="floatingSelect">Pilih Role Pengguna Akun!</label>
        </div>
        <div class="form-group form-floating mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingInput" placeholder="password">
          <label for="floatingInput">Masukkan Password Pengguna Akun</label>
        </div>
        
    
        <button type="submit" class="btn btn-primary  mb-2">Submit</button>
    
      </form>

      <br><br><br><br>
      <hr>
      <br><br><br><br>




                  {{-- Tabel Daftar Akun --}}
                  <div class="card mb-4">
                    <div class="card-header mb-2">
                        <i class="fas fa-table me-1"></i>
                        Daftar Akun
    
    
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Posisi</th>
                                    <th class="text-center">Bergabung pada</th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Posisi</th>
                                    <th class="text-center">Bergabung pada</th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                
                                @foreach ($users as $key => $user)
                                    
                                    <tr>
                                        <td>{{$key += 1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->role}}</td>
                                        <td>{{ date('d F, Y', strtotime($user->created_at)) }}</td>
                                        <td class="text-center">
                                            
                                                {{-- Hapus --}}
                                            <form action="/dashboard-delete/{{$user->id}}" method="POST">
                                                @csrf
                                                @method('delete')
    
                                                <button type="submit" class="btn btn-danger btn-sm d-inline" onclick="confirm('anda yakin?')">
                                                    hapus
                                                </button> 
                                            </form>
                                            
                                        </td>
                                        <td class="text-center">
                                            
                                                {{-- Edit --}}
                                                <button class="btn btn-success btn-sm d-inline"><a href="/dashboard/profile-edit/{{$user->id}}" class="text-gray-100">
                                                    edit
                                                </a> </button>
    
                                        </td>
                                        
                                    </tr>
                                
                                @endforeach    
    
                            </tbody>
                        </table>
                    </div>
                </div>


</body>
</html>