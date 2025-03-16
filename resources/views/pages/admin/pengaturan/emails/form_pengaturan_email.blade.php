<form class="form-horizontal" action="{{ route('admin.pengaturan-email-update') }}" method="POST">
    @method('PUT')
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">MAILER</label>
            <div class="col-sm-10">
                <select name="mailer" class="form-control">
                    <option value="SMTP" {{ $pengaturans_email->mailer == 'SMTP' ? 'selected' : '' }}>SMTP</option>
                    <option value="IMAP" {{ $pengaturans_email->mailer == 'IMAP' ? 'selected' : '' }}>IMAP</option>
                    <option value="POP3" {{ $pengaturans_email->mailer == 'POP3' ? 'selected' : '' }}>POP3</option>
                </select>
                @error('mailer')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">EMAIL</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" placeholder="no-reply@gatotkaca.com"
                    value="{{ $pengaturans_email->email }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">EMAIL HOST</label>
            <div class="col-sm-10">
                <input type="text" name="mail_host" class="form-control" placeholder="smtp.gatotmail.com"
                    value="{{ $pengaturans_email->mail_host }}">
                @error('mail_host')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">ENCRYPTION</label>
            <div class="col-sm-10">
                <select name="encryption" class="form-control">
                    <option value="TLS" {{ $pengaturans_email->encryption == 'TLS' ? 'selected' : '' }}>TLS (Transport Layer Security)</option>
                    <option value="SSL" {{ $pengaturans_email->encryption == 'SSL' ? 'selected' : '' }}>SSL (Secure Sockets Layer)</option>
                </select>
                @error('encryption')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">PORT</label>
            <div class="col-sm-10">
                <input type="number" name="port" class="form-control" placeholder="587"
                    value="{{ $pengaturans_email->port}}">
                @error('port')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">USERNAME</label>
            <div class="col-sm-10">
                <input type="text" name="username" class="form-control" placeholder="gatotkaca"
                    value="{{ $pengaturans_email->username }}">
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">PASSWORD</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" placeholder="********"
                    value="{{ $pengaturans_email->password }}">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> Simpan Perubahan</button>
    </div>
</form>
