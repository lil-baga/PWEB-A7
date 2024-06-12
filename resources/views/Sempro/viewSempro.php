<body>
    <div class="flex flex-row items-center justify-center w-full h-full py-4 px-8">
        <div class="flex flex-col">
            <div class="p-4 text-lg font-semibold text-left rtl:text-right text-slate-900 bg-white mb-4">
                Jadwal Proposal Skripsi
                <p class="mt-1 text-sm font-normal text-slate-500">Anda dapat melihat jadwal proposal skripsi terbaru di sini.</p>
                <p class="mt-1 text-sm font-normal text-slate-500">Cari Berdasarkan Nama, NIM, Judul, Tanggal, dan Dosen.</p>
                <?php if (!isset($_SESSION['user'])) : ?>
                <?php else : ?>
                    <?php if (($_SESSION['user']['roles_id'] == 2)) : ?>
                        <button data-modal-target="modal-tambah" data-modal-toggle="modal-tambah" class="text-white text-sm inline-block rounded-lg shadow-lg px-4 py-2 mt-2 bg-green-500 hover:bg-green-700">
                            Tambah Jadwal
                        </button>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="max-w-md mx-auto mb-4 gap-64">
                    <label for="live-search" class="mb-2 text-sm font-normal text-slate-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="live-search" class="block w-full p-2 ps-10 text-sm text-slate-900 border border-slate-300 rounded-lg bg-slate-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari Jadwal Sempro" />
                    </div>
                </div>
                <div class="w-[1800px] h-[570px] font-normal shadow-lg sm:rounded-lg border border-slate-300">
                    <div class="h-[570px] overflow-y-auto overflow-x-hidden">
                        <table class="table w-[1800px] table-auto text-center text-sm bg-white">
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
                                        Tanggal
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Dosen Pembahas 1
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Dosen Pembahas 2
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Dosen Pembimbing 1
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Dosen Pembimbing 2
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($sempro)) :
                                    foreach ($sempro as $s) :
                                        if ($s['deleted_at'] == NULL) : ?>
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
                                                    <?= date("l, d F Y\nH:i", strtotime($s['tanggal'])) . ' WIB' ?>
                                                </td>
                                                <td class="px-6 py-4 border border-slate-300">
                                                    <?php foreach ($dosen as $d) : ?>
                                                        <?php if ($s['pembahas1_id'] == $d['id']) : ?>
                                                            <?= $d['nama'] ?>
                                                    <?php endif;
                                                    endforeach ?>
                                                </td>
                                                <td class="px-6 py-4 border border-slate-300">
                                                    <?php foreach ($dosen as $d) : ?>
                                                        <?php if ($s['pembahas2_id'] == $d['id']) : ?>
                                                            <?= $d['nama'] ?>
                                                    <?php endif;
                                                    endforeach ?>
                                                </td>
                                                <td class="px-6 py-4 border border-slate-300">
                                                    <?php foreach ($dosen as $d) : ?>
                                                        <?php if ($s['pembimbing1_id'] == $d['id']) : ?>
                                                            <?= $d['nama'] ?>
                                                    <?php endif;
                                                    endforeach ?>
                                                </td>
                                                <td class="px-6 py-4 border border-slate-300">
                                                    <?php foreach ($dosen as $d) : ?>
                                                        <?php if ($s['pembimbing2_id'] == $d['id']) : ?>
                                                            <?= $d['nama'] ?>
                                                    <?php endif;
                                                    endforeach ?>
                                                </td>
                                                <td class="px-6 py-4 border border-slate-300">
                                                    <div class="flex felx-row gap-4">
                                                        <div class="flex flex-row items-center justify-center">
                                                            <a href="resources/pdf/<?= $s['proposal'] ?>" target="_blank" class="button bg-blue-500 transition-colors flex flex-row items-center justify-center hover:cursor-pointer hover:bg-blue-700 text-white font-medium py-2 px-4 rounded gap-2" title="File Proposal">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                                    <path fill="currentColor" d="M19 2.01H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.998 5 19.815 5 19.01c0-.101.009-.191.024-.273c.112-.575.583-.717.987-.727H20c.018 0 .031-.009.049-.01H21V4.01c0-1.103-.897-2-2-2zm0 14H5v-11c0-.806.55-.988 1-1h7v7l2-1l2 1v-7h2v12z" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div class="flex flex-row items-center justify-center">
                                                            <a href="<?= $s['link_zoom'] ?>" target="_blank" class="button bg-blue-500 transition-colors flex flex-row items-center justify-center hover:cursor-pointer hover:bg-blue-700 text-white font-medium py-2 px-4 rounded gap-2" title="Link Zoom">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                                    <path fill="currentColor" d="M18 11c0-.959-.68-1.761-1.581-1.954C16.779 8.445 17 7.75 17 7c0-2.206-1.794-4-4-4c-1.517 0-2.821.857-3.5 2.104C8.821 3.857 7.517 3 6 3C3.794 3 2 4.794 2 7c0 .902.312 1.727.817 2.396A1.994 1.994 0 0 0 2 11v8c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-2.638l4 2v-7l-4 2V11zm-5-6c1.103 0 2 .897 2 2s-.897 2-2 2s-2-.897-2-2s.897-2 2-2zM6 5c1.103 0 2 .897 2 2s-.897 2-2 2s-2-.897-2-2s.897-2 2-2zM4 19v-8h12l.002 8H4z" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <?php if (!isset($_SESSION['user'])) : ?>
                                                        <?php else : ?>
                                                            <?php if (($_SESSION['user']['roles_id'] == 2)) : ?>
                                                                <div class="flex flex-row items-center justify-center">
                                                                    <a data-modal-target="modal-edit-<?php echo $s['id']; ?>" data-modal-toggle="modal-edit-<?php echo $s['id']; ?>" class="button bg-blue-500 transition-colors flex flex-row items-center justify-center hover:cursor-pointer hover:bg-blue-700 text-white font-medium py-2 px-4 rounded gap-2" title="Edit">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                                            <path fill="currentColor" d="m7 17.013l4.413-.015l9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583l-1.597 1.582l-1.586-1.585l1.594-1.58zM9 13.417l6.03-5.973l1.586 1.586l-6.029 5.971L9 15.006v-1.589z" />
                                                                            <path fill="currentColor" d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01c-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z" />
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            <?php else : ?>
                                                                <div class="flex flex-row items-center justify-center">
                                                                    <a data-modal-target="modal-link-<?php echo $s['id']; ?>" data-modal-toggle="modal-link-<?php echo $s['id']; ?>" class="button bg-blue-500 transition-colors flex flex-row items-center justify-center hover:cursor-pointer hover:bg-blue-700 text-white font-medium py-2 px-4 rounded gap-2" title="Edit">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                                            <path fill="currentColor" d="m7 17.013l4.413-.015l9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583l-1.597 1.582l-1.586-1.585l1.594-1.58zM9 13.417l6.03-5.973l1.586 1.586l-6.029 5.971L9 15.006v-1.589z" />
                                                                            <path fill="currentColor" d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01c-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z" />
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Link Modal -->
                                            <div id="modal-link-<?php echo $s['id']; ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-4xl max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow p-4">
                                                        <!-- Modal header -->
                                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                            <h3 class="text-lg font-semibold text-slate-900">
                                                                Tambahkan File Proposal, Link Zoom, dan Link Record
                                                            </h3>
                                                            <button type="button" class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="modal-link-<?php echo $s['id']; ?>">
                                                                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal AddRecord -->
                                                        <form action="<?= urlpath("addlink?id=" . $s['id']) ?>" enctype="multipart/form-data" method="POST">
                                                            <input hidden type="number" name="id" id="id" value="<?php echo $s['id']; ?>" class="hidden bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-2.5" required="">
                                                            <div class="grid gap-6 mt-4 mb-4 grid-cols-2">
                                                                <div class="col-span-2">
                                                                    <label for="proposal" class="block mb-2 text-sm font-medium text-slate-900">File Proposal</label>
                                                                    <input type="file" name="proposal" id="proposal" class="content-center items-center justify-center text-slate-900 text-sm rounded-lg block w-full p-2.5" accept="application/pdf" placeholder="File Proposal" required="">
                                                                </div>
                                                                <div class="col-span-2">
                                                                    <label for="link_zoom" class="block mb-2 text-sm font-medium text-slate-900">Link Zoom</label>
                                                                    <input type="text" name="link_zoom" id="link_zoom" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Link Zoom" required="">
                                                                </div>
                                                                <div class="col-span-2">
                                                                    <label for="link_record" class="block mb-2 text-sm font-medium text-slate-900">Link Record</label>
                                                                    <input type="text" name="link_record" id="link_record" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Link Record Sempro" required="">
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="text-white text-sm inline-block rounded-lg shadow-lg px-4 py-2 mt-2 bg-green-500 hover:bg-green-700">
                                                                Tambahkan Link
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Edit modal -->
                                            <div id="modal-edit-<?php echo $s['id']; ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-4xl max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow p-4">
                                                        <!-- Modal header -->
                                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                            <h3 class="text-lg font-semibold text-slate-900">
                                                                Edit Data Jadwal Sempro
                                                            </h3>
                                                            <button type="button" class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="modal-edit-<?php echo $s['id']; ?>">
                                                                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal EditSempro -->
                                                        <form action="<?= urlpath("editsempro?id=" . $s['id']); ?>" method="POST" enctype="multipart/form-data">
                                                            <input hidden type="number" name="id" id="id" value="<?php echo $s['id']; ?>" class="hidden bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-2.5" required="">
                                                            <div class="grid gap-6 mt-4 mb-4 grid-cols-2">
                                                                <div class="col-span-2">
                                                                    <label for="nama" class="block mb-2 text-sm font-medium text-slate-900">Nama</label>
                                                                    <input type="text" name="nama" id="nama" value="<?php echo $s['nama']; ?>" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nama Mahasiswa" required="">
                                                                </div>
                                                                <div class="col-span-2">
                                                                    <label for="nim" class="block mb-2 text-sm font-medium text-slate-900">NIM</label>
                                                                    <input type="text" name="nim" id="nim" value="<?php echo $s['nim']; ?>" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="NIM" required="">
                                                                </div>
                                                                <div class="col-span-2">
                                                                    <label for="judul" class="block mb-2 text-sm font-medium text-slate-900">Judul</label>
                                                                    <textarea id="judul" name="judul" rows="4" class="block p-2.5 w-full text-sm text-slate-900 bg-slate-50 rounded-lg border border-slate-300 focus:ring-blue-500 focus:border-blue-500 resize-none" placeholder="Judul Proposal Skripsi"><?php echo $s['judul']; ?></textarea>
                                                                </div>
                                                                <div class="col-span-2">
                                                                    <label for="tanggal" class="block mb-2 text-sm font-medium text-slate-900">Tanggal</label>
                                                                    <input type="datetime-local" id="tanggal" value="<?php echo $s['tanggal']; ?>" name="tanggal" class="p-2 w-96 resize-none border-none align-top focus:ring-0 sm:text-sm" rows="4" placeholder="Tanggal" min="<?= date('Y-m-d H:i', strtotime('now')); ?>" required="" />
                                                                </div>
                                                                <div class="col-span-1 mb-2">
                                                                    <div class="col-span-1">
                                                                        <label for="pembahas1_id" class="block mb-2 text-sm font-medium text-slate-900">Dosen Pembahas 1</label>
                                                                        <select id="pembahas1_id" name="pembahas1_id" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-96 p-2.5">
                                                                            <option disabled>Pilih Dosen Pembahas 2</option>
                                                                            <option selected value=<?= $s['pembahas1_id'] ?>><?= $dosen[$s['pembahas1_id'] - 1]['nama'] ?></option>
                                                                            <?php foreach ($dosen as $d) : ?>
                                                                                <?php if ($d['id'] == $s['pembahas1_id']) : ?>
                                                                                    <option hidden value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                                                                <?php else : ?>
                                                                                    <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                                                                <?php endif ?>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                    <br>
                                                                    <div class="col-span-1">
                                                                        <label for="pembimbing1_id" class="block mb-2 text-sm font-medium text-slate-900">Dosen Pembimbing 1</label>
                                                                        <select id="pembimbing1_id" name="pembimbing1_id" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-96 p-2.5">
                                                                            <option disabled>Pilih Dosen Pembimbing 1</option>
                                                                            <option selected value=<?= $s['pembimbing1_id'] ?>><?= $dosen[$s['pembimbing1_id'] - 1]['nama'] ?></option>
                                                                            <?php foreach ($dosen as $d) : ?>
                                                                                <?php if ($d['id'] == $s['pembimbing1_id']) : ?>
                                                                                    <option hidden value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                                                                <?php else : ?>
                                                                                    <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                                                                <?php endif ?>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-span-1">
                                                                    <div class="col-span-1">
                                                                        <label for="pembahas2_id" class="block mb-2 text-sm font-medium text-slate-900"> Dosen Pembahas 2</label>
                                                                        <select id="pembahas2_id" name="pembahas2_id" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-96 p-2.5">
                                                                            <option disabled>Pilih Dosen Pembahas 2</option>
                                                                            <option selected value=<?= $s['pembahas2_id'] ?>><?= $dosen[$s['pembahas2_id'] - 1]['nama'] ?></option>
                                                                            <?php foreach ($dosen as $d) : ?>
                                                                                <?php if ($d['id'] == $s['pembahas2_id']) : ?>
                                                                                    <option hidden value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                                                                <?php else : ?>
                                                                                    <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                                                                <?php endif ?>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                    <br>
                                                                    <div class="col-span-1">
                                                                        <label for="pembimbing2_id" class="block mb-2 text-sm font-medium text-slate-900"> Dosen Pembimbing 2</label>
                                                                        <select id="pembimbing2_id" name="pembimbing2_id" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-96 p-2.5">
                                                                            <option disabled>Pilih Dosen Pembimbing 2</option>
                                                                            <option selected value=<?= $s['pembimbing2_id'] ?>><?= $dosen[$s['pembimbing2_id'] - 1]['nama'] ?></option>
                                                                            <?php foreach ($dosen as $d) : ?>
                                                                                <?php if ($d['id'] == $s['pembimbing2_id']) : ?>
                                                                                    <option hidden value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                                                                <?php else : ?>
                                                                                    <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                                                                <?php endif ?>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex flex-row gap-4">
                                                                <button type="submit" class="text-white text-sm inline-block rounded-lg shadow-lg px-4 py-2 mt-2 bg-blue-500 hover:bg-blue-700">
                                                                    Ubah Jadwal
                                                                </button>
                                                                <button id="deleteButton" data-modal-target="modal-hapus" data-modal-toggle="modal-hapus" class="text-white text-sm inline-block rounded-lg shadow-lg px-4 py-2 mt-2 bg-red-500 hover:bg-red-700" type="button">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Delete Modal -->
                                            <div id="modal-hapus" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                                    <div class="relative p-4 shadow-xl text-center bg-white rounded-lg sm:p-5">
                                                        <p class="mb-4 text-lg text-slate-900">Yakin Ingin Menghapus Data Sempro?</p>
                                                        <div class="flex justify-center items-center space-x-4">
                                                            <button data-modal-toggle="modal-hapus" type="button" class="flex py-2 px-4 transition-colors text-sm font-medium text-white bg-blue-500 rounded hover:bg-blue-700 gap-2">
                                                                Tidak
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                                    <path fill="currentColor" d="M21 11H6.414l5.293-5.293l-1.414-1.414L2.586 12l7.707 7.707l1.414-1.414L6.414 13H21z" />
                                                                </svg>
                                                            </button>
                                                            <form id='delete' method="POST" action="<?= urlpath("deletesempro?id=" . $s['id']); ?>">
                                                                <input hidden type="number" name="id" id="id" value="<?php echo $s['id']; ?>" class="hidden bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-2.5" required="">
                                                                <button type="submit" class="flex py-2 px-4 transition-colors text-sm font-medium text-center text-white bg-red-500 rounded hover:bg-red-700 gap-2">
                                                                    Iya
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                                        <path fill="currentColor" d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z" />
                                                                        <path fill="currentColor" d="M9 10h2v8H9zm4 0h2v8h-2z" />
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                <?php else:?>
                                <?php endif; endforeach; ?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Create modal -->
            <div id="modal-tambah" data-modal-backdrop="static" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-4xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow p-4">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                            <h3 class="text-lg font-semibold text-slate-900">
                                Tambahkan Data Jadwal Sempro
                            </h3>
                            <button type="button" class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="modal-tambah">
                                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal AddSempro -->
                        <form action="<?= urlpath('addsempro') ?>" method="POST">
                            <div class="grid gap-6 mt-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="nama" class="block mb-2 text-sm font-medium text-slate-900">Nama</label>
                                    <input type="text" name="nama" id="nama" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nama Mahasiswa" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="nim" class="block mb-2 text-sm font-medium text-slate-900">NIM</label>
                                    <input type="text" name="nim" id="nim" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="NIM" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="judul" class="block mb-2 text-sm font-medium text-slate-900">Judul</label>
                                    <textarea id="judul" name="judul" rows="4" class="block p-2.5 w-full text-sm text-slate-900 bg-slate-50 rounded-lg border border-slate-300 focus:ring-blue-500 focus:border-blue-500 resize-none" placeholder="Judul Proposal Skripsi"></textarea>
                                </div>
                                <div class="col-span-2">
                                    <label for="tanggal" class="block mb-2 text-sm font-medium text-slate-900">Tanggal</label>
                                    <input type="datetime-local" id="tanggal" name="tanggal" class="p-2 w-96 resize-none border-none align-top focus:ring-0 sm:text-sm" rows="4" placeholder="Tanggal" min="<?= date('Y-m-d H:i', strtotime('now')); ?>" required="" />
                                </div>
                                <div class="col-span-1 mb-2">
                                    <div class="col-span-1">
                                        <label for="pembahas1_id" class="block mb-2 text-sm font-medium text-slate-900">Dosen Pembahas 1</label>
                                        <select id="pembahas1_id" name="pembahas1_id" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-96 p-2.5">
                                            <option selected disabled>Pilih Dosen Pembahas 1</option>
                                            <?php foreach ($dosen as $d) : ?>
                                                <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col-span-1">
                                        <label for="pembimbing1_id" class="block mb-2 text-sm font-medium text-slate-900">Dosen Pembimbing 1</label>
                                        <select id="pembimbing1_id" name="pembimbing1_id" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-96 p-2.5">
                                            <option selected disabled>Pilih Dosen Pembimbing 1</option>
                                            <?php foreach ($dosen as $d) : ?>
                                                <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-span-1">
                                    <div class="col-span-1">
                                        <label for="pembahas2_id" class="block mb-2 text-sm font-medium text-slate-900"> Dosen Pembahas 2</label>
                                        <select id="pembahas2_id" name="pembahas2_id" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-96 p-2.5">
                                            <option selected disabled>Pilih Dosen Pembahas 2</option>
                                            <?php foreach ($dosen as $d) : ?>
                                                <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col-span-1">
                                        <label for="pembimbing2_id" class="block mb-2 text-sm font-medium text-slate-900"> Dosen Pembimbing 2</label>
                                        <select id="pembimbing2_id" name="pembimbing2_id" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-96 p-2.5">
                                            <option selected disabled>Pilih Dosen Pembimbing 2</option>
                                            <?php foreach ($dosen as $d) : ?>
                                                <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="text-white text-sm inline-block rounded-lg shadow-lg px-4 py-2 mt-2 bg-green-500 hover:bg-green-700">
                                Tambahkan Jadwal
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="resources/js/jadwal-search.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>