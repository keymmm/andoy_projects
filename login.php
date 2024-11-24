<?php    session_start(); ?>


<?php
    $error = '';
 
    require 'db_connection/connection.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
        $email = $_POST['email'];
        $password = md5($_POST['password']); 

        $sqlquery = "SELECT * FROM  tbl_customers WHERE email = ? AND password = ?";
    
        // Prepare the SQL statement
        $stmt = $conn->prepare($sqlquery);
        $stmt->bind_param('ss', $email, $password);

        if($stmt->execute()){
    
        // Get the result
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        
        if ($user) {
            // Set session variables
            $_SESSION['user_id'] = $user['customer_id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['isLogin'] = True;
            // Redirect to a secure page
            echo "<script>alert('Login successfully')</script>";
            header('Location: index.php');
            exit;
        } else {
            $error =  "Invalid username or password";
            
        }
    }
    
        $stmt->close();
    }
    
    $conn->close();
    
    


?>


<?php require 'views/partials/head.php' ?>
<body class="bg-green-200 flex items-center justify-center h-screen">
    <div class="bg-white p-12 rounded-lg shadow-md w-full max-w-md h-auto">

        <?php if(!empty($error)) :?>
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
             <span class="font-medium"><?= $error ?></span>
        </div>
        <?php endif?>

        <h2 class="text-2xl font-bold mb-6">Sign in to your account</h2>
      
        <form method="post" action="">
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2" for="email">Email</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-lg" name="email" type="email" id="email" placeholder="name@company.com" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2" for="password">Password</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-lg" name="password" type="password"id="password" placeholder="••••••••" required>
            </div>
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm">Remember me</label>
                </div>
                <a href="#" class="text-sm text-green-600 hover:underline">Forgot password?</a>
            </div>
            <button type="submit" name="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">Sign in</button>
        </form>
        <p class="mt-6 text-center text-sm">Don’t have an account yet? <a href="signup.php" class="text-green-600 hover:underline">Sign up</a></p>
    </div>
</body>
</html>

