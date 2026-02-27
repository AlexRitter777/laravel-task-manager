@props([
    'title' => 'Laravel Task Manger!'
])

<!doctype html>
<html
    class="h-full bg-gray-50 dark:bg-gray-900"
>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full">

<div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">


    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
        <div class="bg-white px-6 py-12 shadow-sm sm:rounded-lg sm:px-12 dark:bg-gray-800/50 dark:shadow-none dark:outline dark:-outline-offset-1 dark:outline-white/10">
            {{ $slot }}
        </div>

    </div>
</div>

</body>
</html>



