<x-app-layout title="Homepage">
    @section('container')
        <div class="d-flex flex-wrap justify-content-center align-item-center hero-1">
            <div data-aos="fade-right" data-aos-delay="300" data-aos-duration="800" class="ornamen1">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="m-auto" data-aos="fade-zoom-in" data-aos-delay="500" data-aos-duration="800">
                <h1 class="text-banner">Discover the <br> book treasure</h1>
                <p class="motto flex-wrap">Be a mind explorer with every word you read,
                    <br>and let yourself be fully absorbed in unforgettable stories.
                </p>
                <div class="btn-explore">
                    <a class="btn-explorer" href="/library"> <b>Explore Now</b></a>
                </div>
            </div>
            <img class="banner" src="images/Saly-3.svg" alt="">
        </div>
        <div class="d-flex flex-wrap justify-between group-card gap-4">
            <div class="card-1 d-flex flex-column flex-wrap ">
                <div class="d-flex flex-column flex-wrap m-auto gap-2">
                    <h4>Literasi</h4>
                    <p>"Perkaya Pikiranmu dengan Literasi: E-Book sebagai Jendela Ilmu yang Terbuka Luas."</p>
                </div>
                <img src="images/Saly-24.svg" alt="">
            </div>
            <div class="card-1 d-flex flex-column flex-wrap">
                <div class="d-flex flex-column flex-wrap m-auto gap-2">
                    <h4>E-Book</h4>
                    <p>"Kemajuan dalam Genggamanmu. E-Book: Membuka Pintu Menuju Pengetahuan Tanpa Batas."</p>

                </div>
                <img src="images/Saly-8.svg" alt="">
            </div>
            <div class="card-1 d-flex flex-column flex-wrap">
                <div class="d-flex flex-column flex-wrap m-auto gap-2">
                    <h4>Pendidikan Digital</h4>
                    <p>"Menuju Era Pendidikan Digital: Membuka Peluang Baru, Mengubah Masa Depan."</p>
                </div>
                <img src="images/Saly-19.svg" alt="">
            </div>
        </div>
        <div class="logos-1">
            <div class="logos d-flex justify-content-center align-items-center flex-wrap">
                <img src="images/logo-mmd.png" alt="">
                <img src="images/Desain_tanpa_judul-removebg.png" alt="">
            </div>
        </div>
        <div class="hero-2 d-flex flex-column mt-5">
            <div class="d-flex flex-column flex-wrap m-auto">
                <h2>Ada apa saja disini?</h2>
                <p>"Damsobi: Temukan Petualangan di Antara Baris-baris,<br> Dengan E-Book Fiksi dan Non-Fiksi yang
                    Menghidupkan
                    Cerita."</p>
            </div>
            <div class="m-auto d-flex justify-content-evenly mt-5">
                <div class="content d-flex flex-column flex-wrap">
                    <img class="m-auto" src="images/logo-book.svg" alt="">
                    <h4 class="m-auto mt-3">Fiksi</h4>
                    <p>"Buku fiksi adalah jendela ke dunia lain yang menghidupkan imajinasi dan mengisi jiwa dengan
                        petualangan yang tak terbatas."</p>
                </div>
                <div class="content d-flex flex-column flex-wrap">
                    <img class="m-auto" src="images/logo-book.svg" alt="">
                    <h4 class="m-auto mt-3">Non Fiksi</h4>
                    <p>
                        "Buku nonfiksi membuka dunia pengetahuan, memperluas wawasan dan memperkaya pemahaman kita."</p>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
