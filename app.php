<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
</head>
<body>
    <h2>User Information Form</h2>
    <form id="userForm">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="First_Name" required><br><br>
        
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="Last_Name" required><br><br>
        
        <label for="age">Age:</label>
        <input type="number" id="age" name="Age" required><br><br>
        
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="DOB" required><br><br>
        
        <label for="gender">Gender:</label>
        <select id="gender" name="Gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br><br>
        
        <button type="submit">Submit</button>
    </form>

    <script>
        document.getElementById("userForm").addEventListener("submit", function(event) {
            event.preventDefault();
            
            // Collect form data
            const formData = new FormData(this);
            
            // Convert form data to JSON object
            const jsonData = {};
            formData.forEach((value, key) => {
                jsonData[key] = value;
            });

            // Send data to the API endpoint using fetch
            fetch('endpoint.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(jsonData),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                alert(data.message); // Display success or error message
                // You can redirect the user to another page here if needed
            })
            .catch((error) => {
                console.error('Error:', error);
                alert('An error occurred. Please try again later.');
            });
        });
    </script>
</body>
</html>
