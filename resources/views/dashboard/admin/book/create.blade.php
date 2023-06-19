<x-admin-layout title="Upload">
    @section('container')
        <main>
            <h1>Create New Book</h1>

            <form action="/dashboard/books" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="author">Autho</label>
                    <input type="text" id="author" name="author" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="category">Kategori:</label>

                    <select id="category" name="category_id" class="form-control" required>
                        <option value="" selected disabled>Pilih kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>"
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="cover">Unggah Sampul:</label>
                    <input type="file" id="cover" name="cover_url" accept="image/*" class="form-control-file"
                        required>
                </div>

                <div class="form-group">
                    <label for="book">Unggah Buku (PDF):</label>
                    <input type="file" id="book" name="book_url" accept="application/pdf" class="form-control-file"
                        required>
                </div>

                <div class="form-group">
                    <label for="synopsis">Sinopsis:</label>
                    <textarea id="synopsis" name="sinopsis" class="form-control" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </main>
        <div class="right">
            @include('dashboard.admin.layouts.header')
        </div>
    @endsection

</x-admin-layout>
