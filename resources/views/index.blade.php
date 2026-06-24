<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tukang Coretz</title>
    {{-- Application icon --}}
    <link rel="shortcut icon" href="{{ asset('images/logo.webp') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" font-[Montserrat] antialiased box-border bg-zinc-950">
    {{-- Page header --}}
    <header class=" fixed top-0  bg-transparent z-50 w-full">
        <div class="flex items-center justify-between px-4 w-full">
            <a href="{{ route('index') }}">
                <div class=" inline-flex items-center justify-center">
                    <x-application-logo></x-application-logo>
                    <h3 class=" text-white font-semibold text-lg ml-1">Tukang Coretz</h3>
                </div>
            </a>
            <nav class=" inline-flex justify-center items-center">
                <ul class="flex items-center justify-center space-x-3 text-sm list-none">
                    <li class=" group p-2 rounded-md hover:bg-white/5">
                        <a href="#" class=" text-neutral-300 group-hover:text-white">Tentang Kami</a>
                    </li>
                    {{-- layanan --}}
                    <li class=" group p-2 rounded-md hover:bg-white/5">
                        <a href="#" class=" text-neutral-300 group-hover:text-white">Portofolio</a>
                    </li>
                    <li class=" group p-2 rounded-md hover:bg-white/5">
                        <a href="#" class=" text-neutral-300 group-hover:text-white">Harga</a>
                    </li>
                    {{-- testimoni --}}
                    <li class=" group px-4 py-2 rounded-md hover:bg-white/5 border border-white/20">
                        <a href="#" class=" text-neutral-300 group-hover:text-white">Kontak</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main class=" relative">
        <section id="#" class=" hero-bg ">
            <div class=" min-h-screen flex flex-col items-center justify-center px-4 py-16 mx-auto">
                <h1
                    class=" text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-tight max-w-3xl mx-auto text-white text-center">
                    ARCHITECTURAL DESIGN SERVICE</h1>
                <h2
                    class=" text-neutral-300 text-sm sm:text-base md:text-lg text-center leading-relaxed max-w-lg mt-3 mb-6">
                    The solution to turn the image in your mind into the 3D visual you've dreamed of.</h2>
                <a href="#portofolio"
                    class="rounded-md bg-white text-black px-6 py-3 text-sm font-semibold w-full sm:w-auto max-w-sm
          hover:bg-neutral-200 group inline-flex items-center justify-center gap-0 group-hover:gap-2
          transition-all duration-200 ease-out">
                    <span>Lihat Portofolio Kami</span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 15 15"
                        class="w-0 opacity-0 group-hover:w-3 group-hover:opacity-100 group-hover:ml-3 transition-all duration-200 ease-out overflow-visible">
                        <path fill="currentColor"
                            d="M8.293 2.293a1 1 0 0 1 1.414 0l4.5 4.5a1 1 0 0 1 0 1.414l-4.5 4.5a1 1 0 0 1-1.414-1.414L11 8.5H1.5a1 1 0 0 1 0-2H11L8.293 3.707a1 1 0 0 1 0-1.414" />
                    </svg>
                </a>
            </div>
        </section>

        <div id="float-btn" class=" fixed bottom-8 right-8 z-50 flex flex-col items-end gap-3">
            {{-- Link ke wa --}}
            <a
                class=" px-4 py-2 bg-white text-black font-semibold text-sm rounded-tl-md rounded-tr-md rounded-bl-md inline-block  shadow-sm">Gratis
                Konsultasi Online 🙌
            </a>
            {{-- Link ke wa --}}
            <a href="">
                <button class=" bg-green-500 p-4 rounded-full shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                        class=" text-white text-4xl ">
                        <path fill="currentColor"
                            d="M19.05 4.91A9.82 9.82 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01m-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.26 8.26 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.18 8.18 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23m4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07s.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28" />
                    </svg>
                </button>
            </a>
        </div>
    </main>
    <footer></footer>
</body>

</html>
