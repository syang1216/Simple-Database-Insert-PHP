<?php
  require_once('../private/initialize.php');
  require_once('../private/validation_functions.php');

  // Set default values for all variables the page needs.

  // if this is a POST request, process the form
  // Hint: private/functions.php can help

    // Confirm that POST values are present before accessing them.

    // Perform Validations
    // Hint: Write these in private/validation_functions.php

    // if there were no errors, submit data to database

      // Write SQL INSERT statement
      // $sql = "";

      // For INSERT statments, $result is just true/false
      // $result = db_query($db, $sql);
      // if($result) {
      //   db_close($db);

      //   TODO redirect user to success page

      // } else {
      //   // The SQL INSERT statement failed.
      //   // Just show the error, not the form
      //   echo db_error($db);
      //   db_close($db);
      //   exit;
      // }

?>

<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <h1>Register</h1>
  <p>Register to become a Globitek Partner.</p>

  <?php
    $first_name = "";
    $last_name = "";
    $username = "";
    $email = "";
    if(is_post_request()){
      $first_name = h($_POST['fn']);
      $last_name = h($_POST['ln']);
      $username = h($_POST['username']);
      $email = h($_POST['email']);
      $errors = [];

      if(is_blank($first_name)){
        $errors[] = "first name is not present </br>";
      }else if(!has_length($first_name, ['min'=>2, 'max'=>255])){
        $errors[] = "please make sure first name has length between 2 and 255</br>";
      }else if(!preg_match('/\A[A-Za-z\s\-,\.\']+\Z/', $first_name)){
        $errors[] = "first name must only contain letters, spaces, commas, dashs, dots, and single quotes";
      }

      if(is_blank($last_name)){
        $errors[] =  "last name is not present<br>";
      }else if(!has_length($last_name, ['min'=>2, 'max'=>255])){
        $errors[] = "please make sure last name has length between 2 and 255</br>";
      }else if(!preg_match('/\A[A-Za-z\s\-,\.\']+\Z/', $last_name)){
        $errors[] = "last name must only contain letters, spaces, commas, dashs, dots, and single quotes";
      }

      if(is_blank($username)){
        $errors[] = "username is not present<br>";
      }else if(!has_length($_POST['username'], ['min'=>8, 'max'=>255])){
        $errors[] = "please make sure username has length between 8 and 255</br>";
      }else if(!preg_match('/\A[A-Za-z0-9\_]+\Z/', $username)){
        $errors[] = "username must only contain letters, numbers, and underscore";
      }

      if(is_blank($email)){
        $errors[] = "email is not present<br>";
      }else if (!has_length($email, ['max'=>255])){
        $errors[] = "email exceeds 255 char <br>";
      }else if(!has_valid_email_format($email)){
        $errors[] = "email doesne't contain @<br>";
      }else if(!preg_match('/\A[A-Za-z0-9\_\@\.]+\Z/', $email)){
        $errors[] = "email must only contain letters, numbers, and underscore, @ and .";
      }

      if($errors){
        echo display_errors($errors);
      }else{
        $conn = mysqli_connect("localhost", "root", "", "globitek");
        if(!$conn){
          die("connection failed: " . $conn->connect_error);
        }

        $first_name = $first_name;
        $last_name = $last_name;
        $username = $username;
        $email = $email;

        $sql = "select * from users where username='" . $username . "';";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
          $errors[] = "user name taken</br>";
          echo display_errors($errors);
        }else{
          $sql = "insert into users (first_name, last_name, email, username, created_at) values ('" . $first_name . "','" . $last_name ."','" . $email . "','" . $username ."','" . date("Y-m-d H:i:s") . "');";
          if(mysqli_query($conn, $sql)){
            header("Location: registration_success.php");
            exit;
          }else{
            echo "error inserting " . $sql . "<br>" . mysql_error($conn);
          }     
        }

      }

    }
    // TODO: display any form errors here
    // Hint: private/functions.php can help
  ?>

  <!-- TODO: HTML form goes here -->
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    first name</br> <input type="text" name="fn" value="<?php echo $first_name; ?>"/>  </br>
    last name</br><input type="text" name='ln' value="<?php echo $last_name; ?>"/>  </br>
    email</br><input type="text" name="email" value="<?php echo $email; ?>"/>  </br>
    username</br><input type="text" name='username' value="<?php echo $username; ?>"/>  </br>
    <input type="submit" value="Submit"/> </br>
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>

<!--
How are form values sent to the URL in the form action?
A: POST

How can PHP access form values?
A: $_POST

How do you interpolate a variable into a string in PHP?
A: ""

What sanitization does PHP do automatically?
A: none

When using PHP's mysqli_connect() to connect to MySQL, what gets returned?
A: $conn object that represents connection to sql

What does mysqli_fetch_assoc() do besides return a row of data?
A: 

What happens if a loop's condition is never met?
A: never goes in?

Why is it a good practice to use "LIMIT 1" when updating a MySQL record?


What types of problems could arise if all validations were removed?
A: insert empty rows into database?

Why should form attributes still be assigned values if a form has errors?
A: 

What potential problem would the last name "D'Angelo" create for the database?
A: sql injection because ' escapes a string comparison like where lastname = 'D'Angelo';

-->