@include('partials.header')
<main>
    <div class="pt-16 py-4 px-4 bg-black flex gap-8">
        <a href="{{ route('admin.login') }}" class="bg-green-500 px-5 py-2 my-2 rounded-md text-white">Admin | Login</a>
        <a href="{{ route('student.login') }}" class="bg-pink-500 px-5 py-2 my-2 rounded-md text-white">Student |
            Login</a>
        <a href="{{ route('instructor.login') }}" class="bg-yellow-500 px-5 py-2 my-2 rounded-md text-white">Instructor |
            Login</a>
    </div>
    <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
        <div class="absolute top-0 w-full h-full bg-center bg-cover"
            style='background-image: url("https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80");'>
            <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
        </div>
        <div class="container relative mx-auto">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                    <div class="pr-12">
                        <h1 class="text-white font-semibold text-5xl">
                            Your story starts with us.
                        </h1>
                        <p class="mt-4 text-lg text-gray-300">
                            This is a simple example of a Landing Page you can build using
                            Tailwind Starter Kit. It features multiple CSS components
                            based on the Tailwindcss design system.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
            style="height: 70px;">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <section class="pb-20 bg-gray-300 -mt-24">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                                <i class="fas fa-award"></i>
                            </div>
                            <h6 class="text-xl font-semibold">Awarded Agency</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                Divide details about your product or agency work into parts.
                                A paragraph describing a feature will be enough.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-4/12 px-4 text-center">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400">
                                <i class="fas fa-retweet"></i>
                            </div>
                            <h6 class="text-xl font-semibold">Free Revisions</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                Keep you user engaged by providing meaningful information.
                                Remember that by this time, the user is curious.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400">
                                <i class="fas fa-fingerprint"></i>
                            </div>
                            <h6 class="text-xl font-semibold">Verified Company</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                Write a few lines about each one. A paragraph describing a
                                feature will be enough. Keep you user engaged!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap items-center mt-32">
                <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                    <div
                        class="text-gray-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-gray-100">
                        <i class="fas fa-user-friends text-xl"></i>
                    </div>
                    <h3 class="text-3xl mb-2 font-semibold leading-normal">
                        Working with us is a pleasure
                    </h3>
                    <p class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700">
                        Don't let your uses guess by attaching tooltips and popoves to
                        any element. Just make sure you enable them first via
                        JavaScript.
                    </p>
                    <p class="text-lg font-light leading-relaxed mt-0 mb-4 text-gray-700">
                        The kit comes with three pre-built pages to help you get started
                        faster. You can change the text and images and you're good to
                        go. Just make sure you enable them first via JavaScript.
                    </p>
                    <a href="https://www.creative-tim.com/learning-lab/tailwind-starter-kit#/presentation"
                        class="font-bold text-gray-800 mt-8">Check Tailwind Starter Kit!</a>
                </div>
                <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                    <div
                        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-pink-600">
                        <img alt="..."
                            src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1051&amp;q=80"
                            class="w-full align-middle rounded-t-lg" />
                        <blockquote class="relative p-8 mb-4">
                            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95"
                                class="absolute left-0 w-full block" style="height: 95px; top: -94px;">
                                <polygon points="-30,95 583,95 583,65" class="text-pink-600 fill-current"></polygon>
                            </svg>
                            <h4 class="text-xl font-bold text-white">
                                Top Notch Services
                            </h4>
                            <p class="text-md font-light mt-2 text-white">
                                The Arctic Ocean freezes every winter and much of the
                                sea-ice then thaws every summer, and that process will
                                continue whatever happens.
                            </p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="relative py-20">
        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
            style="height: 80px;">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
        <div class="container mx-auto px-4">
            <div class="items-center flex flex-wrap">
                <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
                    <img alt="..." class="max-w-full rounded-lg shadow-lg"
                        src="https://images.unsplash.com/photo-1555212697-194d092e3b8f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=634&amp;q=80" />
                </div>
                <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                    <div class="md:pr-12">
                        <div
                            class="text-pink-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-pink-300">
                            <i class="fas fa-rocket text-xl"></i>
                        </div>
                        <h3 class="text-3xl font-semibold">A growing company</h3>
                        <p class="mt-4 text-lg leading-relaxed text-gray-600">
                            The extension comes with three pre-built pages to help you get
                            started faster. You can change the text and images and you're
                            good to go.
                        </p>
                        <ul class="list-none mt-6">
                            <li class="py-2">
                                <div class="flex items-center">
                                    <div>
                                        <span
                                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"><i
                                                class="fas fa-fingerprint"></i></span>
                                    </div>
                                    <div>
                                        <h4 class="text-gray-600">
                                            Carefully crafted components
                                        </h4>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="flex items-center">
                                    <div>
                                        <span
                                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"><i
                                                class="fab fa-html5"></i></span>
                                    </div>
                                    <div>
                                        <h4 class="text-gray-600">Amazing page examples</h4>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="flex items-center">
                                    <div>
                                        <span
                                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"><i
                                                class="far fa-paper-plane"></i></span>
                                    </div>
                                    <div>
                                        <h4 class="text-gray-600">Dynamic components</h4>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('partials.footer')
