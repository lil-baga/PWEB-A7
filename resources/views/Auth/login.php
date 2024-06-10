<body class="bg-[#A5A5A5]">
    <div class="flex flex-row justify-center items-center w-screen h-full mt-32 px-16 py-16">
        <div class="flex justify-center items-center gap-64">
            <div class="italic">
                <p class="text-4xl font-bold mb-2">Login</p>
                <p class="text-xl mb-8">Masuk sebagai Tata Usaha.</p>
                <form action="<?=urlpath('login')?>" method="POST" enctype="multipart/form-data" class="flex flex-col w-full h-full mx-auto gap-8">
                    <div>
                        <label for="username" class="block mb-2 text-xl font-medium text-gray-900">Username</label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 text-xl text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input type="text" id="username" name="username" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-96 text-xl p-2.5" placeholder="Masukkan NRP">
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-xl font-medium text-gray-900">Password</label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 text-xl text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M7 17a5.007 5.007 0 0 0 4.898-4H14v2h2v-2h2v3h2v-3h1v-2h-9.102A5.007 5.007 0 0 0 7 7c-2.757 0-5 2.243-5 5s2.243 5 5 5zm0-8c1.654 0 3 1.346 3 3s-1.346 3-3 3s-3-1.346-3-3s1.346-3 3-3z" />
                                </svg>
                            </span>
                            <input type="password" id="password" name="password" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w96l text-xl p-2.5" placeholder="Masukkan Password">
                        </div>
                    </div>
                    <button type="submit" class="text-white text-xl inline-block rounded-lg shadow-lg px-4 py-4 bg-blue-500 hover:bg-blue-700">
                        Login
                    </button>
                </form>
            </div>
            <div class="flex justify-center items-center">
                <img class="w-[512px]" src="resources/img/storyset-2.png" alt="storyset-2">
            </div>
        </div>
    </div>
</body>