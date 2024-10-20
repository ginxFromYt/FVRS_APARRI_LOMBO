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
        <i class="fas fa-check-circle"></i> Resolved Reports
    </a>

    <a href="{{ route('cancelled.reports') }}" class="btn">
        <i class="fas fa-times-circle"></i> Cancelled Reports
    </a>

    <a href="" class="btn">
        <i class="fas fa-file-contract"></i> Terms and Conditions
    </a>

    <a href="{{ route('profile.edit') }}" class="btn">
        <i class="fas fa-user"></i> Profile
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">
            <i class="fas fa-sign-out-alt"></i> Log Out
        </button>
    </form>
</div>
