<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js" integrity="sha512-G8JE1Xbr0egZE5gNGyUm1fF764iHVfRXshIoUWCTPAbKkkItp/6qal5YAHXrxEu4HNfPTQs6HOu3D5vCGS1j3w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @hasSection('styles')
        @yield('styles')
    @endif
</head>
<body>
<div class="w-full min-h-screen bg-gray-50">
    <div class="py-10 bg-blue-600">
        <div class="w-[90%] lg:w-[60%] mx-auto flex justify-between items-center text-white">
            <p class="font-bold text-xl"><a href="@url('/')">HarveControl</a></p>
        </div>
    </div>
    <div class="py-[80px] bg-blue-600"></div>
    <div class="space-y-10 -mt-40  pb-10">
        @yield('content')
    </div>
</div>
@hasSection('scripts')
    @yield('scripts')
@endif
</body>
</html>
