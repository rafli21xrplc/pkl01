<?php include("app/views/Components/navbar.php"); ?>

<?php

if (!isset($datas['tokens'])) {
    require_once 'app/views/login.php';
}

$id = 1;

?>

<h1 class="text-3xl font-bold ">
    <div class="overflow-x-auto">
        <div class="min-h-screen mx-auto flex items-center justify-center font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <button class="font-medium text-white text-xl p-2 rounded-md bg-cyan-500 shadow-lg shadow-cyan-500/50"><a href="<?= PATH_URL ?>/Post/postMahasiswa">Tambah Mahasiswa</a></button>
                <button class="font-medium text-white text-xl p-2 rounded-md bg-cyan-500 shadow-lg shadow-cyan-500/50"><a href="<?= PATH_URL ?>/Post/postDosen">Tambah Dosen</a></button>
                <button class="font-medium text-white text-xl p-2 rounded-md bg-cyan-500 shadow-lg shadow-cyan-500/50"><a href="<?= PATH_URL ?>/Post/postMataKuliah">Tambah Mata Kuliah</a></button>
                <form action="<?= PATH_URL ?>/Home/validationAbsen" method="post" class="flex flex-col flex-wrap justify-center items-center gap-10">
                    <div class="bg-white w-full shadow-md rounded my-6">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-center">No</th>
                                    <th class="py-3 px-6 text-center">Profile Image</th>
                                    <th class="py-3 px-6 text-center">Username</th>
                                    <th class="py-3 px-6 text-center">Dosen</th>
                                    <th class="py-3 px-6 text-center">Time</th>
                                    <th class="py-3 px-6 text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">

                                <?php if (isset($datas['datasAbsen'])) : ?>
                                    <?php foreach ($datas['datasAbsen'] as $mhs) : ?>
                                        <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                            <td class="py-3 px-6">
                                                <div class="flex justify-center">
                                                    <span class="font-medium text-center">
                                                        <?= $id++ ?>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6">
                                                <div class="flex justify-center">
                                                    <span class="font-medium text-center w-20 h-20"><img src="<?= PATH_URL ?>/public/images/<?= $mhs['Image'] ?>" alt="Image">
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex justify-center">
                                                    <span class="font-medium text-center"><?= $mhs['username'] ?></span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex justify-center text-center">
                                                    <span class="font-medium text-center"><?= $mhs['dosen'] ?></span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex justify-center text-center">
                                                    <span class="font-medium text-center"><?= $mhs['waktu'] ?></span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex justify-center text-center">
                                                    <span class="font-medium text-center"><?= $mhs['status'] ?></span>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>


                                <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                    <td class="py-3 px-6">
                                        <div class="flex justify-center">
                                            <span class="font-medium text-center">
                                                -
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6">
                                        <div class="flex justify-center">
                                            <span class="font-medium text-center w-20 h-20"><img src="<?= PATH_URL ?>/public/images/users.jpg" alt="Image"></span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex justify-center">
                                            <select name="username" id="matkul" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                                <?php foreach ($datas['datasMahasiswa'] as $mhs) : ?>
                                                    <option value="<?= $mhs['username']; ?>"><?= $mhs['username']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex justify-center text-center">
                                            <select name="dosen" id="matkul" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                                <?php foreach ($datas['datasMahasiswa'] as $mhs) : ?>
                                                    <option value="<?= $mhs['dosen']; ?>"><?= $mhs['dosen']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex justify-center text-center">
                                            <input type="datetime-local" name="datetime" id="date-tim" placeholder="Full Name" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex justify-center text-center">
                                            <select name="status" id="matkul" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                                <option value="Ijin">Ijin</option>
                                                <option value="Absen">Absen</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <button name="submit" type="submit" class="font-medium text-white text-xl p-2 rounded-md bg-cyan-500 shadow-lg shadow-cyan-500/50">Absen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</h1>
</body>

</html>