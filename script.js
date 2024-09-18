    function loginWithGoogle() {
        window.location.href = "google_login.php";
    }

    function loginWithGithub() {
        window.location.href = "github_login.php";
    }

    function handleNextButton() {
        const email = document.getElementById('email').value.trim();
        
        // Validate email input
        if (email === '') {
            alert('Please enter a valid email address.');
            return;
        }

        // Send OTP request to the server
        fetch('send_otp.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'email': email
            })
        })
        .then(response => response.text())
        .then(result => {
            // Show the OTP field and hide the email section if OTP was sent successfully
            if (result.includes('OTP sent successfully')) {
                showOtpField();
            } else {
                alert('Failed to send OTP: ' + result);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    function showOtpField() {
        // Hide the email section and show the OTP section
        document.getElementById('emailSection').classList.add('hidden');
        document.getElementById('otpSection').classList.remove('hidden');
        document.getElementById('socialLogin').classList.add('hidden');
        document.getElementById('actionButton').value = 'Login';
    }

    function handleOtpSubmit(event) {
        event.preventDefault(); // Prevent the default form submission

        const email = document.getElementById('email').value.trim();
        const otp = document.getElementById('otp').value.trim();

        // Validate OTP input
        if (otp === '') {
            alert('Please enter the OTP.');
            return;
        }

        // Send OTP verification request to the server
        fetch('verify_otp.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'email': email,
                'otp': otp
            })
        })
        .then(response => response.text())
        .then(result => {
            if (result.includes('OTP verified successfully')) {
                // Redirect or perform any action after successful verification
                alert('Login successful');
                window.location.href = 'success_page.php'; // Change to your actual redirect page
            } else {
                alert('Failed to verify OTP: ' + result);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    // Add an event listener to handle the form submission
    document.getElementById('loginForm').addEventListener('submit', handleOtpSubmit);
