<div class="modal fade" id="tambahPengguna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog " role="document">
    <div class="modal-content">
        <div class="modal-header bg-blue-active">
            <h4 class="modal-title font-weight-bold">Tambah {{ $title }}</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="{{ route('admin.pengguna-store') }}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Pengguna</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="name Lengkap Pengguna Sistem">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                placeholder="personel@contoh.com">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Telephone</label>
                        <div class="col-sm-10">
                            <input type="text" name="telephone" value="{{ old('telephone') }}" class="form-control" placeholder="081300000"
                                maxlength="13">
                            @error('telephone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" value="{{ old('username') }}" class="form-control"
                                placeholder="agus1234">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control"
                                placeholder="***********">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Level</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="level">
                                <option value="admin">Admin</option>
                                <option value="teknisi">Teknisi</option>
                            </select>
                            @error('level')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Perubahan</button>
        </div>
        </form>
    </div>
</div>
</div>
<div class="modal fade" id="editPenggunaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog " role="document">
    <div class="modal-content">
        <div class="modal-header bg-warning">
            <h4 class="modal-title font-weight-bold">Update Data Pengguna </h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="{{ route('admin.pengguna-update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Pengguna</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="name Lengkap Personel" id="nameEdit">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                placeholder="personel@contoh.com" id="emailEdit">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Telephone</label>
                        <div class="col-sm-10">
                            <input type="text" name="telephone" value="{{ old('telephone') }}" class="form-control" placeholder="081300000"
                                maxlength="13" id="telephoneEdit">
                            @error('telephone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id" id="idEdit">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Simpan Perubahan</button>
        </div>
        </form>
    </div>
</div>
</div>
<div class="modal fade" id="rubahPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog " role="document">
    <div class="modal-content">
        <div class="modal-header bg-warning">
            <h4 class="modal-title font-weight-bold">Rubah Password </h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="{{ route('admin.pengguna-update-password') }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control"
                                placeholder="**********">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Konfirmasi Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="konfirmasi-password" class="form-control"
                                placeholder="**********">
                            @error('password-konfirmasi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id" id="idEdit">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Simpan Perubahan</button>
        </div>
        </form>
    </div>
</div>
</div>
