<?php  
   session_start(); 
   
   // Check if the user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
  $user_first_name = $_SESSION['user_firstname']; // Get user's first name from the session
  $user_last_name = $_SESSION['user_lastname']; // Get user's last name from the session
  $user_country = $_SESSION['user_country']; // Get user's country from the session
  $user_city = $_SESSION['user_city']; // Get user's city from the session

} else {
  // If the user is not logged in, you can set default values or redirect to the login page
    // For example, you can set default values for display or redirect to login:
    // header('Location: login-form-bcrypt.php');
    // exit();
    $user_first_name = "Guest";
    $user_last_name = "";
    $user_country = "Country";
    $user_city = "City";
}
?>
<!DOCTYPE html>
<html lang=en>
<head>
    <title>Chapter 16</title>
    <meta charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="css/tailwind.css" rel="stylesheet">
</head>
<body >  

<section class="text-gray-600 body-font">
  <div class="container px-5 py-12 mx-auto flex flex-col">
    <div class="lg:w-4/6 mx-auto">
      <div class="rounded-lg h-64 overflow-hidden">
        <img alt="content" class="object-cover object-center h-full w-full" src="images/florence.jpg">
      </div>
      <div class="flex flex-col sm:flex-row mt-10">
        <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">

              <div class="flex flex-col items-center text-center justify-center">
                <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">
                Welcome, <?php echo htmlspecialchars($user_first_name . ' ' . $user_last_name); ?>!
                </h2>
                <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                <p class="text-base">
                Location: <?php echo htmlspecialchars($user_city . ', ' . $user_country); ?>
                </p>   
                <a class="text-indigo-500 inline-flex items-center mt-8" href="logout.php">Logout using session_unset() </a>         
              </div>

            <div class="flex flex-col items-center text-center justify-center">
              <a class="text-indigo-500 inline-flex items-center" href="login-form-bcrypt.php">Login with bcrypt</a>
              <a class="text-indigo-500 inline-flex items-center" href="login-form-salt.php">Login with salt</a> 
              <a class="text-indigo-500 inline-flex items-center" href="registration-form-bcrypt.php">Register a new user</a> 
            </div> 


        </div>
        <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
          <p class="leading-relaxed text-lg mb-4">
          After login, redirect to this home page. If the user has logged in, in the message area of the home
          page, display the user’s name, city, country; if the user isn’t logged in when requesting this
          file, display links to the login page. This will require making use of session
          state in PHP to keep track of the logged in user.
         </p>

        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>