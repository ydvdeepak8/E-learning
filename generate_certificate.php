<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the GD library functions are available
    if (!function_exists('imagecreatefrompng')) {
        die('GD library is not available. Please enable GD in your PHP configuration.');
    }

    // Check if both 'name' and 'course' are set and not empty
    if (isset($_POST['name']) && !empty(trim($_POST['name']))) {
        // Load the PNG image
        $imagePath = "Golden Elegant Certificate of Appreciation.png"; // Updated with the correct path
        if (!file_exists($imagePath)) {
            die("Image file not found: $imagePath");
        }
        $image = imagecreatefrompng($imagePath);

        // Allocate a color for the text
        $color = imagecolorallocate($image, 19, 21, 22);

        // Define the path to your font file
        $fontPath = 'LBRITED.TTF'; // Update this to the path of your font file
        if (!file_exists($fontPath)) {
            die("Font file not found: $fontPath");
        }

        // Split the name into first and last name
        $name = $_POST['name'];


        imagettftext($image, 50, 0, 750, 830, $color, $fontPath, $name); // Adjusted coordinates


        imagettftext($image, 30, 0, 1275, 965, $color, $fontPath, $name); // Adjusted coordinates

        // Add the course name after the second name in the bottom text
      /*$courseText = "{$_POST['course']}";
        imagettftext($image, 30, 0, 800, 1050, $color, $fontPath, $courseText); // Adjusted coordinates*/

        // Generate a unique filename for the JPEG output
        $file = 'certificate_' . time() . '.jpg';

        // Output the image as a JPEG file
        imagejpeg($image, $file);

        // Free up memory
        imagedestroy($image);

        // Provide a download link to the user
        echo "Certificate generated successfully. <a href='$file'>Download it here</a>";
    } else {
        echo "Please provide both name and course.";
    }
} else {
    echo "Invalid request method.";
}
?>