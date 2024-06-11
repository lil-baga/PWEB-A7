<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="resources/img/unej.png">
    <title>S-Track | <?= $title ?? ''; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="resources/css/output.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="font-[poppins] overflow-x-hidden">
    <nav class="flex bg-slate-400 items-center justify-center">
        <div class="max-w-screen-xl flex items-center justify-between p-4 gap-64">
            <a href="<?=urlpath('')?>" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="resources/img/unej.png" class="h-12" alt="Logo Unej" />
                <span class="text-slate-900 self-center text-2xl font-semibold whitespace-nowrap italic">S-Track</span>
            </a>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-slate-100 rounded-lg bg-slate-50 md:space-x-16 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-slate-400">
                    <li>
                        <a href="<?=urlpath('dashboard')?>" class="block italic py-2 px-3 md:p-0 text-slate-900 rounded hover:text-white">Beranda</a>
                    </li>
                    <li>
                        <a href="<?=urlpath('jadwalsempro')?>" class="block italic py-2 px-3 md:p-0 text-slate-900 rounded hover:text-white">Jadwal</a>
                    </li>
                </ul>
            </div>
            <div class="flex order-2 space-x-0 gap-4">
                <?php if (!isset($_SESSION['user'])) :?>
                    <form action="<?=urlpath('login')?>" method="GET">
                        <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 font-medium rounded-lg text-sm px-6 py-2 text-center">Login</button>
                    </form>
                <?php else : ?>
                    <form action="<?=urlpath('logout')?>" method="GET">
                        <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 font-medium rounded-lg text-sm px-6 py-2 text-center">Logout</button>
                    </form>
                <?php endif ;?>
            </div>
        </div>
    </nav>

    <?php if (isset($_SESSION['status'])) {
    ?>
    <div class="flex w-screen items-center justify-center">
        <div id="alert" class="flex absolute items-center justify-center p-4 mt-24 bg-slate-900 text-white rounded-lg z-50" role="alert">
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

    <?= $body ?? ''; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="resources/js/dashboard-search.js"></script>
    <script src="resources/js/jadwal-search.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>