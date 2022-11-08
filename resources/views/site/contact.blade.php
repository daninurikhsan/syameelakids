@extends('site.layouts.master')

@section('content')

@include('site.contact.programs')

@include('site.contact.details')

<section>
    <div class="tf-section map">
        <div class="flat-map">
            <iframe class="map-content wow fadeInUp   animated" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15918.379165946833!2d117.702656!3d4.1025536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df147b6af967bab%3A0x3f7cf00715efeaf1!2s19%2C%20Jl.%20Borobudur%20No.39%2C%20Muara%20Rapak%2C%20Kec.%20Balikpapan%20Utara%2C%20Kota%20Balikpapan%2C%20Kalimantan%20Timur%2076124!5e0!3m2!1sen!2sid!4v1667929419451!5m2!1sen!2sid" width="1720" height="655" style="border: 0px; visibility: visible; animation-name: fadeInUp;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>
@endsection