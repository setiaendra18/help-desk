<form class="form-horizontal" action="{{ route('admin.pengaturan-sistem-update') }}" method="POST"
    enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Nama Sistem</label>
            <div class="col-sm-10">
                <input type="text" name="nama_sistem" class="form-control" placeholder="Sistem Informasi Gatotkaca .."
                    value="{{ $pengaturans_sistem->nama_sistem }}">
                @error('nama_sistem')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Nama Perusahaan / Instansi</label>
            <div class="col-sm-10">
                <input type="text" name="nama_instansi" class="form-control"
                    placeholder="PT. Gatotkaca / Dinas Gatotkaca .." value="{{ $pengaturans_sistem->nama_instansi }}">
                @error('nama_instansi')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Author / Pengguna</label>
            <div class="col-sm-10">
                <input type="text" name="author" class="form-control" placeholder="Author .."
                    value="{{ $pengaturans_sistem->author }}">
                @error('author')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Telephone / Whatsapp</label>
            <div class="col-sm-10">
                <input type="text" name="no_telephone" class="form-control" placeholder="0813000000"
                    value="{{ $pengaturans_sistem->no_telephone }}">
                @error('no_telephone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">E-mail</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" placeholder="gatotkaca@gmail.com"
                    value="{{ $pengaturans_sistem->email }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">URL / Domain Website</label>
            <div class="col-sm-10">
                <input type="text" name="url_domain" class="form-control" placeholder="https://gatotkaca.contoh"
                    value="{{ $pengaturans_sistem->url_domain }}">
                @error('url_domain')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Alamat</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="alamat" rows="8" placeholder="Jl. Gatotkaca, Bima, Sakti">  {{ $pengaturans_sistem->alamat }}</textarea>
                @error('alamat')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-grup">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                <img src="{{ url('public/images/logo/' . $sistem->logo_images . '') }}" width="150px">
            </div>
        </div>
        <div class="form-group">
            @error('logo_images')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <label class="col-sm-2 control-label">Logo Sistem</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="logo_images" onchange="previewImage(event)">
            </div>
            <div class="col-sm-5">
                <small>Preview Logo</small>
                <img id="preview" src="#" alt="Preview Gambar" style="max-width: 300px; display: none;">
            </div>
        </div>
        <div class="form-grup">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                <img src="{{ url('public/images/background/' . $sistem->background . '') }}" width="150px">
            </div>
        </div>
        <div class="form-group">
            @error('background')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <label class="col-sm-2 control-label">Background Image</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="background" onchange="previewBackground(event)">
            </div>
            <div class="col-sm-5">
                <small>Preview Background</small>
                <img id="backgroundPreview" src="#" alt="Preview Background" style="max-width: 300px; display: none;">
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> Simpan Perubahan</button>
    </div>
</form>
