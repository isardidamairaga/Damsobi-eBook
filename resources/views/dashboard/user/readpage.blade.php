<x-app-layout title="buku">
    @section('container')

    <div class="d-flex mt-5">
        <iframe src="{{$book->book_url}}"></iframe>
    </div>

    @endsection
</x-app-layout>