<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?= $datas['title']; ?></title>
</head>

<body>

    <div class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
        <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
            <h1 class="font-bold text-center text-2xl mb-5"><?= $datas['title']; ?></h1>
            <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">

                <form action="<?= PATH_URL; ?>/Login/validationLogin" method="post">
                    <div class="px-5 py-7">
                        <label class="font-semibold text-sm text-gray-600 pb-1 block">E-mail</label>
                        <input name="username" type="email" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                        <label class="font-semibold text-sm text-gray-600 pb-1 block">Password</label>
                        <input name="password" type="password" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                        <button type="button" class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                            <span class="inline-block mr-2">
                                <input type="submit" name="submit" value="Login"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    </div>
                </form>
                <div class="py-5">
                    <div class="flex justify-end">
                        <div class="text-center sm:text-right  whitespace-nowrap">
                            <a href="<?= PATH_URL; ?>/Register/index">
                                <button class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset">
                                    <span class="inline-block mr-1">
                                        Register
                                    </span>
                                    <i class="fa-solid fa-arrow-right text-slate-400"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>