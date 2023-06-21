<x-admin-layout title="List Book">
    @section('container')
        <main>
            <h1>List Book</h1>
            <div class="recent-login">

                <a href="{{ route('dashboard.books.create') }}">
                    <div class="btn addbook">
                        <span class="material-symbols-sharp add">
                            add
                        </span>Add New Book
                    </div>
                </a>
                <table class="book">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Book as $books)
                            <tr>
                                <td>{{ $books->id }}</td>
                                <td>{{ $books->title }}</td>
                                <td>{{ $books->category->category }}</td>
                                <td>{{ $books->author }}</td>
                                <td>
                                    <div class="d-flex action">
                                        <a href="{{ route('dashboard.books.edit', ['book' => $books->id]) }}"><span
                                                class="material-symbols-sharp edit">
                                                edit
                                            </span></a>
                                        <form action="{{ route('dashboard.books.destroy', ['book' => $books->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="material-symbols-sharp delete"
                                                onclick="return confirm('Are you sure you want to delete this book?')">
                                                delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <div class="paginate">{{ $Book->links() }}</div>
        </main>

        <div class="right">
            @include('dashboard.admin.layouts.header')
        </div>
    @endsection
</x-admin-layout>
