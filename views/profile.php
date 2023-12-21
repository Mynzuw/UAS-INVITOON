<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <?php include("../routes/route.php"); ?>
</head>
<body>
<?php
session_start();
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    
} else {
    header('Location: dashboard.php');
    
}
$username = $_SESSION['username'];
$email = $_SESSION['email'];
include "../components/navbar.php";
include("../routes/route.php");
?>


<div class="p-10">

<h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-900">Username</h5>
<div class="my-5 w-6/12 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="px-5 pb-5">
        <div class="flex items-center justify-between my-5">
            
            <span id="usernameText" class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo $username;?></span>
            <a href="#" id="editButton" onclick="toggleEdit()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</a>
        </div>
         
        <div id="editContainer" class="hidden" class="flex items-center justify-between my-5">
            <form action="../controllers/updateUnameEmail.php" method="post">
                
            <input type="text" id="usernameInput" name="newUsername" class="text-3xl font-bold text-gray-900 dark:bg-gray-800 dark:text-white">
            <input type="hidden" name="editUsername" value="true">
            <span id="availability"></span>
            <button type="submit" class="mt-5 text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-400 dark:hover:bg-green-500 dark:focus:ring-green-600">Save Changes</button>
          
            </form>
             </div>
             
    </div>
</div>

<h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-900">Email</h5>
<div class="my-5 w-6/12 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="px-5 pb-5">
    <div class="flex items-center justify-between my-5">
            <span id="emailText" class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo $email;?></span>
            <a href="#" id="editButtonEmail" onclick="toggleEditEmail()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</a>
        </div>
         
        <div id="editContainerEmail" class="hidden" class="flex items-center justify-between my-5">
            <form action="../controllers/updateUnameEmail.php" method="post">
            <input type="text" id="emailInput" name="newEmail"  class="text-3xl font-bold text-gray-900 dark:bg-gray-800 dark:text-white">
            <input type="hidden" name="editEmail" value="true">
            <button type="submit" class="mt-5 text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-400 dark:hover:bg-green-500 dark:focus:ring-green-600">Save Changes</button>
           
           </form>
        </div>
    </div>
</div>

<h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-900">Logout</h5>
<div class="my-5 w-6/12 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="px-5 pb-5">
            <form action="../controllers/logout.php" method="post">
            <button type="submit" class="mt-5 text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-400 dark:hover:bg-red-500 dark:focus:ring-red-600">LOGOUT</button>
           </form>
        </div>
    </div>
</div>


</div>
</body>
<script>
function toggleEdit() {
    // Mendapatkan elemen-elemen yang akan diubah
    var usernameText = document.getElementById("usernameText");
    var editButton = document.getElementById("editButton");
    var usernameInput = document.getElementById("usernameInput");
    var editContainer = document.getElementById("editContainer");

    // Menyembunyikan elemen teks, tombol "Edit", dan menampilkan elemen input dan tombol "Save Changes"
    usernameText.style.display = "none";
    editButton.style.display = "none";
    usernameInput.style.display = "block";
    editContainer.style.display = "block";
}

function saveChanges() {
    // Mendapatkan nilai dari input
    var newUsername = document.getElementById("usernameInput").value;

    // Simpan nilai ke dalam database atau lakukan tindakan sesuai kebutuhan

    // Setelah menyimpan, perbarui elemen teks dengan nilai baru
    var usernameText = document.getElementById("usernameText");
    var editButton = document.getElementById("editButton");

    usernameText.innerHTML = newUsername;

    // Tampilkan kembali elemen teks, tombol "Edit", dan sembunyikan elemen input dan tombol "Save Changes"
    usernameText.style.display = "block";
    editButton.style.display = "block";
    document.getElementById("usernameInput").style.display = "none";
    document.getElementById("editContainer").style.display = "none";
}

function toggleEditEmail() {
    // Mendapatkan elemen-elemen yang akan diubah
    var usernameText = document.getElementById("emailText");
    var editButtonEmail = document.getElementById("editButtonEmail");
    var emailInput = document.getElementById("emailInput");
    var editContainerEmail = document.getElementById("editContainerEmail");

    // Menyembunyikan elemen teks, tombol "Edit", dan menampilkan elemen input dan tombol "Save Changes"
    emailText.style.display = "none";
    editButtonEmail.style.display = "none";
    emailInput.style.display = "block";
    editContainerEmail.style.display = "block";
}

function saveChangesEmail() {
    // Mendapatkan nilai dari input
    var newemail = document.getElementById("emailInput").value;

    // Simpan nilai ke dalam database atau lakukan tindakan sesuai kebutuhan

    // Setelah menyimpan, perbarui elemen teks dengan nilai baru
    var emailText = document.getElementById("emailText");
    var editButtonEmail = document.getElementById("editButtonEmail");

    emailText.innerHTML = newemail;

    // Tampilkan kembali elemen teks, tombol "Edit", dan sembunyikan elemen input dan tombol "Save Changes"
    emailText.style.display = "block";
    editButton.style.display = "block";
    document.getElementById("emailInput").style.display = "none";
    document.getElementById("editContainerEmail").style.display = "none";
}
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    // AJAX untuk memeriksa ketersediaan username secara real-time
    $(document).ready(function () {
        $('#usernameInput').on('input', function () {
            var username = $(this).val();

            $.ajax({
                type: 'POST',
                url: '../controllers/ketersediaan.php', // Ganti dengan nama file PHP yang sesuai
                data: {username: username},
                success: function (response) {
                    $('#availability').html(response);
                }
            });
        });
    });
</script>