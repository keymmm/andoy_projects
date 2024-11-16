<html>
<head>
    <title>Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-12 rounded-lg shadow-md w-full max-w-md h-auto">
        <h2 class="text-2xl font-bold mb-6">Create your account</h2>
        <form method="POST" action="./signup.php">
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2" for="name">Name</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-lg" type="text" id="name" name="name" placeholder="Enter Your Name">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2" for="email">Email</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-lg" type="email" id="email" name="email" placeholder="name@company.com">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2" for="password">Password</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-lg" minlength="10" type="password"id="password" name="password" placeholder="••••••••">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2" for="password" >Confirm Password</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-lg" minlength="10" type="password" id="con-password" name="con-password" placeholder="••••••••">
            </div>
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm">Remember me</label>
                </div>
                <a href="#" class="text-sm text-green-600 hover:underline">Forgot password?</a>
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700" name="create-account" >Create account</button>
        </form>
        <p class="mt-6 text-center text-sm">Already have an account? <a href="login.php" class="text-green-600 hover:underline">Login</a></p>
    </div>
</body>
</html>

<?php
 require 'db_connection/connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-account'])) {
        // Get the POST data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $confirm_password = md5($_POST['con-password']);

        if ($password !== $confirm_password) {
            echo "<script>alert('Password Dont Match!')</script>";
            exit();
        } if(empty($name) and empty($email)){
            echo "<script>alert('All fields cannot be empty')</script>";
            exit();
        }

        // Step 1: Check if the email already exists in the database
        $checkQuery = "SELECT email FROM tbl_customers WHERE email = ?";
        
        // Prepare the query to check for existing email
        if ($stmt = $conn->prepare($checkQuery)) {
            $stmt->bind_param("s", $email); // Bind the email parameter
            $stmt->execute();
            $stmt->store_result();

            // If the email already exists, display an error message
            if ($stmt->num_rows > 0) {
                echo "<script>alert('This email is already exists!')</script>";
                $stmt->close();
            } else {
                // Step 2: Email doesn't exist, proceed with inserting the new user
                $sqlQuery = "INSERT INTO tbl_customers (name, email, password) VALUES (?, ?, ?)";

                // Prepare the insert query
                if ($stmt = $conn->prepare($sqlQuery)) {
                    $stmt->bind_param("sss", $name, $email, $password);

                    if ($stmt->execute()) {
                        echo "<script>alert('succefully created')</script>";
                        header("location : login.php");
                    }
                    $stmt->close();
                }
            }
        }
    }
?>


