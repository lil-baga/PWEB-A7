<body>
    <?php if (isset($_SESSION['status'])) {
    ?>
        <div class="flex w-screen items-center justify-center">
            <div id="alert" class="flex absolute items-center justify-center p-4 mt-16 bg-slate-900 text-white rounded-lg z-50" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    <?php echo $_SESSION['status']; ?>
                </div>
                <button type="button" class="ml-4 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    <?php
        unset($_SESSION['status']);
    }
    ?>
    <div class="flex flex-row content-center items-center justify-center w-screen h-full px-4 py-2 gap-72">
        <div class="flex">
            <div class="flex flex-col gap-32 text-slate-900">
                <div class="flex flex-col gap-4">
                    <h1 class="text-center text-xl font-medium mb-2">
                        <?php if (!isset($_SESSION['user'])) : ?>
                            Halo, Selamat Datang Mahasiswa Sistem Informasi !
                        <?php else : ?>
                            Halo, Selamat Datang <?= $_SESSION['user']['nama'] ?> !
                        <?php endif; ?>
                    </h1>
                </div>
                <div class="flex flex-col gap-4">
                    <h1 class="text-xl font-medium mb-2">
                        Jumlah Proposal Skripsi yang Telah Diinputkan.
                    </h1>
                    <div class="text-center font-bold">
                        <h1 class="text-6xl"><?php echo count($sempro) ?></h1>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <?php if (!isset($_SESSION['user'])) : ?>
                    <?php else : ?>
                        <?php if (($_SESSION['user']['roles_id'] == 1)) : ?>
                            <form action="<?= urlpath('register') ?>" method="GET">
                                <button type="submit" class="text-white text-sm inline-block rounded-lg shadow-lg px-4 py-2 mt-2 bg-green-500 hover:bg-green-700">
                                    Tambah Akun Pegawai Tata Usaha
                                </button>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="flex flex-row items-center">
            <div class="flex flex-col">
                <div class="p-4 text-lg font-semibold text-left rtl:text-right text-slate-900 bg-white mb-4">
                    Record Proposal Skripsi
                    <p class="mt-1 text-sm font-normal text-slate-500">Anda dapat melihat record proposal skripsi terbaru di sini.</p>
                    <p class="mt-1 text-sm font-normal text-slate-500">Cari Berdasarkan Nama, NIM, atau Judul</p>
                    <div class="max-w-md mx-auto mt-6 mb-4">
                        <label for="live-search" class="mb-2 text-sm font-normal text-gray-900 sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="live-search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari Record Sempro" />
                        </div>
                    </div>
                    <div class="w-full h-[570px] font-normal shadow-lg sm:rounded-lg border border-slate-300">
                        <div id="search-result" class="h-[570px] overflow-y-auto overflow-x-hidden">
                            <table class="table w-full text-xs text-left rtl:text-right text-slate-500 border border-slate-300">
                                <thead class="text-xs text-center text-slate-700 uppercase bg-slate-50 border border-slate-300">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nama
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nim
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Judul
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($sempro)) :
                                        foreach ($sempro as $s) :
                                            if ($s['deleted_at'] != NULL) : ?>
                                                <tr class="bg-white border-b text-center border border-slate-300">
                                                    <td class="px-6 py-4 border border-slate-300">
                                                        <?= $s['nama'] ?>
                                                    </td>
                                                    <td class="px-6 py-4 border border-slate-300">
                                                        <?= $s['nim'] ?>
                                                    </td>
                                                    <td class="px-6 py-4 text-wrap max-w-96 text-justify border border-slate-300">
                                                        <?= $s['judul'] ?>
                                                    </td>
                                                    <td class="px-6 py-4 border border-slate-300">
                                                        <div class="flex felx-row gap-4">
                                                            <div class="flex flex-row items-center justify-center">
                                                                <a href="<?= $s['link_proposal'] ?>" target="_blank" class="button bg-blue-500 transition-colors flex flex-row items-center justify-center hover:cursor-pointer hover:bg-blue-700 text-white font-medium py-2 px-4 rounded gap-2" title="Link Proposal">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                                        <path fill="currentColor" d="M19 2.01H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.998 5 19.815 5 19.01c0-.101.009-.191.024-.273c.112-.575.583-.717.987-.727H20c.018 0 .031-.009.049-.01H21V4.01c0-1.103-.897-2-2-2zm0 14H5v-11c0-.806.55-.988 1-1h7v7l2-1l2 1v-7h2v12z" />
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                            <div class="flex flex-row items-center justify-center">
                                                                <a href="<?= $s['link_record'] ?>" target="_blank" class="button bg-blue-500 transition-colors flex flex-row items-center justify-center hover:cursor-pointer hover:bg-blue-700 text-white font-medium py-2 px-4 rounded gap-2" title="Link Record">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                                        <path fill="currentColor" d="M18 9c0-1.103-.897-2-2-2h-1.434l-2.418-4.029A2.008 2.008 0 0 0 10.434 2H5v2h5.434l1.8 3H4c-1.103 0-2 .897-2 2v9c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-3l4 2v-7l-4 2V9zm-1.998 9H4V9h12l.001 4H16v1l.001.001l.001 3.999z" />
                                                                        <path fill="currentColor" d="M6 14h6v2H6z" />
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                    <?php
                                            endif;
                                        endforeach;
                                    endif;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="resources/js/dashboard-search.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>