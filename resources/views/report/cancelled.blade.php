<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancelled Reports</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Cancelled Reports</h1>

    <div id="success-message" class="alert alert-success" style="display: none;"></div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Information</th>
                <th>Photo</th>
                <th>Cancelled At</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Row -->
            <tr>
                <td>2</td>
                <td>Jane Smith</td>
                <td>456 Elm St, City</td>
                <td>555-5678</td>
                <td>Report details here...</td>
                <td>
                    <img src="path/to/photo.jpg" alt="Report Photo" style="width: 100px; height: auto;">
                </td>
                <td>2024-10-19 11:00 AM</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>

<script>
    // Example of how to show a success message
    function showSuccessMessage(message) {
        var successMessage = document.getElementById('success-message');
        successMessage.textContent = message;
        successMessage.style.display = 'block';
    }

    // Call this function where appropriate
    // showSuccessMessage('Report cancelled successfully!');
</script>
</body>
</html>
