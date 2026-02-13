@extends('layouts.frontend')
@section('content')

<div class="notification-bar">
    @if($notifications->count() > 0)
        <ul>
            @foreach($notifications as $note)
                <li class="notification-item">
                    {{ $note->message }}
                    <span class="time">{{ $note->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <p>No new notifications</p>
    @endif
</div>  
    <li>
           <div class="notification-wrapper">
                                <div class="notification-icon" onclick="toggleNotifications(event)">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/>
                                    </svg>
                                    <span class="notification-badge" id="notification-count">4</span>
                                </div>
                                <div class="notification-dropdown" id="notification-dropdown">
                                    <div class="notification-dropdown-header">
                                        <h3>Notifications</h3>
                                        <button class="mark-all-read" onclick="markAllRead()">Mark all read</button>
                                    </div>
                                    <div class="notification-list">
                                        <div class="notification-list-item unread">
                                            <div class="notification-item-icon">👤</div>
                                            <div class="notification-item-content">
                                                <div class="notification-item-text">New user Sarah Miller registered today</div>
                                                <div class="notification-item-time">2 hours ago</div>
                                            </div>
                                        </div>
                                        <div class="notification-list-item unread">
                                            <div class="notification-item-icon">📝</div>
                                            <div class="notification-item-content">
                                                <div class="notification-item-text">5 users updated their profiles</div>
                                                <div class="notification-item-time">5 hours ago</div>
                                            </div>
                                        </div>
                                        <div class="notification-list-item unread">
                                            <div class="notification-item-icon">💾</div>
                                            <div class="notification-item-content">
                                                <div class="notification-item-text">System backup completed successfully</div>
                                                <div class="notification-item-time">1 day ago</div>
                                            </div>
                                        </div>
                                        <div class="notification-list-item unread">
                                            <div class="notification-item-icon">✨</div>
                                            <div class="notification-item-content">
                                                <div class="notification-item-text">New feature: Advanced search is now available</div>
                                                <div class="notification-item-time">2 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="notification-dropdown-footer">
                                        <a href="#" class="view-all-link">View all notifications</a>
                                    </div>
                                </div>
                            </div>
                            </li>

<div class="main-content">
    <div class="user-container">
        <div class="user-header">
            <h1>User Management</h1>
            <p>Manage and organize your user database</p>
        </div>

        <div class="controls">
            <div class="search-box">
                <input type="text" id="user-search" placeholder="Search users by name or email...">
            </div>
            <button class="add-btn">+ Add New User</button>
        </div>

        <div class="table-container">
            <table id="users">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Joined</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                <div class="user-cell">
                                    <div class="avatar">{{ substr($user->name, 0, 2) }}</div>
                                    <div class="user-info">
                                        <span class="user-name">{{ $user->name }}</span>
                                        <span class="user-email">{{ $user->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>Administrator</td>
                            <td>
                                <span class="badge {{ $user->status == 1 ? 'active' : ($user->status == 0 ? 'pending' : 'inactive') }}">
                                    @if ($user->status == 1)
                                        Active
                                    @elseif ($user->status == 0)
                                        Pending
                                    @else
                                        Suspended
                                    @endif
                                </span>
                            </td>
                            <td>{{ $user->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="actions">
                                    <button class="btn-edit">Edit</button>
                                    <button class="btn-delete">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="user-footer">
            <span class="showing-text">Showing {{ $users->count() }} users</span>
            {{-- Pagination example if you use paginate --}}
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
</div>

{{-- Live Search Script --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('user-search');
    searchInput.addEventListener('keyup', function () {
        const searchTerm = searchInput.value.toLowerCase();
        const tableRows = document.querySelectorAll('#users tbody tr');

        tableRows.forEach(row => {
            const userName = row.querySelector('.user-name').textContent.toLowerCase();
            const userEmail = row.querySelector('.user-email').textContent.toLowerCase();

            if (searchTerm === '' || userName.includes(searchTerm) || userEmail.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});
</script>

@endsection
