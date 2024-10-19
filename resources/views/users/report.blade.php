<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Violation Report Form</title>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Merriweather', serif;
            font-weight: bold;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow: hidden; 
        }

        .control-panel {
            height: 100vh;
            width: 300px; 
            position: fixed;
            top: 0;
            left: 0;
            background-color: #ADD8E6;
            padding-top: 60px; 
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow-y: hidden; 
        }

        .control-panel-header {
            display: flex;
            align-items: center;
            margin-bottom: 40px; 
        }

        .control-panel-header img {
            width: 50px; 
            height: 50px; 
            border-radius: 50%;
            margin-right: 15px;
        }

        .control-panel-header h2 {
            color: blue;
            font-weight: bold;
            font-size: 24px; 
            margin-top: 10px;
        }

        .control-panel a {
            width: 90%;
            margin: 15px 0; 
            padding: 10px; 
            text-decoration: none;
            font-size: 20px; 
            color: blue;
            border: 1px solid blue;
            display: flex;
            align-items: center;
            background-color: #fff;
            justify-content: flex-start;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .control-panel a i {
            margin-right: 15px; 
            color: blue;
            font-size: 20px; 
        }

        .control-panel a:hover {
            background-color: #ddd;
        }

        .container {
            margin-left: 260px; 
            padding: 20px;
            height: 100vh; 
            overflow-y: hidden; 
            margin-top: 60px; 
        }

        .card {
            max-width: 800px; 
            margin: auto; 
        }

        .form-control {
            width: calc(100% - 20px); 
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-primary {
        background-color: #FFA500; 
        color: #fff;
        padding: 8px 16px; 
        border: none;
        border-radius: 3px; 
        cursor: pointer;
        font-size: 16px; 
        }

        .btn-primary:hover {
            background-color: #FF8C00; 
        }


        .button-container {
            display: flex;
            justify-content: center; 
            align-items: center;
            margin-top: 0px; 
        }

        .control-panel .btn:hover {
            background-color: #0d6efd;
            color: white;
        }

        .control-panel .btn:hover i {
            color: white;
        }

        .control-panel .btn {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 90%;
            margin-bottom: 10px;
            background-color: white;
            color: #0d6efd;
            border: 1px solid #0d6efd;
            padding: 11px;
        }

        .control-panel .btn i {
            margin-right: 10px;
            color: #0d6efd;
            font-size: 20px; 
        }

        .thin-container {
            background-color: gray;
            height: 40px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            z-index: 1001;
        }

        h5, h2 {
            color: white;
        }
    </style>
</head>
<body>

    <div class="thin-container">
        <h5 class="container-text">Maritime Police Aparri</h5>
    </div>
   
    <div class="control-panel" id="controlPanel">
        <div class="control-panel-header">
            <img src="{{ asset('img/1.jpg') }}" alt="Logo"> 
            <h2>Maritime Panel</h2>
        </div>

        <a href="{{ route('dashboard') }}" class="btn">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
     
        <a href="{{ route('users.myreports') }}" class="btn">
            <i class="fas fa-file-alt"></i> Spot Reports
        </a>

        <a href="" class="btn">
            <i class="fas fa-file-contract"></i> Terms and Conditions
        </a>

        <a href="{{ route('profile.edit') }}" class="btn">
            <i class="fas fa-user"></i> Profile
        </a>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('reports.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nameofbanca">Name of Banca</label>
                                <input type="text" class="form-control" id="nameofbanca" name="nameofbanca">
                            </div>

                            <div class="mb-3">
                                <label for="nameofskipper">Name of Skipper</label>
                                <input type="text" class="form-control" id="nameofskipper" name="nameofskipper">
                            </div>

                            <div class="mb-3">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" name="age">
                            </div>

                            <div class="mb-3">
                                <label for="birthdate">Date of Birth</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate">
                            </div>

                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="" disabled selected>Choose here</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="educationalbackground">Educational Background</label>
                                <select class="form-control" id="educationalbackground" name="educationalbackground">
                                    <option value="" disabled selected>Choose here</option>
                                    <option value="Elementarygraduate">Elementary Graduate</option>
                                    <option value="Highschoolgraduate">High School Graduate</option>
                                    <option value="Shsgraduate">Senior High School Graduate</option>
                                    <option value="Collegegraduate">College Graduate</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="resident">Barangay</label>
                                <select class="form-control" id="resident" name="resident">
                                    <option value="" disabled selected>Choose here</option>
                                    <option value="Backiling">Backiling</option>
                                    <option value="Bangag">Bangag</option>
                                    <option value="Binalan">Binalan</option>
                                    <option value="Bisagu">Bisagu</option>
                                    <option value="Bukig">Bukig</option>
                                    <option value="Bulala Norte">Bulala Norte</option>
                                    <option value="Bulala Sur">Bulala Sur</option>
                                    <option value="Caagaman">Caagaman</option>
                                    <option value="Centro 1">Centro 1</option>
                                    <option value="Centro 2">Centro 2</option>
                                    <option value="Centro 3">Centro 3</option>
                                    <option value="Centro 4">Centro 4</option>
                                    <option value="Centro 5">Centro 5</option>
                                    <option value="Centro 6">Centro 6</option>
                                    <option value="Centro 7">Centro 7</option>
                                    <option value="Centro 8">Centro 8</option>
                                    <option value="Centro 9">Centro 9</option>
                                    <option value="Centro 10">Centro 10</option>
                                    <option value="Centro 11">Centro 11</option>
                                    <option value="Centro 12">Centro 12</option>
                                    <option value="Centro 13">Centro 13</option>
                                    <option value="Centro 14">Centro 14</option>
                                    <option value="Centro 15">Centro 15</option>
                                    <option value="Dodan">Dodan</option>
                                    <option value="Fuga Island">Fuga Island</option>
                                    <option value="Gaddang">Gaddang</option>
                                    <option value="Linao">Linao</option>
                                    <option value="Mabanguc">Mabanguc</option>
                                    <option value="Macanaya">Macanaya</option>
                                    <option value="Maura">Maura</option>
                                    <option value="Minanga">Minanga</option>
                                    <option value="Navagan">Navagan</option>
                                    <option value="Paddaya">Paddaya</option>
                                    <option value="Paruddub Norte">Paruddun Norte</option>
                                    <option value="Plaza">Plaza</option>
                                    <option value="Punta">Punta</option>
                                    <option value="Bangag">San Antonio</option>
                                    <option value="Sanja">Sanja</option>
                                    <option value="Tallungan">Tallungan</option>
                                    <option value="Toran">Toran</option>
                                    <option value="Zinarag">Zinarag</option>

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="violation">Violation</label>
                                <select class="form-control" id="violation" name="violation">
                                    <option value="" disabled selected>Choose here</option>
                                    <option value="Section 33 of Municipal Ordinance No. 2015-152">Section 33 of Aparri Municipal Ordinance No.2015-152 (Unauthorized Fishing Activities)</option>
                                    <option value="other"></option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="engine">Engine</label>
                                <input type="text" class="form-control" id="engine" name="engine">
                            </div>

                            <div class="mb-3">
                                <label for="engineno">Engine No.</label>
                                <input type="text" class="form-control" id="engineno" name="engineno">
                            </div>

                            <div class="mb-3">
                                <label for="gridcoordinate">Grid Coordinate</label>
                                <input type="text" class="form-control" id="gridcoordinate" name="gridcoordinate">
                            </div>

                            <div class="mb-3">
                                <label for="amount">Estimate Amount of Banca</label>
                                <input type="text" class="form-control" id="amount" name="amount">
                            </div>
                        </div>
                    </div>


                    <div class="button-container">
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
