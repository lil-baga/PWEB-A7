<body>
    <div class="flex flex-row content-center items-center justify-center w-screen h-full px-4 py-2 gap-16">
        <div class="flex">
            <div class="flex flex-col justify-between p-8 text-slate-900">
                <div class="flex flex-col rounded-lg">
                    <h1 class="text-center text-2xl font-medium mb-2">
                        <?php if (!isset($_SESSION['user'])) : ?>
                            Halo, Selamat Datang Mahasiswa Sistem Informasi!
                        <?php else : ?>
                            Halo, Selamat Datang <?= $_SESSION['user']['nama'] ?>!
                        <?php endif; ?>
                    </h1>
                </div>
                <!-- Charts -->
                <div class="grid grid-cols-1 m-auto gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-xl">
                        <canvas id="barChart" class="w-[960px] h-[570px]"></canvas>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center mt-4">
                    <?php if (!isset($_SESSION['user'])) : ?>
                    <?php else : ?>
                        <?php if (($_SESSION['user']['roles_id'] == 1)) : ?>
                            <form action="<?= urlpath('register') ?>" method="GET">
                                <button type="submit" class="text-white text-lg inline-block rounded-lg shadow-lg px-4 py-2 mt-2 bg-green-500 hover:bg-green-700">
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
                <div class="p-8 text-lg font-semibold text-left rtl:text-right text-slate-900 bg-white mb-4">
                    Record Proposal Skripsi
                    <p class="mt-1 text-sm font-normal text-slate-500">Anda dapat melihat record proposal skripsi terbaru di sini.</p>
                    <p class="mt-1 text-sm font-normal text-slate-500">Cari Berdasarkan Nama, NIM, atau Judul</p>
                    <div class="max-w-md mx-auto mt-6 mb-4">
                        <label for="live-search" class="mb-2 text-sm font-normal text-slate-900 sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="live-search" class="block w-full p-2 ps-10 text-sm text-slate-900 border border-slate-300 rounded-lg bg-slate-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari Record Sempro" />
                        </div>
                    </div>
                    <div class="w-[960px] h-[570px] font-normal shadow-lg sm:rounded-lg border border-slate-300">
                        <div id="load-result" class="h-[570px] overflow-y-auto overflow-x-hidden">
                            <table class="table w-[960px] table-auto text-center text-sm bg-white">
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
                                                        <div class="flex flex-row justify-center gap-4">
                                                            <div class="flex flex-row items-center justify-center">
                                                                <a href="resources/pdf/<?= $s['proposal'] ?>" target="_blank" class="button bg-blue-500 transition-colors flex flex-row items-center justify-center hover:cursor-pointer hover:bg-blue-700 text-white font-medium py-2 px-4 rounded gap-2" title="Link Proposal">
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
                                            <?php else : ?>
                                        <?php endif;
                                        endforeach; ?>
                                    <?php endif; ?>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                loadData();
            })

            function loadData() {
                $.get('resources/views/ajaxload.php', function(data) {
                    $('#load-result').html(data)
                })
            }
        </script>
        <script>
            const barChart = document.getElementById('barChart').getContext('2d');
            const jadwaldata = <?= json_encode(count($jadwal)) ?>;
            const recorddata = <?= json_encode(count($record)) ?>;
            const semproChart = new Chart(barChart, {
                type: 'bar',
                data: {
                    labels: ['Jadwal dan Record Sempro'],
                    datasets: [{
                            label: 'Jadwal',
                            data: [jadwaldata],
                            backgroundColor: 'rgba(15, 130, 246, 0.2)',
                            borderColor: 'rgba(15, 130, 246, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Record',
                            data: [recorddata],
                            backgroundColor: 'rgba(29, 78, 216, 0.2)',
                            borderColor: 'rgba(29, 78, 216, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
</body>