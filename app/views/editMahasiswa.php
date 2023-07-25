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
            <form method="post" action="<?= PATH_URL ?>/Mahasiswa/validationMahasiswa">
                <input type="hidden" name="uuid" value="<?= $datas['datas']['uuid'] ?>">
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3">
                        <div class="mb-5">
                            <label for="nim" class="mb-3 block text-base font-medium text-[#07074D]">
                                NIM
                            </label>
                            <input type="number" value="<?= $datas['datas']['nim'] ?>" name="nim" id="nim" placeholder="Full Name" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3">
                        <div class="mb-5">
                            <label for="NamaMahasiswa" class="mb-3 block text-base font-medium text-[#07074D]">
                                Nama Mahasiswa
                            </label>
                            <input type="text" value="<?= $datas['datas']['username'] ?>" name="username" id="NamaMahasiswa" placeholder="Full Name" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">
                        Jenis Kelamin
                    </label>
                    <div class="flex items-center space-x-6">
                        <div class="flex items-center">
                            <input type="radio" value="L" <?= $datas['datas']['jenisKelamin'] === "L" ? "checked" : "" ?> name="jenisKelamin" id="radioButton1" class="h-5 w-5" />
                            <label for="radioButton1" class="pl-3 text-base font-medium text-[#07074D]">
                                Laki - Laki
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" value="P" <?= $datas['datas']['jenisKelamin'] === "P" ? "checked" : "" ?> name="jenisKelamin" id="radioButton2" class="h-5 w-5" />
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
                        <?php foreach ($datas['datasDosen'] as $d) : ?>
                            <option <?= $datas['datas']['dosen'] === $d['username'] ? "selected" : "" ?> value="<?= $d['username']; ?>"><?= $d['username']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="date" class="mb-3 block text-base font-medium text-[#07074D]">
                                Date
                            </label>
                            <input type="date" value="<?= $datas['datas']['tanggalKuliah']; ?>" name="tanggalKuliah" id="date" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="time" class="mb-3 block text-base font-medium text-[#07074D]">
                                Time
                            </label>
                            <input type="time" value="<?= $datas['datas']['jamKuliah']; ?>" name="jamKuliah" id="time" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
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