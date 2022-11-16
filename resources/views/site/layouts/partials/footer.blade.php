<footer id="footer">
    <div class="footer-inner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="widget-footer">
                        <div class="widget widget-logo">
                            <div class="logo-bottom" id="logo-footer">
                                <a href="index.html"><img src="/site/assets/images/logo/bimbel.png" alt="kinco"></a>
                            </div>
                            <p class="wrap f-mulish">
                                Spesialis Bimbel Privat CALISTUNG & Mapel SD
                            </p>
                            <div class="list-contact">
                                <ul>
                                    <li class="fx"><span><i class="far fa-map-marker-alt"></i>{{ env('BUSINESS_ADDRESS') }}</span></li>
                                    <li class="fx"><a href="https://www.instagram.com/{{ env('BUSINESS_INSTAGRAM') }}/"><i class="fab fa-instagram"></i> {{ env('BUSINESS_INSTAGRAM') }}</a></li>
                                    <li class="fx"><a href="wa.me/085340450143"><i class="fal fa-phone"></i> 085340450143</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="widget widget-link mt-5 ml-1 pl-1">
                            <h4 class="title-widget">Program Syameela Kids</h4>
                            <ul class="list-link">
                                @foreach($programs as $program)
                                    <li class="fx"><a href="#" class="wd-ctm f-mulish">{{ $program->name }}</a></li>

                                @endforeach
                            </ul>
                        </div>

                        <div class="widget widget-business mt-5">
                            <div class="inner">
                                    <div class="op-time">
                                        <h4 class="title-widget">jam tersedia</h4>
                                        <ul>
                                            <li><span class="f-mulish">Senin - Minggu</span></li>
                                            <li><span class="f-mulish">08:00 - 22:00 WITA</span></li>
                                        </ul>
                                    </div>
                                    <div class="cls-time">
                                        <p>Jadwal kelas dapat menyesuaikan dengan waktu anda.</p>
                                        <!-- <h4 class="title-widget"></h4> -->
                                    </div>
                            </div>
                        </div>
                        <!-- <div class="widget widget-news st-3">
                            <h4 class="title-widget">Artikel Terbaru</h4>
                            <ul class="list-news">
                                <li class="fx">
                                    <img src="assets/images/thumbnails/widget9.jpg" alt="Image" class="feature">
                                    <ul class="box-content">
                                        <li><h6 class="title"><a href="blog-grid.html">7 Cara Meningkatkan Kecerdasan Linguistik Anak</a></h6></li>
                                        <li><a href="blog-grid.html" class="fx meta-news clr-pri-6"><i class="far fa-calendar-alt"></i>25 dec 2021</a></li>
                                    </ul>
                                </li>
                                <li class="fx">
                                    <img src="assets/images/thumbnails/widget10.jpg" alt="Image" class="feature">
                                    <ul class="box-content">
                                        <li><h6 class="title"><a href="blog-grid.html">Dampak Positif Anak Belajar Calistung Sejak Dini</a></h6></li>
                                        <li><a href="blog-grid.html" class="fx meta-news clr-pri-6"><i class="far fa-calendar-alt"></i>25 dec 2021</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
                <div class="col-12">
                    <div class="footer-bottom jus-ct">
                        <p class="copy-right">Copyright © 2022 SyameelaKids</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>