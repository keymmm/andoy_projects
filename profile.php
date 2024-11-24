<?php

session_start();
require 'db_connection/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $name = ($_POST['name']);
    $email = ($_POST['email']);
    $address = ($_POST['address']);
    $phone = ($_POST['phone']);


    $user_id = $_SESSION['user_id'];

    // Validate required fields
    if (!$address || !$phone) {
        echo "<script>alert('adress and phone are required!');</script>";
        header('Location: profile.php'); // Redirect back to the profile page
        exit;
    }

    // Update the database
    $sqlQuery = "UPDATE tbl_customers SET name = ?, email = ?, address = ?, phone = ? WHERE customer_id = ?";
    $stmt = $conn->prepare($sqlQuery);
    $stmt->bind_param('ssssi', $name, $email, $address, $phone, $user_id);

    if ($stmt->execute()) {
        // Update session variables
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['address'] = $address;
        $_SESSION['phone'] = $phone;

        echo "<script>alert('Profile updated successfully!');</script>";
        header('Location: profile.php');
        exit;
    } else {
        echo "<script>alert('Error updating profile. Please try again.');</script>";
    }

    $stmt->close();
}

?>





<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Profile View
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
        }
  </style>
 </head>
 <body class="bg-gray-100">

 <form method="post" >
  <div class="container mx-auto p-10">
   <div class="bg-white shadow-lg rounded-lg p-8">
    <div class="flex items-center space-x-6">
     <div class="relative">
      <img alt="Profile picture of the user" class="w-24 h-24 rounded-full border-4 border-blue-500" height="100" id="profile-pic" src="image/home/Screenshot 2024-11-16 152017.png" width="100"/>
      <label class="absolute bottom-0 right-0 bg-blue-500 text-white p-1 rounded-full cursor-pointer" for="profile-picture">
       <i class="fas fa-camera">
       </i>
       <input class="hidden" id="profile-picture" name="profile-picture" type="file" accept="image/*" onchange="previewImage(event)"/>
      </label>
     </div>
     <div>
      <h2 class="text-3xl font-bold text-gray-800">
       <?= $_SESSION['name'] ?>
      </h2>
      <p class="text-gray-500">
       <?= $_SESSION['email'] ?> 
      </p>
     </div>
    </div>
    <div class="mt-8">
     <h3 class="text-2xl font-semibold mb-6 text-gray-700">
      Profile Details
     </h3>
     <form class="space-y-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
       <div>
        <label class="block text-gray-700" for="name">
         Name
        </label>
        <input class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="name" name="name" type="text" value="<?php if(!empty($_SESSION['name'])) { echo $_SESSION['name'];}?>"/>
       </div>
       <div>
        <label class="block text-gray-700" for="email">
         Email
        </label>
        <input class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="email" name="email" type="email" value="<?php if(!empty($_SESSION['email'])) { echo $_SESSION['email'];} ?>" />
       </div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="py-2.5">
        <label class="block text-gray-700" for="address">
         Address
        </label>
        <input class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="address" name="address" type="text" value="<?php  if(!empty($_SESSION['address'])) { echo$_SESSION['address'];} ?>"/>
       </div>
       <div class="py-2.5">
        <label class="block text-gray-700 " for="phone">
         Phone Number
        </label>
        <input class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="phone" name="phone" type="text" value="<?php  if(!empty($_SESSION['phone'])) { echo $_SESSION['phone'];} ?>"/>
       </div>
      </div>
      <div class="flex justify-end py-5">
       <button class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500" type="submit">
        Save Changes
       </button>
      </div>
     </form>
    </div>
   </div>
  </div>
 </form>
  <script>
   function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('profile-pic');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
  </script>
 </body>
</html>