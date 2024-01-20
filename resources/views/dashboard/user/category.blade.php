<!-- @foreach ($books as $book)
    <a href="{{ route('dashboard.bookpage', ['book' => $book->id]) }}" class="link-book">
        <div class="card-book">
            <img class="cover-book" src="{{ $book->cover_url }}" alt="">
            <div class="container d-flex flex-column">
                <p class="judul-buku ml-1 mt-2 mb-0">{{ $book->title }}</p>
                <p class="author mb-0">{{ $book->author }}</p>
                <p class="author mt-1">{{ $book->totaldibaca }}x dibaca</p>
            </div>
        </div>
    </a>
@endforeach -->
