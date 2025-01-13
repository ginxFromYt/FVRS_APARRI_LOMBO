<style>
.control-panel-visible .container-content {
    margin-left: 200px;
}

.control-panel {
    position: fixed;
    left: -300px;
    top: 0;
    width: 250px;
    height: 100%;
    background-color: lightgray;
    padding: 20px;
    padding-top: 80px;
    box-shadow: rgba(0, 123, 255, 0.8) 0px 0px 10px;
    z-index: 1000;
    transition: left 0.3s ease;
   
}

.control-panel.visible {
    left: 0;
}

.control-panel-header img {
    width: 50px;
    height: 50px;
}
.control-panel a, .control-panel button {
    width: 90%;
    margin: 10px 0;
    padding: 5px;
    text-decoration: none;
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    border-radius: 3px;
    transition: background-color 0.3s;
    background-color: white;
    color: blue;
    border: 1px solid #0d6efd;
}

.control-panel a:hover, .control-panel button:hover {
    background-color: #0d6efd;
    color: white;
}

.control-panel .btn i {
    margin-right: 10px;
}

.control-panel-header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.control-panel-header img {
    border-radius: 50%;
    margin-right: 15px;
    width: 40px;
    height: 40px;
}

.control-panel-header h2 {
    margin: 0;
    font-family: 'Merriweather', serif;
    font-size: 20px;
    font-weight: bold;
    color: blue;
}
</style>

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

    <a href="{{ route('resolved.reports') }}" class="btn">
        <i class="fas fa-check-circle"></i> Resolved Reports
    </a>

    <a href="{{ route('cancelled.reports') }}" class="btn">
        <i class="fas fa-times-circle"></i> Cancelled Reports
    </a>

    <a href="{{ route('users.releases') }}" class="btn">
    <i class="fas fa-check-circle"></i> Release Paper
</a>

    <!-- <a href="{{ route('profile.edit') }}" class="btn">
        <i class="fas fa-user"></i> Profile
    </a> -->

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn">
            <i class="fas fa-sign-out-alt"></i> Log Out
        </button>
    </form>
</div>
