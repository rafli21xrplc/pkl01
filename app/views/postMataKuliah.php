<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex items-center justify-center p-12 bg-gray-100">
        <div class="mx-auto w-full max-w-[550px]">
            <form method="post" action="<?= PATH_URL ?>/Post/validationMataKuliah">
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3">
                        <div class="mb-5">
                            <label for="code" class="mb-3 block text-base font-medium text-[#07074D]">
                                Code
                            </label>
                            <input type="number" name="code" id="code" placeholder="code" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3">
                        <div class="mb-5">
                            <label for="username" class="mb-3 block text-base font-medium text-[#07074D]">
                                Nama Mata Kuliah
                            </label>
                            <input type="text" name="username" id="username" placeholder="Full Name" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3">
                        <div class="mb-5">
                            <label for="sks" class="mb-3 block text-base font-medium text-[#07074D]">
                                SKS
                            </label>
                            <input type="number" name="sks" id="sks" placeholder="20" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3">
                        <div class="mb-5">
                            <label for="semester" class="mb-3 block text-base font-medium text-[#07074D]">
                                Semester
                            </label>
                            <input type="number" name="semester" id="semester" placeholder="3" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>
                <div>
                    <input name="submit" type="submit" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                    </input>
                </div>
            </form>
        </div>
    </div>
</body>

</html>