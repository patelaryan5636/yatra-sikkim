<?php

        // **Simple Validation: Check if any field is empty**
        if (empty($hotel_name) || empty($owner_name) || empty($num_rooms) || empty($contact_number) || empty($email) || 
            empty($hotel_address) || empty($license_number) || empty($owner_aadhar) || empty($owner_pan) || 
            empty($room_types) || empty($facilities) || empty($single_room_price) || empty($couple_room_price) || 
            empty($ac_room_price) || empty($vip_room_price) || empty($luxury_room_price) || empty($deluxe_room_price)) {  // Ensure at least one hotel image is uploaded

            // Set the error message in the session
            $_SESSION['Yatra_error_message'] = "All fields are required. Please fill in all fields.";

            // Redirect back to the form page
            header("Location: hotelform");
            exit();
        }

        if (strlen($hotel_name) > 50) {
          $_SESSION['Yatra_error_message'] = "Hotel name must not exceed 50 characters.";
          header("Location: hotelform");
          exit();
        }

        if ($num_rooms <= 0) {
          $_SESSION['Yatra_error_message'] = "Number of rooms must be greater than 0.";
          header("Location: hotelform");
          exit();
        }

        if (strlen($contact_number) !== 10 || !ctype_digit($contact_number)) {
          $_SESSION['Yatra_error_message'] = "Contact number must be exactly 10 digits.";
          header("Location: hotelform");
          exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $_SESSION['Yatra_error_message'] = "Please enter a valid email address.";
          header("Location: hotelform");
          exit();
        }

        // Validate that the hotel license number is alphanumeric and has a length between 6 and 15 characters
        if (!preg_match("/^[a-zA-Z0-9]{6,15}$/", $license_number)) {
          $_SESSION['Yatra_error_message'] = "Hotel license number must be alphanumeric and between 6 to 15 characters.";
          header("Location: hotelform");
          exit();
        }

        // Validate that the Aadhar card number is exactly 12 digits and contains only digits
        if (!preg_match("/^\d{12}$/", $owner_aadhar)) {
          $_SESSION['Yatra_error_message'] = "Aadhar card number must be exactly 12 digits.";
          header("Location: hotelform");
          exit();
        }

        // Validate that the PAN number format is valid (First 5 characters are letters, next 4 are digits, and last one is a letter)
        if (!preg_match("/^[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}$/", $owner_pan)) {
          $_SESSION['Yatra_error_message'] = "PAN number must be in the format: XXXXX1234X (first 5 characters are letters, next 4 digits, and last letter).";
          header("Location: hotelform");
          exit();
        } else {
          // If the PAN number is in valid format, convert the last character to uppercase
          $owner_pan = strtoupper($owner_pan);
        }

        // Validate that at least one room type is selected
        if (empty($room_types)) {
          $_SESSION['Yatra_error_message'] = "At least one room type must be selected.";
          header("Location: hotelform");
          exit();
        }

        // Validate that at least one facility is selected
        if (empty($facilities)) {
          $_SESSION['Yatra_error_message'] = "At least one facility must be selected.";
          header("Location: hotelform");
          exit();
        }

        // Validate that the room prices are not more than 5 digits
        if (strlen($single_room_price) > 5 || strlen($couple_room_price) > 5 || 
        strlen($ac_room_price) > 5 || strlen($vip_room_price) > 5 || 
        strlen($luxury_room_price) > 5 || strlen($deluxe_room_price) > 5) {

        $_SESSION['Yatra_error_message'] = "Room prices should not exceed 5 digits.";
        header("Location: hotelform");
        exit();
        }

?>