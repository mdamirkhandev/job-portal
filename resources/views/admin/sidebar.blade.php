<div class="card account-nav border-0 shadow mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush ">
            <li class="list-group-item d-flex justify-content-between p-3">
                <a href="{{ route('account.profile') }}">User's</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('jobs.create') }}">Job's</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('jobs.index') }}">Applications</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center bg-danger p-3">
                <a href="{{ route('account.logout') }}" class=" text-white">Logout</a>
            </li>
        </ul>
    </div>
</div>
