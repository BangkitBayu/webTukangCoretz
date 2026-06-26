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

    <style>
        html {
            scrollbar-width: thin;
            scrollbar-color: #374151 #f3f4f6;
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class=" font-[Montserrat] antialiased box-border bg-zinc-950 relative">
    {{-- Page header --}}
    <header class=" relative  top-0  z-50 w-full transition-all duration-300 ease-in-out" x-data="{ open: false, screenY : 0}" x-init="window.addEventListener('scroll' , () => {
    screenY = window.scrollY;})">
        <div x-cloak :class="screenY >= 90 ? 'lg:bg-neutral-900/95 lg:backdrop-blur-sm' : 'lg:bg-transparent'"
            class=" fixed flex items-center justify-between px-3 w-full bg-neutral-900/95 backdrop-blur-sm  
            ">
            <a href="{{ route('index') }}">
                <div class=" inline-flex items-center justify-center">
                    <x-application-logo class=" w-20 h-20 m-0 p-0"></x-application-logo>
                    <h3 class=" text-white font-semibold text-lg max-w-1">Tukang Coretz</h3>
                </div>
            </a>
            {{-- Desktop and tablet nav --}}
            <div class=" hidden lg:block">
                <nav class=" inline-flex justify-center items-center">
                    <ul class="flex items-center justify-center space-x-3 text-sm list-none">
                        <li class=" group p-2 rounded-md hover:bg-white/5">
                            <a href="#about-us" class=" text-neutral-300 group-hover:text-white">About Us</a>
                        </li>
                        {{-- layanan --}}
                        <li class=" group p-2 rounded-md hover:bg-white/5">
                            <a href="#" class=" text-neutral-300 group-hover:text-white">Portofolio</a>
                        </li>
                        <li class=" group p-2 rounded-md hover:bg-white/5">
                            <a href="#" class=" text-neutral-300 group-hover:text-white">Pricelist</a>
                        </li>
                        {{-- testimoni --}}
                        <li class=" group px-4 py-2 rounded-md hover:bg-white/5 border border-white/20">
                            <a href="#" class=" text-neutral-300 group-hover:text-white">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>

            {{-- Toggle mobile nav --}}
            <button class=" block lg:hidden transition-all duration-200 ease-out z-50" @click="open = !open">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 16 16"
                    x-show="open === false" x-cloak class="text-white">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M0 3.75A.75.75 0 0 1 .75 3h14.5a.75.75 0 0 1 0 1.5H.75A.75.75 0 0 1 0 3.75M0 8a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H.75A.75.75 0 0 1 0 8m.75 3.5a.75.75 0 0 0 0 1.5h14.5a.75.75 0 0 0 0-1.5z"
                        clip-rule="evenodd" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                    x-show="open === true" x-cloak class="text-white">
                    <path fill="currentColor"
                        d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z" />
                </svg>

            </button>
        </div>
        {{-- Mobile nav --}}
        <div id="mobile-nav"
            class="block lg:hidden fixed right-0 top-[87px] h-screen w-64 bg-neutral-900/95 backdrop-blur-sm z-50 transform transition-transform duration-300 ease-in-out"
            :class="open ? 'translate-x-0' : 'translate-x-full'" x-show="open === true || true"
            x-transition:enter="transition ease-in-out duration-300" x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
            <nav class="flex flex-col h-full pt-5 px-6">
                <ul class="flex flex-col items-start justify-start space-y-3 text-sm list-none w-full">
                    <li class="group p-2 rounded-md hover:bg-white/5 w-full text-left">
                        <a href="#about-us" class="text-neutral-300 group-hover:text-white">About Us</a>
                    </li>
                    {{-- layanan --}}
                    <li class="group p-2 rounded-md hover:bg-white/5 w-full text-left">
                        <a href="#" class="text-neutral-300 group-hover:text-white">Portofolio</a>
                    </li>
                    <li class="group p-2 rounded-md hover:bg-white/5 w-full text-left">
                        <a href="#" class="text-neutral-300 group-hover:text-white">Pricelist</a>
                    </li>
                    {{-- testimoni --}}
                    <li class="group px-4 py-2 rounded-md hover:bg-white/5 border border-white/20 w-full text-left">
                        <a href="#" class="text-neutral-300 group-hover:text-white">Contact</a>
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
                    <span>View Our Portofolio</span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 15 15"
                        class="w-0 opacity-0 group-hover:w-3 group-hover:opacity-100 group-hover:ml-3 transition-all duration-200 ease-out overflow-visible">
                        <path fill="currentColor"
                            d="M8.293 2.293a1 1 0 0 1 1.414 0l4.5 4.5a1 1 0 0 1 0 1.414l-4.5 4.5a1 1 0 0 1-1.414-1.414L11 8.5H1.5a1 1 0 0 1 0-2H11L8.293 3.707a1 1 0 0 1 0-1.414" />
                    </svg>
                </a>
            </div>
        </section>

        {{-- Float wa button --}}
        <div id="float-btn" class=" fixed bottom-8 right-8 z-50 flex flex-col items-end gap-3">
            {{-- Link ke wa --}}
            <a
                class=" px-4 py-2 bg-white text-black font-semibold text-sm rounded-tl-md rounded-tr-md rounded-bl-md inline-block  shadow-sm">Free
                Online Consultation 🙌
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

        <section id="about-us">
            <div class=" min-h-screen flex items-center justify-center px-4 py-16 mx-auto">
                <div>
                    <img src="{{ asset('images/logo.webp') }}" alt="logo">
                </div>
                <div>

                </div>
            </div>
        </section>
    </main>
    <footer></footer>
</body>

</html>
