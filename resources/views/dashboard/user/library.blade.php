<x-app-layout title="Library">
    @section('container')
        <div class=" container library">
            <!-- <div>
                <select id="category-select">
                    <option value="">Semua Kategori</option>
                    @foreach ($Category as $categories)
                        <option value="{{ $categories->id }}">{{ $categories->category }}</option>
                    @endforeach
                </select>
            </div> -->
            <div id="filtered-results" class="filtered-results"></div>
            <h3 class="judul-kategori">Buku</h3>
            <div class="d-flex flex-wrap gap-4" id="book-list">
                @foreach ($Book as $books)
                    <a href="{{ route('dashboard.bookpage', ['book' => $books->id]) }}" class="link-book">
                        <div class="card-book">
                            <img class="cover-book" src="{{ $books->cover_url }}" alt="">
                            <div class=" container d-flex flex-column">
                                <p class="judul-buku ml-1 mt-2 mb-0">{{ $books->title }}</p>
                                <p class="author mb-0">{{ $books->author }}</p>
                                <p class="author mt-1"> {{ $books->totaldibaca }}x dibaca</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="paginate">{{ $Book->links() }}</div>
    @endsection
</x-app-layout>
