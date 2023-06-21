<x-admin-layout title="Dashboard">
    @section('container')
        <main>
            <h1>Dashboard</h1>
            <div class="insights">
                <div class="jumlah-buku">
                    <span class="material-symbols-sharp">
                        analytics
                    </span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Buku</h3>
                            <h1>{{ $totalBooks }}</h1>
                        </div>
                    </div>
                </div>
                <div class="fiksi">
                    <span class="material-symbols-sharp">
                        import_contacts
                    </span>
                    <div class="middle">
                        <div class="left">
                            <h3>Buku Fiksi</h3>
                            <h1>{{ $totalFiksi }}</h1>
                        </div>
                    </div>
                </div>
                <div class="non-fiksi">
                    <span class="material-symbols-sharp">
                        import_contacts
                    </span>
                    <div class="middle">
                        <div class="left">
                            <h3>Buku Non-Fiksi</h3>
                            <h1>{{ $totalNonFiksi }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="recent-login">
                <h2>Recent Login</h2>
                <table class="user">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i < 10; $i++)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>Isardi Dama Iraga</td>
                                <td>isardidamairaga27@gmail.com</td>
                                <td class="success">Active</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </main>
        <div class="right">
            @include('dashboard.admin.layouts.header')
            <div class="recent-updates">
                <h2>Recent Updates</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="{{ asset('images/covGA001938.jpg') }}" alt="">
                        </div>
                        <div class="message">
                            <p><b>Monkey D Luffy</b> upload buku kambing jantan <br><small class="text-muted">1 Minutes
                                    Ago</small></p>

                        </div>
                        <div class="profile-photo">
                            <img src="{{ asset('images/covGA001938.jpg') }}" alt="">
                        </div>
                        <div class="message">
                            <p><b>Monkey D Luffy</b> upload buku kambing jantan <br><small class="text-muted">1 Minutes
                                    Ago</small></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin-layout>
