<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnover Receipt</title>
    <!-- Include Bootstrap CSS -->
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Turnover Receipt Form</h2>
        <form action="{{ route('turnover.store') }}" method="POST">
    @csrf
    <label for="municipal_agriculturist">Municipal Agriculturist</label>
    <input type="text" name="municipal_agriculturist" required>

    <label for="date_of_violation">Date of Violation</label>
    <input type="date" name="date_of_violation" required>

    <label for="time_of_violation">Time of Violation</label>
    <input type="time" name="time_of_violation" required>

    <label for="name_of_violation">Name of Violation</label>
    <select name="name_of_violation" required>
        <option value="Illegal Fishing">Illegal Fishing</option>
        <option value="Unauthorized Area">Unauthorized Area</option>
        <!-- Add more options as needed -->
    </select>

    <label for="name_of_skipper">Name of Skipper</label>
    <input type="text" name="name_of_skipper" value="{{ $report->nameofskipper }}" required>

    <label for="name_of_banca">Name of Banca</label>
    <input type="text" name="name_of_banca" value="{{ $report->nameofbanca }}" required>

    <label for="investigator_pnco">Investigator PNCO</label>
    <input type="text" name="investigator_pnco" required>

    <button type="submit">Submit Turnover Receipt</button>
</form>

    </div>

    <!-- Include Bootstrap JS -->
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>
</html>
