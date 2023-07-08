<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Damsobi</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/library.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/9be626d6af.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/flip.js') }}"></script>
</head>

<body style="background-color: #f6f6f9;">
    <div data-aos="fade-down" data-aos-delay="300" data-aos-duration="800">
        <x-navbar></x-navbar>
    </div>

    @yield('container')
    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script>
        AOS.init();
        $(document).ready(function() {
            $('#search-input').on('keyup', function() {
                var query = $(this).val();
                if (query.trim() !== '') {
                    $.ajax({
                        url: '{{ route('dashboard.search') }}',
                        method: 'GET',
                        data: {
                            query: query
                        },
                        success: function(response) {
                            $('#search-results').html(response);
                            $('#search-results').show(); // Show the search results
                        }
                    });
                } else {
                    $('#search-results').empty();
                    $('#search-results').hide(); // Hide the search results
                }
            });
        });

        $(document).ready(function() {
            $('#category-select').on('change', function() {
                var selectedCategory = $(this).val();

                $.ajax({
                    url: '{{ route('dashboard.filter') }}',
                    method: 'GET',
                    data: {
                        category: selectedCategory
                    },
                    success: function(response) {
                        $('#book-list').html(response);
                    }
                });
            });
        });
    </script>

</body>

</html>
