<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: url('asset/public/dog.jpg') center center fixed; /* Replace 'path/to/your/image.jpg' with the actual path to your image */
            background-size: cover;
        }

        .count-container {
            text-align: center;
            margin-top: 2rem;
        }

        .count-title {
            font-size: 3rem;
            font-weight: 600;
            color: #3490dc; /* Change color as needed */
        }

        .count-number {
            font-size: 4rem;
            font-weight: 700;
            color: blue; /* Change color to blue */
        }

        /* Added style for green title color */
        .title-green {
            color: green; /* Change color to green */
        }
    </style>
</head>
<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <!-- resources/views/welcome.blade.php -->

<!-- Display count of titles -->
<h2>Blog Post Counts</h2>
<ul class="list-unstyled">
    <li><strong>Number of Titles:</strong> {{ $titleCount }}</li>
</ul>

<!-- Display all blog posts -->
<h2>All Blog Posts</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->title }}</td>
                <td><a href="{{ route('blog.details', ['id' => $blog->id]) }}">View Details</a></td>
            </tr>
        @endforeach
    </tbody>
</table>



    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




</body>
</html>
