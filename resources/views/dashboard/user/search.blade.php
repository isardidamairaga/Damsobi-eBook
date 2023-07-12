@if ($books->count() > 0)
    <div class="d-flex flex-column gap-2">
        @php $count = 0; @endphp
        @foreach ($books as $book)
            @if ($count < 5)
                <a href="{{ route('dashboard.bookpage', ['book' => $book->id]) }}" class="link-book">
                    <div class="d-flex">
                        <img class="buku-covers" src="{{ $book->cover_url }}" alt="">
                        <div class="container pencarian d-flex flex-column">
                            <p class="judul-buku ml-1 mt-2 mb-0">{{ $book->title }}</p>
                            <p class="author mb-0">{{ $book->author }}</p>
                        </div>
                    </div>
                </a>
                @php $count++; @endphp
            @else
            @break
        @endif
    @endforeach
</div>
@else
<p>Tidak ada hasil ditemukan</p>
@endif
