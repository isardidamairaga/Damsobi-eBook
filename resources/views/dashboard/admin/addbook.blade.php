<x-admin-layout title="Upload">
    @section('container')
    <main>
        <h1>List Book</h1>
        <div class="recent-login">
            <button class="btn addbook"><span class="material-symbols-sharp">
                    add
                </span>Add New Book</button>
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
                    @for ($i = 1; $i < 10; $i++) <tr>
                        <td>{{ $i }}</td>
                        <td>Isardi Dama Iraga</td>
                        <td>isardidamairaga27@gmail.com</td>
                        <td class="success">Active</td>
                        <td>
                            <div class="d-flex action">
                                <a href=""><span class="material-symbols-sharp edit">
                                        edit
                                    </span></a>
                                <a href=""><span class="material-symbols-sharp delete">
                                        delete
                                    </span></a>
                            </div>
                        </td>
                        </tr>
                        @endfor
                </tbody>
            </table>
        </div>
    </main>
    <div class="right">
        @include('dashboard.admin.layouts.header')
    </div>
    @endsection
</x-admin-layout>