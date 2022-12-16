@extends('layout')
@section('content')

<section id="home">
    <div class="container">
      <div class="d-flex justify-content-center align-items-center mt-5">
        <div>
          <h1>Selamat Datang<br /> Di Show Room Ikrar</h1>
          <p class="mt-3 text-muted">Berbekal pengalaman panjang yang didukung dengan sumber daya dan pabrik berstandar internasional, kami menghadirkan produk terbaik mulai dari kendaraan, mesin, komponen kendaraan, dan alat produksi.</p>
          @if(Session::get('login') == null)

          @else
          <a class="btn btn-primary w-25" href="{{ ($jmlData > 0) ? '/list-car' : '/add-car' }}">My Car</a>
          @endif
          <div class="d-flex align-items-center gap-5 mt-5">
            <img src="{{ asset('component/images/logo-ead.png') }}" alt="logoead" style="width:100px;">
            <p style="margin-top: 20px; font-size:14px;">IKRAR_1202200084</p>
          </div>
        </div>
        <img src="{{ asset('component/images/car1.jpg') }}" alt="mobil">
      </div>
    </div>
  </section>

@endsection