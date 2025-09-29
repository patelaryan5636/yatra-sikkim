<?php
    // **Validation: Check if any field is empty**
    if (empty($store_type) || empty($store_name) || empty($owner_name) || empty($owner_aadhar_number) || empty($owner_pan_number) || 
        empty($owner_mobile_number) || empty($owner_email) || empty($business_days) || empty($opening_time) || empty($closing_time)) {
        
        // Set error message and redirect back to form
        $_SESSION['Yatra_error_message'] = "All fields are required. Please fill in all fields.";
        header("Location: stallform");
        exit();
    }

    if (strlen($store_name) > 45) {
      $_SESSION['Yatra_error_message'] = "Store name cannot exceed 45 characters.";
      header("Location: stallform");
      exit();
    }

    if (strlen($owner_name) > 50) {
      $_SESSION['Yatra_error_message'] = "Owner name cannot exceed 50 characters.";
      header("Location: stallform");
      exit();
    }

    if (!preg_match('/^\d{12}$/', $owner_aadhar_number)) {
      $_SESSION['Yatra_error_message'] = "Aadhar number must be exactly 12 digits and contain only digits.";
      header("Location: stallform");
      exit();
    }

    if (!preg_match('/^\d{10}$/', $owner_mobile_number)) {
      $_SESSION['Yatra_error_message'] = "Mobile number must be exactly 10 digits.";
      header("Location: stallform");
      exit();
    }

    if (!preg_match('/^[A-Za-z]{5}\d{4}[A-Za-z]{1}$/', $owner_pan_number)) {
      $_SESSION['Yatra_error_message'] = "PAN number must be in the format: AAAAA9999A.";
      header("Location: stallform");
      exit();
    }

    if (!filter_var($owner_email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['Yatra_error_message'] = "Please enter a valid email address.";
      header("Location: stallform");
      exit();
    }

    if (empty($business_days)) {
      $_SESSION['Yatra_error_message'] = "Please select at least one business day.";
      header("Location: stallform");
      exit();
    }

    if (empty($opening_time) || empty($closing_time)) {
      $_SESSION['Yatra_error_message'] = "Both opening and closing times are required.";
      header("Location: stallform");
      exit();
    }  
  
?>