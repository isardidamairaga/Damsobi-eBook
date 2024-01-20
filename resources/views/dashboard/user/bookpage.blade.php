<x-app-layout title="{{ $book->title }}">
    @section('container')
        <div class="buku1 context">
            <div class="about-book d-flex flex-row gap-2 m-auto p-5 rounded-lg bg-white">
                <div class="book-cover">
                    <img src="{{ $book->cover_url }}" alt="">
                </div>
                <div class="book-info d-flex flex-column justify-between p-1 gap-2">
                    <div class="txt-info d-flex flex-column">
                        <h1 class="judul">{{ $book->title }}</h1>
                        <p>Oleh <span>{{ $book->author }}</span></p>
                        <p>Diupload pada {{ $book->created_at->format('d/m/Y') }} </p>
                        <p>{{ $totaldibaca }}x dibaca</p>
                    </div>
                    <a class="baca" href="{{ route('dashboard.read', ['book' => $book->id]) }}">
                        <div class="btn read">
                            Baca Sekarang
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- sinopsis -->

        <!-- <div class="description-book">
            <h1>Sinopsis</h1>
            <p>{{ $book->sinopsis }}</p>
        </div> -->
    @endsection
</x-app-layout>
