<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased">
        <div class="max-w-md mx-auto py-10">
            @include('layouts.flash')

            <form method="post" action="/">
                @csrf

                <div class="mb-3">
                    <label>Franchise ID</label>
                    <input type="text" class="border px-3 py-2 w-full" name="franchise_id">
                </div>

                <div class="mb-3">
                    <label>Client ID</label>
                    <input type="text" class="border px-3 py-2 w-full" name="client_id">
                </div>

                <div class="mb-3">
                    <label>Client Secret</label>
                    <input type="password" class="border px-3 py-2 w-full" name="client_secret">
                </div>

                <div class="text-right">
                    <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded">Submit</button>
                </div>
            </form>
        </div>
    </body>
</html>
