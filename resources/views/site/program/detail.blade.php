@extends('site.layouts.master')

@section('content')

<section class="tf-section tf-classe-detail">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                <article class="article tf-details">
                    <h2 class="heading">{{ $program->name }}</h2>
                    <div class="image m-b30 wow fadeInUp animated" data-wow-delay="0.3ms"
                        data-wow-duration="1000ms">
                        <img src="{{ asset('storage/' . $program->bg_cover) }}" alt="">
                    </div>

                    <div class="teacher-desc">
                        <ul class="fx m-b17">
                            <li class="style"><span>{{ mb_substr($program->description,0,1) }}</span></li>
                            <li><span class="f-mulish">{{$program->description}}</span></li>
                        </ul>
                    </div>
                   
                </article>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                <div id="sidebar" class="classe-details p-t17 wow fadeInRight animated"
                    data-wow-delay="0.3ms" data-wow-duration="1000ms">
                    <div class="widget widget-infor-details">
                        <h4 class="title-widget bg-style1"><svg xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40"
                                viewBox="0 0 40 40">
                                <image width="40" height="40"
                                    xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAFR0lEQVRYhcWYe4hWVRTFf84446Q26mRK7+wxpdNUUlpREkEQVNQfRZLVH1oRPYgkkiixtEzKHpNlTJJjD3sMQokRIRGVNhk9FIJKx9FSUzOmaNTmod+4Y4/rjrf7+r6ZT2zB5d57zt7nrnvOOvvsczCz/+s6w8wazKzZzK5N41DCkcck4BtgIzAVOBMYm8biSBK8EvgBWAWcDtwFDAH2A0fFrI8gwQuBJuATYCRwG3AMsAhoB8oAi3kJA2Mlhw9OYgEwRUT8/m6k9UG694tgOXAqcBZQDZwCjAaqgAqgG9gJrAU+B74N+d4PvKjn6UBdrPVkonGEZkypmU02s4/NbI8lo9PMdpnZVjPbbmb7IlavmtloM3vSzBrNrDJpZoauCvlNM7MRZrbUzG5WeY9d2PgGGTu5FWY2y8xuNLNaMxuW0HhwDTezq0XO0ZRgE1yDzOxRM1uu9xL5TDGzUaEfnppEcLoqkxou9FplZn8m2I4xs/pQT69T+QC9zw7Z/uc9PIu7dD86poPC4ZreHbJ2/b4HbFZYaVCIGR/RXi7yhX3BgxP8UQ4b8wo2PwaEZqQH5PXAZGCmJt3tIhtF4BN827mMA34u0cPxwJ6YWzIGJJbG8Rtwq+LcXAXkUuBhYEW0pyJwLicAZwdD3KGGwhgOPAB84H8C7NWfHtDdJbFeISUJvwBva/hOBl7X8zzgRNmnxb8yccqMg7XACzL8CVipuLdbw+V/6GvocTHPQ6gBZgE3qaRBBFv0nldOWQS/Air7MPRRXAasVtls4AkF9z4hay3uTiFXVqAOt2vdddvH1Z77PgS8L5s0DfYii+Aw4D5gObBNHzA1GuhwWx4NLtWzy+EN+T4DnKbyNA32ImuIXYMvaTJ8r2zkD/Wqa+dY4AKtz2kYK81dr/pXlEBs0HtRGvwaGAH8HaspDJcCX8pyjkJN3iGNImuIcwnkyjRxKmLWcexUxuwafEzkPEF9EGiUddEa9OVpmfQU6K9NocfftwD3xjwPYrNiH9LgYsXSZ0MpflEaPBeo1+TwnO8zTYo2pei++lysexo8j3weuEb1C3Rt0ntRGlyjrPivWE1hmKT9B1qLnwM6+9pI1hDnEsiVSkflMes4dgB3SINzRc59H1GGQ7Ea9Bl8p/YRLRrqnHTUJf34UN0T8zyITdKdY4w2SXtFtkblRWtwkRpZJ6JbFAeDtfgi4KSY5yFUKzAHcXAh8LS0TLEabFIwbo3VFIbLtZlyzABeDjKUEAJNRjOpggjmUshVqC6aBUfhvTQNeDMjSQiynFSppVZoe+lbxneUGe/TcHco+fTn5gwNehxckkDOt6/zVd6okVoW8xayerBWMSynbYFnIFuVD5ZJexO1dy4E5yvtuk62H2qdXpPlm0VwtcJCe6wmG9FRGa/JcYneZ2oj/09mKwUQPNAPcuWhHNJ3dK8pce1QTFwc88iDLA32B60iWS/dTgDuBgb3hxx5erA/yCn2VSu0zC+2wTDBoDejoWWIktKRynCGqpd8FvtS+GtoE7RQs/KpUJvnKaEYKp9OycB9dwG/h74VHB708goeuqU5xy3KlK/QkpQaRCNYqdRrpZYz19yomFUyfP/yBfBpaEvbw6fnbETLmv9Zc8jde+U7nYq26G/btJ7uVxJQpaOMq3T+Nzjk75nMR0rVdsgPBfpK+fr++BwtmRNDHTZB4WxDcFjzlg5rxoWPvvpxrTWz1iIPoGp0r3NiA3V6UCeBL1EArlJvFDqJghUm0Jqfx3gvFRolfDh9BF2Xrk/frPmOcl7AekbKgWVf0WVm7YeprTlmxr+2LDj7Hwc5XwAAAABJRU5ErkJggg==" />
                            </svg>
                            Informasi</h4>
                        <div class="inner-infor">
                            <ul>
                                @if($program->is_package == 1)
                                    @foreach($program->sessions as $session)
                                        <li>
                                            <span>Paket {{ $session->session }}x Pertemuan</span>
                                        </li>
                                        <li>
                                            <span><i class="fal fa-usd-circle"></i>Harga Paket {{ $session->note }}</span>
                                            <span class="style">@rupiah($session->price) /bulan</span>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <span><i class="fal fa-usd-circle"></i>Harga Paket</span>
                                        <span class="style">@rupiah($program->price_per_session) /pertemuan</span>
                                    </li>
                                @endif
                            </ul>
                            <a href="/kontak" class="fl-btn st-1">
                                <span class="inner">Daftar</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="tf-section tf-courses">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-heading st-3">
                    <div class="sub-heading clr-pri-3 f-mulish">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="77" height="30" viewBox="0 0 77 30">
                            <g>
                                <image width="77" height="30"
                                    xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEPklEQVRogd2Ze4hVVRTGf+pNHRtnegxqlonUMJYGY/pXWoFEJpVBTFRDaBbOVmxC/5GUUFJMqQh6MLUjfARBUVGEYi9rqFQU0UrQ8pXvMkcLmbJSZ2TdvlOHy73de+fOmXPv/eCwD+ewz9n7O2utb611enU2NZEGA4F+QFu6m2UF7/PeTe8M17cA48qesC4iHWk3AiOB70tiBzEgHWmfAr8CB8p+911EKmn1wGXAlyWzgxiQStpyjZ+V/c4LQCI0tQKYqPN8SDPia2Wl1wBXSH0D/AYcB3YD3wL7gY64N14IwqRNAi4CjuQgAv2Be3RMkksHOAOcBs6KvEqgT+h+m+LmWuAD4PeiYSNHhEm7S+P6/5l6FTAXeBSoFgGfAJ8D3wG7RFgY9iGuliKPByYA9wMPAu3A28CzwA9xEpEPwqTdprE1zfxLgSeBZrnje8BKWcz5LO8zi9unY62uDQIagNn6AI8AbwHzgYM9S0H+CIRgGDBc51+nPKVBFjQHWK34ZZbyUQ6EZcIvQAswGpgMbJfl2XueSHHnokNA2q0ajwF7dW7C8DrwjoL3GGAG8GM3bqJT5Fv18bDi4TK5+5XFTtp4jZs1mvt8oY2YW96smBUVOmXFo4B1wC0q5cb0PCXZEZAW1JlbFOw3KnDfASwtwA3zxc/A3RKGoUqyb+qhd+eM3hKDGzThkISgWtYVR5JrH2ieRKFSllcfwzoywki7Xm0gwyLgEiW5O2Jem1UnC4Aqxb1hsa7GuRqcszifJO260K0RwL1FQFgAE4VXgMFKhAfEuJYXgT9wLpFQ7AqwSBVB2B0sYz8FnIxnrTwO1Mn6jcBpPb4C5yxMTElmFt6fS2hBAZ7WkQ5nFPMOA3tUR34F7Ix4yeeAB5TLTQU2Aa9G/M5UPARcDLyMRKA9x4kVIrguVD0YjgIfqkpojUhpTyihtue/AGyT0kcP5/oqtqKEPElak9IKc8leoUUMUGFeJRWz43KlAoOUfAbjLB3m2quAJcDf3byhDaoWngPeBcaKzKgxRyLUjPdnCdWeB7tY85mQ1KggNxG5VqT2jYA0w/PK20ys3pfF/xnBe/6Bc1bmPSXvaQkuJ7JMy4YO1ZF2bI1s8f+hU0JQqyrmDdWs3R8SnBuqBkP/ZGfG+397gJn+RhUz2qVkFkvvE3HdW+A7NwT4WB60Hu83hG+XImnop8/t6uc1AmuUlBcO5+qk0KP1Ye5MfWah7hkndqqwX6Ma2RoKj0nJ84dzZkAzgWeUXhxIdn+8/yv1WZn+sJcSTIjelOWhfuBidaBz+RfRT+6+UNaFWlONeH883YRStrQAbfpPMVXdkQlqwf+kuGSu9o1+7nRoz4NF0ES5X5WedULkvRYO/KkoB0sLwxLw6WrLj8x9WrLxugJ4Ce+zJvvlRloYRpq10i1pt6aEJeIWqyxGmdVZzLKqohXvg+ZrdgAXAIwK6LO/4gPOAAAAAElFTkSuQmCC" />
                            </g>
                        </svg>
                        <span class="inner-sub st-1">Syameela Kids</span>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="77" height="30" viewBox="0 0 77 30">
                            <g>
                                <image width="77" height="30"
                                    xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII=" />
                            </g>
                        </svg>
                    </div>
                    <h2 class="title clr-pri-2">Paket Privat Lainnya</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="slider-courses">

                    <div class="themesflat-carousel clearfix" data-margin="30" data-item="3" data-item2="3"
                        data-item3="2" data-item4="1" data-auto="false" data-nav="true" data-loop="false">

                        <div class="owl-carousel owl-theme none">
                        @foreach($programs as $program)
                            @if($program->is_package == 1)
                                <div data-dot="" class="item-courses wow fadeIn animated" data-wow-delay="0.3ms"
                                    data-wow-duration="1300ms">
                                    <div class="box-feature">
                                        <img src="{{ asset('storage/' . $program->bg_cover) }}" alt="Image">
                                    </div>
                                    <div class="box-content">
                                        <div class="box-wrap">
                                            <h4 class="title">
                                                <a href="classe-details.html">
                                                    {{ $program->name }}
                                                </a>
                                            </h4>
                                            <p class="sub f-mulish">
                                                {{ $program->short_description }}. <br>
                                                <!-- <B> -->
                                                <!-- 1 Jam: Rp 320.000/Bulan <br>
                                                    1,5 Jam: RP 360.000/Bulan </B> -->
                                            </p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p style="font-size: 18px ;">
                                                    <i class="far fa-book clr-pri-6 mr-2"></i>
                                                    8x & 12x pertemuan
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <p style="font-size: 18px ;">
                                                    <i class="far fa-usd-circle clr-pri-3"></i>
                                                    @rupiah(min($program->sessions->pluck('price')->toArray())) - @rupiah(max($program->sessions->pluck('price')->toArray()))
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <p style="font-size: 18px ;">
                                                    <i class="far fa-clock clr-pri-8 mr-2"></i>
                                                    1 Bulan
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @else 
                                <div data-dot="" class="item-courses wow fadeIn animated" data-wow-delay="0.3ms"
                                    data-wow-duration="1300ms">
                                    <div class="box-feature">
                                        <img src="{{ asset('storage/' . $program->bg_cover) }}" alt="Image">
                                    </div>
                                    <div class="box-content">
                                        <div class="box-wrap">
                                            <h4 class="title">
                                                <a href="classe-details.html">
                                                    {{ $program->name }}
                                                </a>
                                            </h4>
                                            <p class="sub f-mulish">
                                                {{ $program->short_description }}. <br>
                                                <!-- <B> -->
                                                <!-- 1 Jam: Rp 320.000/Bulan <br>
                                                    1,5 Jam: RP 360.000/Bulan </B> -->
                                            </p>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p style="font-size: 18px ;">
                                                    <i class="far fa-book clr-pri-6 mr-2"></i>
                                                    1x pertemuan
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <p style="font-size: 18px ;">
                                                    <i class="far fa-usd-circle clr-pri-3"></i>
                                                    @rupiah($program->price_per_session)
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif
                            
                        @endforeach
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
</section>

@endsection