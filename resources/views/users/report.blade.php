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
         
            
            font-weight: bold;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow: hidden; 
        }

        
        .container {
        margin-left: 260px;
        width: 100%; 
        max-width: 1000px; 
        height: auto;
        overflow-y: auto; 
        padding: 10px;
    }

        .card {
            max-width: 700px; 
            margin: auto; 
        }

        .form-control {
            width: calc(100% - 10px); 
            padding: 8px;
            margin-bottom: 8px;
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

        .toggle-button {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 1002;
            font-size: 20px;
            color: #333;
            background-color: lightgray;
            border: none;
            cursor: pointer;
        }

        /* Navigation panel styling */
        #controlPanel {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            background-color: lightgray;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        #controlPanel.hidden {
            transform: translateX(-100%); /* Hide the panel */
        }
        h5, h2 {
            color: white;
        }
    </style>
</head>
<body>

 <!-- Toggle Button -->
 <button class="toggle-button" onclick="togglePanel()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navigation Panel -->
    <div id="controlPanel">
        @include('layouts.Users.navigation')
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
                                <label for="birthdate">Date of Birth</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" oninput="calculateAge()">
                            </div>

                            <div class="mb-3">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" name="age" readonly>
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
                                <label for="religion">Religion</label>
                                <input type="text" class="form-control" id="religion" name="religion">
                            </div>



                            <div class="mb-3">
                                <label for="educationalbackground">Educational Background</label>
                                <select class="form-control" id="educationalbackground" name="educationalbackground">
                                    <option value="" disabled selected>Choose here</option>
                                    <option value="Elementary Level">Elementary Level</option>
                                    <option value="Jhs Level">Junior High School Level</option>
                                    <option value="Shs Level">Senior High School Level</option>
                                    <option value="College Level">College Level</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                        <div class="mb-3">
                                <label for="occupation">Occupation</label>
                                <input type="text" class="form-control" id="occupation" name="occupation">
                            </div>

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
                                    <option value="Section 33 of Municipal Ordinance No. 2015-151">Section 1 of Aparri Municipal Ordinance No. 2015-151 (Closed Season of Aramang Catching every September 1 to November 15 )</option>
                                    <!-- <option value="Section 33 of Municipal Ordinance No. 2015-152">Section 22 of Aparri Municipal Ordinance No. 2015-152 (Licensing of Municipal Fishing Activities )</option> -->
                                    <option value="Section 33 of Municipal Ordinance No. 2015-152">Section 33 of Aparri Municipal Ordinance No. 2015-152 (Unauthorized Fishing Activities)</option>
                                         <!-- <option value="other"></option> -->
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

    

    <script>
        function calculateAge() {
            var birthdate = document.getElementById('birthdate').value;
            var birthDate = new Date(birthdate);
            var today = new Date();
            var age = today.getFullYear() - birthDate.getFullYear();
            var month = today.getMonth() - birthDate.getMonth();
            if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            document.getElementById('age').value = age;
        }

        function togglePanel() {
            const panel = document.getElementById('controlPanel');
            const tableWrapper = document.getElementById('tableWrapper');
            panel.classList.toggle('hidden');
            
            if (panel.classList.contains('hidden')) {
                tableWrapper.style.marginLeft = 'auto';
                tableWrapper.style.marginRight = 'auto';
                tableWrapper.style.width = '80%';
            } else {
                tableWrapper.style.marginLeft = '250px';
                tableWrapper.style.marginRight = '10px';
                tableWrapper.style.width = 'calc(100% - 260px)';
            }
        }
    </script>

    <script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
