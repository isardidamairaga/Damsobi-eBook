<x-admin-layout title="Edit">
    @section('container')
        <main>
            <h1>Edit Book</h1>
            <form action="{{ Route('dashboard.books.update', ['book' => $book->id]) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="merge-form d-flex gap-3 justify-content-center align-items-center">
                    <div class="form-1">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input value="{{ old('title', $book->title) }}" type="text" id="title" name="title"
                                class="form-control @error('title') is-invalid @enderror" required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" value="{{ old('author', $book->author) }}" id="author" name="author"
                                class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Kategori:</label>

                            <select id="category" name="category_id" class="form-control" required>
                                <option value="" disabled>Pilih kategori</option>
                                @foreach ($categories as $category)
                                    @if (old('category', $book->category) == $category->category)
                                        <option value="{{ $category->id }}" selected>{{ $category->category }}</option>"
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>"
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <div class="drop-zone">
                                <span class="drop-zone__prompt">Drag File Here or Click to Upload PDF File</span>
                                <input type="file" name="book_file" id="image" accept="application/pdf" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sinopsis">Sinopsis</label>
                            <textarea id="sinopsis" name="sinopsis" class="form-control" rows="4" required>{{ $book->sinopsis }}</textarea>
                        </div>
                    </div>
                    <div class="form-2 mt-5">
                        <div class="form-group">
                            <div class="drop-zone cover">
                                <span class="drop-zone__prompt">Drag File Here or Click to Upload Cover Image</span>
                                <input type="file" name="cover_image" id="image" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn create">Submit</button>
            </form>
        </main>
        <div class="right">
            @include('dashboard.admin.layouts.header')
        </div>
    @endsection


</x-admin-layout>
