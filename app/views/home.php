<?php include("app/views/Components/navbar.php"); ?>

<?php 

if(isset($datas['tokens']))
{
    $url = explode('/', $_GET['url']);
    $query = "select * from dosen WHERE uuid='$url[2]'";
    $result = mysqli_query($this->conn, $query);

    $queryMatkul = "select * from mataKuliah";
    $resultMatkul = mysqli_query($this->conn, $queryMatkul);

    $datas['datas'] =   mysqli_fetch_assoc($result);
    $datas['datasMatkul'] = mysqli_fetch_all($resultMatkul, MYSQLI_ASSOC);
    $datas['title'] = 'Edit Data Dosen';
    $this->view('editDosen', $datas);
}

?>

<h1 class="text-3xl font-bold ">
    <div class="overflow-x-auto">
        <div class="min-h-screen w-5/6 mx-auto flex items-center justify-center font-sans overflow-hidden">
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
                                <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                    <td class="py-3 px-6">
                                        <div class="flex justify-center">
                                            <span class="font-medium text-center">1</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6">
                                        <div class="flex justify-center">
                                            <span class="font-medium text-center">Image</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex justify-center">
                                            <select name="mataKuliah" id="mataKuliah" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                                <option value="">Hello</option>
                                                <option value="">World</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex justify-center text-center">
                                            <select name="mataKuliah" id="mataKuliah" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                                <option value="">Hello</option>
                                                <option value="">World</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex justify-center text-center">
                                            <input type="datetime-local" name="username" id="username" placeholder="Full Name" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex justify-center text-center">
                                            <select name="mataKuliah" id="matkul" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                                <option value="">Hello</option>
                                                <option value="">World</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <button class="font-medium text-white text-xl p-2 rounded-md bg-cyan-500 shadow-lg shadow-cyan-500/50"><a href="<?= PATH_URL ?>/Post/postMahasiswa">Absen</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</h1>
</body>

</html>