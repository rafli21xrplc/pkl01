<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex items-center justify-center p-12 bg-gray-100">
        <div class="mx-auto w-full max-w-[550px]">
            <form method="post" action="<?= PATH_URL ?>/Post/validationMahasiswa" enctype="multipart/form-data">
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3">
                        <div class="mb-5">
                            <label for="nim" class="mb-3 block text-base font-medium text-[#07074D]">
                                NIM
                            </label>
                            <input type="number" name="nim" id="nim" placeholder="1231***" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3">
                        <div class="mb-5">
                            <label for="NamaMahasiswa" class="mb-3 block text-base font-medium text-[#07074D]">
                                Nama Mahasiswa
                            </label>
                            <input type="text" name="username" id="NamaMahasiswa" placeholder="Full Name" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
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
                <div class="mb-5">
                    <label for="dosen" class="mb-3 block text-base font-medium text-[#07074D]">
                        Dosen
                    </label>
                    <select name="dosen" id="dosen" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        <?php foreach ($datas['datas'] as $d) : ?>
                            <option value="<?= $d['username']; ?>"><?= $d['username']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="date" class="mb-3 block text-base font-medium text-[#07074D]">
                                Date
                            </label>
                            <input type="date" name="tanggalKuliah" id="date" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="time" class="mb-3 block text-base font-medium text-[#07074D]">
                                Time
                            </label>
                            <input type="time" name="jamKuliah" id="time" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>
                <div class="w-full sm:w-1/2">
                    <div class="mb-5">
                        <label for="dropzone-file" class="mx-auto cursor-pointer flex w-full flex-col items-center rounded-xl border-2 border-dashed border-blue-400 bg-white p-6 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                            <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Payment File</h2>
                            <p class="mt-2 text-gray-500 tracking-wide">Upload or darg & drop your file SVG, PNG, JPG or GIF. </p>
                            <input id="dropzone-file" type="file" name="file" class="hidden" />
                            </section>
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