<?php
require 'includes/scripts/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

      if (isset($_POST['roomType'], $_POST['checkinDate'], $_POST['ticketCount'], $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['mobileNumber']) &&
          !empty($_POST['roomType']) && !empty($_POST['checkinDate']) && !empty($_POST['ticketCount']) &&
          !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) &&
          !empty($_POST['mobileNumber'])) {

          $destination = $_POST['roomType'];
          $checkinDate = $_POST['checkinDate'];
          $ticketCount = $_POST['ticketCount'];
          $firstName = $_POST['firstName'];
          $lastName = $_POST['lastName'];
          $email = $_POST['email'];
          $mobileNumber = $_POST['mobileNumber'];

          $baseprice = $_POST['pricePerTicket'];
          $totalprice = $_POST['totalAmount'];

          // Extract place name from destination
          $placeName = explode(' - ', $destination)[0];

          // Get daily limit for the selected place
          $limitQuery = "SELECT daily_limit FROM places_master WHERE place_name = '$placeName'";
          $limitResult = mysqli_query($conn, $limitQuery);
          $limitData = mysqli_fetch_assoc($limitResult);
          $dailyLimit = $limitData['daily_limit'];

          // Get total booked tickets for the selected date and place
          $bookedQuery = "SELECT SUM(qty) AS total_booked FROM ticket WHERE place_name = '$placeName' AND booking_date = '$checkinDate'";
          $bookedResult = mysqli_query($conn, $bookedQuery);
          $bookedData = mysqli_fetch_assoc($bookedResult);
          $totalBooked = $bookedData['total_booked'] ?? 0;

          // Calculate available tickets
          $availableTickets = max($dailyLimit - $totalBooked, 0);

          // Check if there are enough tickets available
          if ($availableTickets < $ticketCount) {
              echo "<script>alert('Insufficient tickets available. Only $availableTickets tickets are available for $placeName on $checkinDate.');</script>";
          } else {
              // Extract price from destination
              $pricePerTicket = (int) filter_var($destination, FILTER_SANITIZE_NUMBER_INT);
              $totalAmount = $pricePerTicket * $ticketCount;

              // Prepare SQL statement
              $sql = "INSERT INTO ticket (booking_date, user_id, email, f_name, l_name, mobile_no, place_name, base_price, qty, total, is_confirm) 
                      VALUES (?, 001, ?, ?, ?, ?, ?, ?, ?, ?, 0)";
              $stmt = mysqli_prepare($conn, $sql);
              mysqli_stmt_bind_param($stmt, "ssssisiii", 
                  $checkinDate,
                  $email, 
                  $firstName, 
                  $lastName,
                  $mobileNumber, 
                  $placeName, 
                  $baseprice, 
                  $ticketCount, 
                  $totalprice,
              );

              // Execute the statement
              if (mysqli_stmt_execute($stmt)) {
                  echo "<script>alert('Booking saved successfully!');</script>";
                  // Redirect to avoid form resubmission
                  header("Location: " . $_SERVER['PHP_SELF']);
                  exit;
              } else {
                  echo "<script>alert('Error saving booking: " . mysqli_error($conn) . "');</script>";
                 
              }

              mysqli_stmt_close($stmt);
          }
      } else {
          // echo "<script>alert('Please fill in all required fields.');</script>";
          echo "Error is the data saving";
      }
  }
  
?>