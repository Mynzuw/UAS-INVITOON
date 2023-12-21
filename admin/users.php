<?php
include "header.php";
?>
<main class="bg-gray-200">


<div class="p-10">
<span class="self-center text-2xl font-semibold whitespace-nowrap">USERS MANAGEMENT</span>
<p class="mb-10">
    Tempat untuk mengelola komik seperti menambahkan, mengedit, dan menghapus.
</p>
<!-- Modal toggle -->
<button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Tambah Users
</button>

<!-- Regist modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    TAMBAHKAN USERS
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="../controllers/proses_tambah_user.php" method="POST">
                <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="username" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="username" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="nama@email.com" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata Sandi</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div>
                        <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Kata Sandi</label>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
               
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div> 
</div>


<div class="">
    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg p-10">


<form>   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="text" id="default-search" name="cari" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari username" required>
        <button type="submit" value="Cari" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>


    <table class="bg-white-500 w-full text-sm text-left rtl:text-right text-white-500 dark:text-white-400 mt-10">
        <thead class="text-xs text-gray-700 uppercase bg-white-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
            <th scope="col" class="px-6 py-3">
                    ID
                </th>
            <th scope="col" class="px-6 py-3">
                    USERNAME
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="bg-white-300 text-gray-900">
        <?php
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $sql = "SELECT * from users where username like '%".$cari."%'";				
}else{		
 $sql = "SELECT * FROM users ORDER BY created_at DESC";
}
 $result = mysqli_query($conn,$sql);
 if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
?>
      <tr class="bg-white dark:bg-white-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-white-200">
        <td class="px-6 py-4 border border-b-indigo-200"><a href="komik-detail.php?user_id=<?= $row["user_id"] ?>"><?= $row["user_id"] ?></a></td>
        <td class="px-6 py-4 border border-b-indigo-200"><?= $row["username"] ?></td>
        <td class="px-6 py-4 border border-b-indigo-200"><?= $row["email"] ?></td>
        <td class="px-6 py-4 border border-b-indigo-200"> <?= $row["created_at"] ?>
        </td>
        <td class="px-6 py-4 border border-b-indigo-200">
        



        
       

<button class="edit-button mb-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" data-modal-target="crud-modal-edit<?= $row["user_id"] ?>" data-modal-toggle="crud-modal-edit<?= $row["user_id"] ?>" data-komik-id="<?= $row["user_id"] ?>">Edit</button>
        
<form action="../controllers/proses_edit_user.php" method="POST">
<div id="crud-modal-edit<?= $row["user_id"] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Users
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal-edit<?= $row["user_id"] ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>s
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="POST" action="../controllers/proses_edit_user.php.php">
            <section class="base">
                <div class="grid gap-4 mb-4 grid-cols-2">
                <input name="user_id" value="<?php echo $row["user_id"]; ?>"  hidden />
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="newUsername" id="newUsername" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tulis judul komik" value="<?= $row["username"] ?>" required="">
                        <input type="hidden" name="editUnameEmail" value="true">
                     
                    </div>
                    <div class="col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Email</label>
                        <input type="email" name="newEmail" id="newEmail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="nama@email.com" value="<?= $row["email"] ?>" required>
                      
                       
                    </div>
                
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Edit Users
                </button>
            <section class="base"> 
            </form>
        </div>
    </div>
</div>
</form>


<form action="../controllers/proses_hapus_user.php" method="POST">
<input type="hidden" name="hapus_user" value="true">
<input type="hidden" name="user_id" value="<?= $row["user_id"] ?>">
<button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" href="../controllers/proses_hapus_user.php?user_id=<?= $row["user_id"] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</button>
</form> 

        </td>
      </tr>
<?php
 }
}

mysqli_close($conn);
?>
    </tbody>
         
    </table>
</div>
</div>













</main>



        
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script> let table = new DataTable("#tableku"); </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
        

        <script>
  document.addEventListener('DOMContentLoaded', function () {
    var editButtons = document.querySelectorAll('.edit-button');
    
    editButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        var komikId = button.getAttribute('data-komik-id');
        var modalId = 'crud-modal-edit' + komikId;
        var modal = document.getElementById(modalId);
        
        // Tampilkan modal
        modal.classList.remove('hidden');
      });
    });
  });
</script>


        <script>
  function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-1-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}

</script>


        
</body>
</html>