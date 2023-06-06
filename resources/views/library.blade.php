<x-app-layout title="Library">
    @section('container')
        <div class=" container library">
            <button type="button" class="btn btn-outline-secondary">Fiksi</button>
            <button type="button" class="btn btn-outline-secondary">Non Fiksi</button>
            <h3 class="judul-kategori">Most Popular</h3>
            <div class="d-flex flex-wrap gap-4">
                @for ($i = 0; $i < 10; $i++)
                    <a href="/" class="link-book">
                        <div class="card-book">
                            <img class="cover-book" src="images/covGA001938.jpg" alt="">
                            <div class=" container d-flex flex-column">
                                <p class="judul-buku ml-1 mt-2 mb-0">Kambing Jantan</p>
                                <p class="author mb-0">Raditya Dika</p>
                                <p class="author mt-1"> 10x dibaca</p>
                            </div>
                        </div>
                    </a>
                @endfor
            </div>
            <h3 class="judul-kategori">New Release</h3>
            <div class="d-flex flex-wrap gap-4">
                @for ($i = 0; $i < 6; $i++)
                    <a href="/" class="link-book">
                        <div class="card-book">
                            <img class="cover-book" src="images/cover.jpeg" alt="">
                            <div class=" container d-flex flex-column">
                                <p class="judul-buku ml-1 mt-2 mb-0">Kesetiaan</p>
                                <p class="author mb-0">Damsobi</p>
                                <p class="author mt-1"> 20x dibaca</p>
                            </div>
                        </div>
                    </a>
                @endfor
            </div>
        </div>
    @endsection
</x-app-layout>
