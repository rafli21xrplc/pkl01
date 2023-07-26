<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px]">
            <form method="post" action="<?= PATH_URL ?>/Post/validationDosen">
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3">
                        <div class="mb-5">
                            <label for="code" class="mb-3 block text-base font-medium text-[#07074D]">
                                Code
                            </label>
                            <input type="number" name="code" id="code" placeholder="1231***" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3">
                        <div class="mb-5">
                            <label for="username" class="mb-3 block text-base font-medium text-[#07074D]">
                                Nama Dosen
                            </label>
                            <input type="text" name="username" id="username" placeholder="Full Name" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">
                        Jenis Kelamin
                    </label>
                    <div class="flex items-center space-x-6">
                        <div class="flex items-center">
                            <input type="radio" value="L" name="jenisKelamin" id="radioButton1" class="h-5 w-5" />
                            <label for="radioButton1" class="pl-3 text-base font-medium text-[#07074D]">
                                Laki - Laki
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" value="P" name="jenisKelamin" id="radioButton2" class="h-5 w-5" />
                            <label for="radioButton2" class="pl-3 text-base font-medium text-[#07074D]">
                                Perempuan
                            </label>
                        </div>
                    </div>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="date" class="mb-3 block text-base font-medium text-[#07074D]">
                                Tanggal Mengajar
                            </label>
                            <input type="date" name="tanggalKuliah" id="date" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <label for="matkul" class="mb-3 block text-base font-medium text-[#07074D]">
                        Mata Kuliah
                    </label>
                    <select name="mataKuliah" id="matkul" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        <?php foreach ($datas['datas'] as $d) : ?>
                            <option value="<?= $d['username']; ?>"><?= $d['username']; ?></option>
                        <?php endforeach; ?>
                    </select>
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