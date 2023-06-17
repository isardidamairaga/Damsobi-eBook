<x-admin-layout title="Upload">
    @section('container')
    <main>
        <h1>Create New Book</h1>

        <form action="/submit-form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Judul:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="author">Penulis:</label>
                <input type="text" id="author" name="author" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="category">Kategori:</label>
                <select id="category" name="category" class="form-control" required>
                    <option value="">Pilih kategori</option>
                    <option value="fiksi">Fiksi</option>
                    <option value="nonfiksi">Nonfiksi</option>
                    <option value="biografi">Biografi</option>
                </select>
            </div>

            <div class="form-group">
                <label for="cover">Unggah Sampul:</label>
                <input type="file" id="cover" name="cover" accept="image/*" class="form-control-file" required>
            </div>

            <div class="form-group">
                <label for="book">Unggah Buku (PDF):</label>
                <input type="file" id="book" name="book" accept="application/pdf" class="form-control-file" required>
            </div>

            <div class="form-group">
                <label for="synopsis">Sinopsis:</label>
                <textarea id="synopsis" name="synopsis" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
    <div class="right">
        @include('dashboard.admin.layouts.header')
    </div>
    @endsection

</x-admin-layout>