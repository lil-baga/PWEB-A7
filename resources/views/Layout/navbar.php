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
    <script src="resources/js/live-search.js"></script>
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

    <?= $body ?? ''; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>