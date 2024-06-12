<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="resources/img/unej.png">
    <title>S-Track | <?= $title ?? ''; ?></title>
    <style>
        .remove-arrow::-webkit-inner-spin-button,
        .remove-arrow::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .remove-arrow {
            -appearance: textfield;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="resources/css/output.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="font-[poppins] overflow-x-hidden">
    <nav class="flex bg-slate-400 items-center justify-center">
        <div class="max-w-screen flex content-center items-center justify-between p-4 gap-64">
            <div class="w-64 content-center items-center justify-center">
                <a href="<?= urlpath('') ?>" class="flex content-center items-center justify-center space-x-3 rtl:space-x-reverse">
                    <img src="resources/img/unej.png" class="h-12" alt="Logo Unej" />
                    <span class="text-slate-900 self-center text-2xl font-semibold whitespace-nowrap italic">S-Track</span>
                </a>
            </div>
            <div class="w-64 content-center items-center justify-center">
                <div class="content-center items-center justify-center gap-32 hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-slate-100 rounded-lg bg-slate-50 md:space-x-16 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-slate-400">
                        <li>
                            <a href="<?= urlpath('dashboard') ?>" class="block italic py-2 px-3 md:p-0 text-slate-900 rounded hover:text-white">Beranda</a>
                        </li>
                        <li>
                            <a href="<?= urlpath('jadwalsempro') ?>" class="block italic py-2 px-3 md:p-0 text-slate-900 rounded hover:text-white">Jadwal</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-64 content-center items-center justify-center">
                <div class="flex order-2 space-x-0 content-center items-center justify-center">
                    <?php if (!isset($_SESSION['user'])) : ?>
                        <form action="<?= urlpath('login') ?>" method="GET">
                            <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 font-medium rounded-lg text-sm px-6 py-2 text-center">Login</button>
                        </form>
                    <?php else : ?>
                        <div>
                            <button data-modal-target="modal-logout" data-modal-toggle="modal-logout" class="text-white bg-blue-500 hover:bg-blue-700 font-medium rounded-lg text-sm px-6 py-2 text-center">Logout</button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <?php if (isset($_SESSION['status'])) {
    ?>
        <div class="flex w-screen items-center justify-center">
            <div id="alert" class="flex absolute shadow-xl items-center justify-center p-4 mt-24 bg-slate-400 text-white rounded-lg z-50" role="alert">
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

    <!-- Delete Modal -->
    <div id="modal-logout" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative p-4 shadow-xl text-center bg-white rounded-lg sm:p-5">
                <p class="mb-4 text-lg text-slate-900">Yakin Ingin Logout?</p>
                <div class="flex justify-center items-center space-x-4">
                    <button data-modal-toggle="modal-logout" type="button" class="flex py-2 px-4 transition-colors text-sm font-medium text-white bg-blue-500 rounded hover:bg-blue-700 gap-2">
                        Tidak
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M21 11H6.414l5.293-5.293l-1.414-1.414L2.586 12l7.707 7.707l1.414-1.414L6.414 13H21z" />
                        </svg>
                    </button>
                    <form id='delete' method="GET" action="<?= urlpath('logout') ?>">
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

    <?= $body ?? ''; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="resources/js/dashboard-search.js"></script>
    <script src="resources/js/jadwal-search.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>