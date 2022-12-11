@extends('../layout')
@section('content')
<?php
function showSuccess($success)
{   
    ?>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <span class="text-warning"><i class="bi bi-square-fill"></i></span>
            <strong class="me-auto">&nbsp;Alert</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?php echo $success ?>
        </div>
    </div>
    
<?php
}
?>
    <div class="w-75 m-auto">
        <div class="row">
            <div class="col-4">
                @if(session()->has('success'))
                <p><?php echo showSuccess(Session::get('success')); ?></p>
                @elseif(session()->has('error'))
                <p><?php echo showError(Session::get('error')); ?></p>
                @endif
            </div>
        </div>
        <form onsubmit="return confirm('Apakah anda yakin ingin mengubah data?')" action="{{ url('update-profile', Session::get('user_id')) }}" method="post">
            @csrf
            @method('PUT')
            <h1 class="h3 fw-bold text-center my-5">Profile</h1>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Email<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{ $getProfile['email'] }}" name="email">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nama<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ $getProfile['name'] }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nomor Handphone<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Nomor Handphone" name="no_hp" value="{{ $getProfile['no_hp'] }}">
                </div>
            </div>
            <hr>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Kata Sandi<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Kata Sandi" name="password" value="{{ Session::get('psw') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Konfirmasi Kata Sandi<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" name="confirm" value="{{ Session::get('psw') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Warna Navbar<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <select name="warna" class="form-control" id="warna">
                        <option value="">-Choose Navbar Color-</option>
                        <option value="blue" {{ (Cookie::get('warna_navbar') == 'blue' ? 'selected' : '') }}>Blue</option>
                        <option value="red" {{ (Cookie::get('warna_navbar') == 'red' ? 'selected' : '') }}>Red</option>
                        <option value="yellow" {{ (Cookie::get('warna_navbar') == 'yellow' ? 'selected' : '') }}>Yellow</option>
                    </select>
                </div>
            </div>
            <div class="m-auto my-5 text-center">
                <button class="w-25 btn btn-lg btn-primary" type="submit" name="btnUpdate">Update</button>
            </div>
        </form>
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start mb-5" style="margin-top:100px">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><img src="{{ asset('component/images/logo-ead.png') }}" alt="logoead" style="width:150px;"></li>
                <li><p class="text-muted mx-5">IKRAR QAFFAN_1202200084</p></li>
            </ul>
        </div>
    </div>
@endsection