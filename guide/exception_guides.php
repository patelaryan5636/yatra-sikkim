<?php 
        // Validate that all fields are filled
        if (empty($full_name) || empty($gender) || empty($address) || empty($nationality) || empty($aadhar_card_number) || empty($pan_card_number) || 
        empty($mobile_number) || empty($guide_license_number) || empty($experience) || empty($birth_date) || empty($solo_tour_fee) || 
        empty($group_tour_fee) || empty($vip_tour_fee) || empty($preferred_time) || empty($available_days)) {
        
        // Set the error message in the session
        $_SESSION['Yatra_error_message'] = "All fields are required. Please fill in all fields.";

        // Redirect back to the form page
        header("Location: guide_form");
        exit();
    }

    // Check if mobile_number and alternative_mobile are the same
    if ($mobile_number === $alternative_mobile) {
        // Set the error message in the session
        $_SESSION['Yatra_error_message'] = "Mobile number and alternative mobile number cannot be the same.";

        // Redirect back to the form page
        header("Location: guide_form");
        exit();
    }

    // Check if full_name exceeds 40 characters
    if (strlen($full_name) > 40) {
        // Set the error message in the session
        $_SESSION['Yatra_error_message'] = "Full name cannot exceed 40 characters.";

        // Redirect back to the form page
        header("Location: guide_form");
        exit();
    }

    // Check if aadhar_card_number is not exactly 12 digits or contains non-numeric characters
    if (!preg_match('/^\d{12}$/', $aadhar_card_number)) {
        // Set the error message in the session
        $_SESSION['Yatra_error_message'] = "Aadhar card number must be exactly 12 digits and contain only numbers.";

        // Redirect back to the form page
        header("Location: guide_form");
        exit();
    }
    
    // Convert PAN card number to uppercase
      $pan_card_number = strtoupper($pan_card_number);

      // Check if pan_card_number matches the PAN format
      if (!preg_match('/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/', $pan_card_number)) {
          // Set the error message in the session
          $_SESSION['Yatra_error_message'] = "Your PAN card number is not valid. Please check and try again.";

          // Redirect back to the form page
          header("Location: guide_form");
          exit();
      }

        // Check if guide_license_number is between 6 and 15 characters and contains only alphanumeric characters
      if (!preg_match('/^[A-Za-z0-9]{6,15}$/', $guide_license_number)) {
        // Set the error message in the session
        $_SESSION['Yatra_error_message'] = "Your guide license number is not valid. It should be between 6 to 15 alphanumeric characters.";

        // Redirect back to the form page
        header("Location: guide_form");
        exit();
      }

      // Check if no available days are selected
      if (empty($available_days)) {
        // Set the error message in the session
        $_SESSION['Yatra_error_message'] = "Please select at least one available day.";

        // Redirect back to the form page
        header("Location: guide_form");
        exit();
      }

      // Check if solo tour fee, group tour fee, or VIP tour fee exceeds 5 digits
      if (strlen($solo_tour_fee) > 5 || strlen($group_tour_fee) > 5 || strlen($vip_tour_fee) > 5) {
        $_SESSION['Yatra_error_message'] = "Tour fees must be 5 digits or less.";

        // Redirect back to the form page
        header("Location: guide_form");
        exit();
      }

      // Check if any of the required files are not uploaded
      // if (empty($aadhar_card_document) || empty($pan_card_document) || empty($passport_photo) || empty($training_certifications)) {
      //   $_SESSION['Yatra_error_message'] = "Please upload all required documents (Aadhar card, PAN card, passport photo, and training certifications).";

      //   // Redirect back to the form page
      //   header("Location: guide_form");
      //   exit();
      // }

     
?>