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

        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: all .8s ease;
        }

        .reveal.show {
            opacity: 1;
            transform: translateY(0);
        }

        .delay-1 {
            transition-delay: .0,5s;
        }

        .delay-2 {
            transition-delay: .2s;
        }

        .delay-3 {
            transition-delay: .3s;
        }

        .delay-4 {
            transition-delay: .4s;
        }
    </style>
</head>

<body class=" font-[Montserrat] antialiased box-border bg-zinc-950 relative">
    {{-- Page header --}}
    <header class=" relative  top-0  z-50 w-full transition-all duration-300 ease-in-out" x-data="{ open: false, screenY: 0 }"
        x-init="window.addEventListener('scroll', () => {
            screenY = window.scrollY;
        })">
        <div x-cloak :class="screenY >= 90 ? 'lg:bg-neutral-900/95 lg:backdrop-blur-sm' : 'lg:bg-transparent'"
            class=" fixed flex items-center justify-between px-3 w-full bg-neutral-900/95 backdrop-blur-sm  
            ">
            <a href="{{ route('index') }}">
                <div class=" inline-flex items-center justify-center">
                    <x-application-logo class=" w-20 h-20 m-0 p-0"></x-application-logo>
                    <h3 class=" text-white font-semibold text-lg max-w-1">Tukang Coretz</h3>
                </div>
            </a>
            <!-- Desktop Navigation -->
            <div class="hidden lg:block">
                <nav class="inline-flex items-center justify-center">
                    <ul class="flex items-center space-x-3 text-sm list-none">

                        <li class="group p-2 rounded-md hover:bg-white/5">
                            <a href="#about-us" class="text-neutral-300 group-hover:text-white">
                                About Us
                            </a>
                        </li>

                        <li class="group p-2 rounded-md hover:bg-white/5">
                            <a href="#services" class="text-neutral-300 group-hover:text-white">
                                Services
                            </a>
                        </li>

                        <li class="group p-2 rounded-md hover:bg-white/5">
                            <a href="#portofolio" class="text-neutral-300 group-hover:text-white">
                                Portofolio
                            </a>
                        </li>

                        <li class="group p-2 rounded-md hover:bg-white/5">
                            <a href="#pricelist" class="text-neutral-300 group-hover:text-white">
                                Pricelist
                            </a>
                        </li>

                        <li class="group px-4 py-2 rounded-md border border-white/20 hover:bg-white/5">
                            <a href="#contact" class="text-neutral-300 group-hover:text-white">
                                Contact
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>

            <!-- Toggle Mobile Navigation -->
            <button class="block lg:hidden z-50 transition-all duration-200 ease-out" @click="open = !open">

                <!-- Hamburger -->
                <svg x-show="!open" x-cloak xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                    viewBox="0 0 16 16" class="text-white">

                    <path fill="currentColor" fill-rule="evenodd"
                        d="M0 3.75A.75.75 0 0 1 .75 3h14.5a.75.75 0 0 1 0 1.5H.75A.75.75 0 0 1 0 3.75M0 8a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H.75A.75.75 0 0 1 0 8m.75 3.5a.75.75 0 0 0 0 1.5h14.5a.75.75 0 0 0 0-1.5z"
                        clip-rule="evenodd" />
                </svg>

                <!-- Close -->
                <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                    viewBox="0 0 24 24" class="text-white">

                    <path fill="currentColor"
                        d="m12 13.4-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9 4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z" />
                </svg>

            </button>

            <!-- Mobile Navigation -->
            <div id="mobile-nav"
                class="fixed top-[87px] right-0 block lg:hidden h-screen w-64 bg-neutral-900/95 backdrop-blur-sm z-50 transform transition-transform duration-300 ease-in-out"
                :class="open ? 'translate-x-0' : 'translate-x-full'" x-show="open === true || true"
                x-transition:enter="transition ease-in-out duration-300" x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">

                <nav class="flex flex-col h-full pt-5 px-6">

                    <ul class="flex flex-col space-y-3 text-sm list-none">

                        <li class="group w-full p-2 rounded-md hover:bg-white/5">
                            <a href="#about-us" class="text-neutral-300 group-hover:text-white">
                                About Us
                            </a>
                        </li>

                        <li class="group w-full p-2 rounded-md hover:bg-white/5">
                            <a href="#services" class="text-neutral-300 group-hover:text-white">
                                Services
                            </a>
                        </li>

                        <li class="group w-full p-2 rounded-md hover:bg-white/5">
                            <a href="#portofolio" class="text-neutral-300 group-hover:text-white">
                                Portofolio
                            </a>
                        </li>

                        <li class="group w-full p-2 rounded-md hover:bg-white/5">
                            <a href="#pricelist" class="text-neutral-300 group-hover:text-white">
                                Pricelist
                            </a>
                        </li>

                        <li class="group w-full px-4 py-2 rounded-md border border-white/20 hover:bg-white/5">
                            <a href="#contact" class="text-neutral-300 group-hover:text-white">
                                Contact
                            </a>
                        </li>

                    </ul>

                </nav>

            </div>
    </header>
    <main class="relative" x-data="{ showHero: false }" x-init="setTimeout(() => showHero = true, 200)">

        <section id="home" class="hero-bg">

            <div class="min-h-screen flex flex-col items-center justify-center px-4 py-16 mx-auto">

                <!-- Judul -->
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-tight max-w-3xl mx-auto text-white text-center transition-all duration-1000 ease-out"
                    :class="showHero ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">

                    Jasa Desain Arsitektur

                </h1>

                <!-- Subjudul -->
                <h2 class="text-neutral-300 text-sm sm:text-base md:text-lg text-center leading-relaxed max-w-lg mt-3 mb-6 transition-all duration-1000 delay-300 ease-out"
                    :class="showHero ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">

                    Solusi untuk mewujudkan bayangan di benak Anda menjadi visual 3D
                    yang selama ini Anda impikan.

                </h2>

                <!-- Tombol -->
                <a href="#portofolio"
                    class="rounded-md bg-white text-black px-6 py-3 text-sm font-semibold w-full sm:w-auto max-w-sm hover:bg-neutral-200 group inline-flex items-center justify-center gap-0 group-hover:gap-2 transition-all duration-1000 delay-500 ease-out"
                    :class="showHero ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">

                    <span>Lihat Portofolio Kami</span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 15 15"
                        class="w-0 opacity-0 group-hover:w-3 group-hover:opacity-100 group-hover:ml-3 transition-all duration-200 ease-out overflow-visible">

                        <path fill="currentColor"
                            d="M8.293 2.293a1 1 0 0 1 1.414 0l4.5 4.5a1 1 0 0 1 0 1.414l-4.5 4.5a1 1 0 0 1-1.414-1.414L11 8.5H1.5a1 1 0 0 1 0-2H11L8.293 3.707a1 1 0 0 1 0-1.414" />

                    </svg>

                </a>

            </div>

        </section>

    </main>

    <div id="float-btn" class=" fixed bottom-8 right-8 z-50 flex flex-col items-end gap-3">
        <a
            class=" px-4 py-2 bg-white text-black font-semibold text-sm rounded-tl-md rounded-tr-md rounded-bl-md inline-block  shadow-sm">Free
            Online Consultation 🙌
        </a>
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
    <!-- ABOUT US -->
    <section id="about-us" class="py-20 bg-zinc-950">

        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">

            <!-- Logo -->
            <div class="flex justify-center reveal">
                <img src="{{ asset('images/logo.webp') }}" alt="Tukang Coretz Studio" class="w-56 md:w-72">
            </div>

            <!-- Content -->
            <div class="reveal delay-1">

                <span class="uppercase tracking-[5px] text-amber-400 text-sm font-semibold">
                    ABOUT US
                </span>

                <h2 class="text-4xl md:text-5xl font-bold text-white mt-4 mb-6">
                    Tentang Kami
                </h2>

                <p class="text-gray-400 leading-8 mb-5">
                    Tukang CoretZ Studio merupakan jasa desain arsitektur dan pembangunan
                    yang mengutamakan kualitas, estetika, serta ketepatan dalam setiap proyek.
                </p>

                <p class="text-gray-400 leading-8">
                    Kami siap mendampingi Anda mulai dari tahap konsultasi,
                    pembuatan desain, visualisasi 3D, hingga proses pembangunan
                    secara profesional.
                </p>

            </div>

        </div>

    </section>

    <!-- SERVICES -->
    <section id="services" class="py-20 bg-zinc-800">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Heading -->
            <div class="text-center mb-14 reveal">

                <span class="uppercase tracking-[5px] text-amber-400 text-sm font-semibold">
                    SERVICES
                </span>

                <h2 class="text-4xl md:text-5xl font-bold text-white mt-4">
                    Layanan Profesional
                </h2>

                <p class="text-gray-400 max-w-2xl mx-auto mt-5 leading-8">
                    Solusi lengkap mulai dari desain hingga pembangunan
                    untuk menciptakan bangunan yang berkualitas.
                </p>

            </div>

            <!-- Cards -->
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div
                    class="reveal delay-1 bg-black rounded-2xl p-7 border border-black shadow-sm hover:shadow-xl hover:-translate-y-2 hover:border-gray-200 transition duration-300">
                    <h3 class="text-xl font-semibold text-white mb-3">
                        Desain Arsitektur
                    </h3>
                    <p class="text-gray-400 leading-7 text-sm">
                        Perencanaan rumah, villa, ruko, hingga bangunan komersial dengan konsep modern.
                    </p>
                </div>

                <!-- Card -->
                <div
                    class="reveal delay-1 bg-black rounded-2xl p-7 border border-black shadow-sm hover:shadow-xl hover:-translate-y-2 hover:border-gray-200 transition duration-300">
                    <h3 class="text-xl font-semibold text-white mb-3">
                        Visualisasi 3D
                    </h3>
                    <p class="text-gray-400 leading-7 text-sm">
                        Render 3D realistis agar Anda dapat melihat hasil proyek sebelum dibangun.
                    </p>
                </div>

                <!-- Card -->
                <div
                    class="reveal delay-1 bg-black rounded-2xl p-7 border border-black shadow-sm hover:shadow-xl hover:-translate-y-2 hover:border-gray-200 transition duration-300">
                    <h3 class="text-xl font-semibold text-white mb-3">
                        Jasa Pembangunan
                    </h3>
                    <p class="text-gray-400 leading-7 text-sm">
                        Pelaksanaan pembangunan oleh tenaga profesional dengan material berkualitas.
                    </p>
                </div>
                <!-- Card -->
                <div
                    class="reveal delay-1 bg-black rounded-2xl p-7 border border-black shadow-sm hover:shadow-xl hover:-translate-y-2 hover:border-gray-200 transition duration-300">
                    <h3 class="text-xl font-semibold text-white mb-3">
                        RAB & Konsultasi
                    </h3>
                    <p class="text-gray-400 leading-7 text-sm">
                        Penyusunan RAB dan konsultasi untuk membantu mewujudkan proyek sesuai anggaran.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="portofolio" class="bg-[#ffffff] py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-amber-400 uppercase tracking-[5px] font-semibold">
                    PORTFOLIO
                </span>
                <h2 class="text-5xl font-bold text-black mt-4">
                    Hasil Karya Kami
                </h2>
                <p class="text-gray-400 mt-5 max-w-2xl mx-auto">
                    Setiap desain kami dirancang dengan mengutamakan estetika,
                    fungsi, kenyamanan, dan kualitas konstruksi.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="group relative overflow-hidden rounded-3xl">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c"
                        class="w-full h-[500px] object-cover group-hover:scale-110 duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent">
                    </div>
                    <div class="absolute bottom-0 p-8 text-white">
                        <span class="bg-amber-500 px-4 py-1 rounded-full text-sm font-semibold">
                            Rumah Modern
                        </span>

                        <h3 class="text-3xl font-bold mt-5">
                            Modern Tropical House
                        </h3>

                        <p class="text-gray-300 mt-2">
                            Surabaya • 250 m²
                        </p>

                    </div>

                </div>

                <!-- Card -->
                <div class="group relative overflow-hidden rounded-3xl">

                    <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c"
                        class="w-full h-[500px] object-cover group-hover:scale-110 duration-700">

                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent">
                    </div>

                    <div class="absolute bottom-0 p-8">

                        <span class="bg-blue-500 px-4 py-1 rounded-full text-sm text-white">
                            Interior
                        </span>

                        <h3 class="text-3xl font-bold text-white mt-5">
                            Luxury Living Room
                        </h3>

                        <p class="text-gray-300 mt-2">
                            Gresik • 120 m²
                        </p>

                    </div>

                </div>

                <!-- Card -->
                <div class="group relative overflow-hidden rounded-3xl">

                    <img src="https://images.unsplash.com/photo-1511818966892-d7d671e672a2"
                        class="w-full h-[500px] object-cover group-hover:scale-110 duration-700">

                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent">
                    </div>

                    <div class="absolute bottom-0 p-8">

                        <span class="bg-green-500 px-4 py-1 rounded-full text-sm text-white">
                            Cafe
                        </span>

                        <h3 class="text-3xl font-bold text-white mt-5">
                            Minimalist Coffee Shop
                        </h3>
                        <p class="text-gray-300 mt-2">
                            Malang • 180 m²
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="pricelist" class="py-20 bg-black">
        <div class="max-w-5xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="uppercase tracking-[5px] text-gray-500 text-xs">
                    PRICELIST
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-white mt-3">
                    Paket Layanan
                </h2>
                <p class="text-gray-400 mt-3">
                    Pilih paket yang sesuai dengan kebutuhan proyek Anda.
                </p>
            </div>

            <!-- Card -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <!-- Basic -->
                <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-white">
                        Basic
                    </h3>
                    <p class="text-3xl font-bold text-white mt-4">
                        Rp1,5jt
                    </p>
                    <ul class="mt-6 space-y-2 text-sm text-gray-400">
                        <li>✓ Denah</li>
                        <li>✓ Tampak</li>
                        <li>✓ Potongan</li>
                        <li>✓ 2x Revisi</li>
                    </ul>
                    <a href="https://wa.me/6281234567890?text=Halo%20Tukang%20Coretz%20Studio%2C%20saya%20tertarik%20dengan%20Paket%20Basic.%20Mohon%20informasi%20lebih%20lanjut."
                        target="_blank"
                        class="w-full mt-6 py-2.5 rounded-xl bg-white text-black font-medium flex justify-center items-center hover:bg-gray-200 transition">
                        Konsultasi
                    </a>
                </div>
                <!-- Professional -->
                <div class="bg-white rounded-2xl p-6 scale-105">
                    <span class="text-xs bg-black text-white px-3 py-1 rounded-full">
                        POPULER
                    </span>
                    <h3 class="text-lg font-semibold mt-4">
                        Professional
                    </h3>
                    <p class="text-3xl font-bold mt-4">
                        Rp3,5jt
                    </p>
                    <ul class="mt-6 space-y-2 text-sm">
                        <li>✓ Semua Basic</li>
                        <li>✓ Render 3D</li>
                        <li>✓ RAB</li>
                        <li>✓ Revisi</li>
                    </ul>

                    <a href="https://wa.me/6281234567890?text=Halo%20Tukang%20Coretz%20Studio%2C%20saya%20tertarik%20dengan%20Paket%20Professional.%20Mohon%20informasi%20lebih%20lanjut."
                        target="_blank"
                        class="w-full mt-6 py-2.5 rounded-xl bg-black text-white font-medium flex justify-center items-center hover:bg-zinc-800 transition">
                        Konsultasi
                    </a>
                </div>
                <!-- Custom -->
                <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-white">
                        Custom
                    </h3>
                    <p class="text-3xl font-bold text-white mt-4">
                        Hubungi Kami
                    </p>
                    <ul class="mt-6 space-y-2 text-sm text-gray-400">
                        <li>✓ Desain Khusus</li>
                        <li>✓ Bangunan Besar</li>
                        <li>✓ Konsultasi</li>
                        <li>✓ Pendampingan</li>
                    </ul>
                    <a href="https://wa.me/6281234567890?text=Halo%20Tukang%20Coretz%20Studio%2C%20saya%20ingin%20berkonsultasi%20mengenai%20proyek%20custom.%20Mohon%20informasi%20lebih%20lanjut."
                        target="_blank"
                        class="w-full mt-6 py-2.5 rounded-xl border border-white text-white font-medium flex justify-center items-center hover:bg-white hover:text-black transition">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTACT -->
    <section id="contact" class="py-20 bg-zinc-950 border-t border-zinc-800">

        <div class="max-w-4xl mx-auto px-6 text-center">

            <span class="uppercase tracking-[5px] text-gray-500 text-xs">
                CONTACT
            </span>

            <h2 class="text-3xl md:text-5xl font-bold text-white mt-4">
                Siap Mewujudkan Bangunan Impian Anda?
            </h2>

            <p class="text-gray-400 mt-5 max-w-2xl mx-auto leading-7">
                Konsultasikan kebutuhan desain maupun pembangunan bersama
                Tukang CoretZ Studio. Tim kami siap membantu Anda dari
                tahap perencanaan hingga proyek selesai.
            </p>

            <a href="https://wa.me/6281234567890?text=Halo%20Tukang%20CoretZ%20Studio,%20saya%20ingin%20berkonsultasi."
                target="_blank"
                class="inline-flex items-center justify-center mt-10 px-8 py-3 rounded-xl bg-green-700 text-black font-semibold hover:bg-green-500 transition">

                Konsultasi via WhatsApp

            </a>

        </div>

    </section>

    <footer class="bg-black border-t border-zinc-800 py-12">

        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between gap-10">
            <div class="max-w-sm">
                <h2 class="text-xl font-bold mb-4 text-white">
                    TukangCoretZ
                </h2>

                <p class="text-gray-500 text-sm">
                    Studio desain & konstruksi profesional yang membantu
                    mewujudkan bangunan impian Anda dengan kualitas terbaik.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-sm">

                <div>
                    <h3 class="font-semibold mb-3">Navigasi</h3>
                    <ul class="space-y-2 text-gray-500">
                        <li><a href="#home" class="hover:text-white">Home</a></li>
                        <li><a href="#about-us" class="hover:text-white">About us</a></li>
                        <li><a href="#services" class="hover:text-white">Services</a></li>
                        <li><a href="#portofolio" class="hover:text-white">Portfolio</a></li>
                        <li><a href="#pricelist" class="hover:text-white">Pricelist</a></li>
                    </ul>
                </div>

                <!-- LAYANAN -->
                <div>
                    <h3 class="font-semibold mb-3">Layanan</h3>
                    <ul class="space-y-2 text-gray-500">
                        <li>Desain</li>
                        <li>3D</li>
                        <li>Konstruksi</li>
                        <li>Renovasi</li>
                    </ul>
                </div>

                <!-- ALAMAT -->
                <div>
                    <h3 class="font-semibold mb-3">Alamat</h3>
                    <ul class="space-y-2 text-gray-500">
                        <li>Trenggalek</li>
                        <li>0812-3456-7890</li>
                        <li>email@coretzstudio.com</li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold mb-3">Sosial</h3>

                    <div class="flex flex-col gap-2 text-gray-400">

                        <a href="https://instagram.com/username" target="_blank"
                            class="hover:text-pink-500 transition">
                            Instagram
                        </a>

                        <a href="https://tiktok.com/@username" target="_blank"
                            class="hover:text-cyan-400 transition">
                            TikTok
                        </a>

                        <a href="https://wa.me/6281234567890" target="_blank"
                            class="hover:text-green-500 transition">
                            WhatsApp
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="border-t border-zinc-800 mt-10 pt-6 text-center text-gray-500 text-sm">
            © 2025 Tukang CoretZ Studio
        </div>

    </footer>
</body>
<script>
    const reveals = document.querySelectorAll(".reveal");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
            }
        });
    }, {
        threshold: 0.2
    });

    reveals.forEach(item => observer.observe(item));
</script>

</html>
