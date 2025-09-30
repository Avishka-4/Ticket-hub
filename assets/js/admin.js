// Admin Dashboard JavaScript
let currentSection = 'dashboard';

// Load different sections
function loadSection(section) {
    currentSection = section;
    
    // Update active nav link
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('active');
    });
    document.querySelector(`[href="#${section}"]`).classList.add('active');
    
    // Load section content
    const contentArea = document.getElementById('content-area');
    
    switch(section) {
        case 'users':
            loadUsersSection();
            break;
        case 'bookings':
            loadBookingsSection();
            break;
        case 'events':
            loadEventsSection();
            break;
        case 'movies':
            loadMoviesSection();
            break;
        case 'sports':
            loadSportsSection();
            break;
        case 'leisure':
            loadLeisureSection();
            break;
        case 'food':
            loadFoodSection();
            break;
        case 'tours':
            loadToursSection();
            break;
        default:
            // Dashboard is already loaded
            break;
    }
}

// Load Users Management Section
function loadUsersSection() {
    const content = `
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>User Management</h2>
            <button class="btn btn-primary" onclick="showAddUserModal()">
                <i class="fas fa-user-plus me-2"></i>Add New User
            </button>
        </div>
        
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="usersTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Registered</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="usersTableBody">
                            <tr>
                                <td colspan="6" class="text-center">Loading users...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    `;
    
    document.getElementById('content-area').innerHTML = content;
    fetchUsers();
}

// Load Events Management Section
function loadEventsSection() {
    const content = `
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Events Management</h2>
            <button class="btn btn-primary" onclick="showAddItemModal('event')">
                <i class="fas fa-plus me-2"></i>Add New Event
            </button>
        </div>
        
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">All Events</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="eventsTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="eventsTableBody">
                            <tr>
                                <td colspan="7" class="text-center">Loading events...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    `;
    
    document.getElementById('content-area').innerHTML = content;
    fetchEvents();
}

// Load Bookings Management Section
function loadBookingsSection() {
    const content = `
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Bookings Management</h2>
            <div class="btn-group">
                <button class="btn btn-outline-secondary" onclick="filterBookings('all')">All</button>
                <button class="btn btn-outline-success" onclick="filterBookings('confirmed')">Confirmed</button>
                <button class="btn btn-outline-warning" onclick="filterBookings('pending')">Pending</button>
                <button class="btn btn-outline-danger" onclick="filterBookings('cancelled')">Cancelled</button>
            </div>
        </div>
        
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">All Bookings</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="bookingsTable">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Customer</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Seats</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="bookingsTableBody">
                            <tr>
                                <td colspan="8" class="text-center">Loading bookings...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    `;
    
    document.getElementById('content-area').innerHTML = content;
    fetchBookings();
}

// Show Add Item Modal
function showAddItemModal(type) {
    const modal = new bootstrap.Modal(document.getElementById('addItemModal'));
    const modalTitle = document.getElementById('addItemModalTitle');
    const modalBody = document.getElementById('addItemModalBody');
    
    modalTitle.textContent = `Add New ${type.charAt(0).toUpperCase() + type.slice(1)}`;
    
    let formHTML = '';
    
    switch(type) {
        case 'event':
            formHTML = getEventForm();
            break;
        case 'movie':
            formHTML = getMovieForm();
            break;
        case 'sport':
            formHTML = getSportForm();
            break;
        case 'leisure':
            formHTML = getLeisureForm();
            break;
        case 'food':
            formHTML = getFoodForm();
            break;
        case 'tour':
            formHTML = getTourForm();
            break;
    }
    
    modalBody.innerHTML = formHTML;
    modal.show();
}

// Get Event Form
function getEventForm() {
    return `
        <form id="addEventForm" onsubmit="submitItem(event, 'event')">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Event Title *</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Category *</label>
                    <select class="form-select" name="category" required>
                        <option value="">Select Category</option>
                        <option value="concert">Concert</option>
                        <option value="festival">Festival</option>
                        <option value="conference">Conference</option>
                        <option value="workshop">Workshop</option>
                        <option value="comedy">Comedy Show</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Date *</label>
                    <input type="date" class="form-control" name="date" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Time *</label>
                    <input type="time" class="form-control" name="time" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Price ($) *</label>
                    <input type="number" class="form-control" name="price" step="0.01" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Venue *</label>
                    <input type="text" class="form-control" name="venue" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Description *</label>
                <textarea class="form-control" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Image URL</label>
                <input type="url" class="form-control" name="image">
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add Event</button>
            </div>
        </form>
    `;
}

// Get Movie Form
function getMovieForm() {
    return `
        <form id="addMovieForm" onsubmit="submitItem(event, 'movie')">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Movie Title *</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Genre *</label>
                    <select class="form-select" name="genre" required>
                        <option value="">Select Genre</option>
                        <option value="action">Action</option>
                        <option value="comedy">Comedy</option>
                        <option value="drama">Drama</option>
                        <option value="horror">Horror</option>
                        <option value="romance">Romance</option>
                        <option value="sci-fi">Sci-Fi</option>
                        <option value="thriller">Thriller</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Duration (minutes) *</label>
                    <input type="number" class="form-control" name="duration" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Rating *</label>
                    <select class="form-select" name="rating" required>
                        <option value="G">G</option>
                        <option value="PG">PG</option>
                        <option value="PG-13">PG-13</option>
                        <option value="R">R</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Price ($) *</label>
                    <input type="number" class="form-control" name="price" step="0.01" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Description *</label>
                <textarea class="form-control" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Poster Image URL</label>
                <input type="url" class="form-control" name="image">
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add Movie</button>
            </div>
        </form>
    `;
}

// Submit Item Function
function submitItem(event, type) {
    event.preventDefault();
    
    const form = event.target;
    const formData = new FormData(form);
    const data = Object.fromEntries(formData);
    
    // Add item type
    data.type = type;
    
    // Simulate API call
    console.log('Adding new item:', data);
    
    // Show success message
    alert(`${type.charAt(0).toUpperCase() + type.slice(1)} added successfully!`);
    
    // Close modal
    bootstrap.Modal.getInstance(document.getElementById('addItemModal')).hide();
    
    // Refresh current section
    if (currentSection === type + 's' || (type === 'tour' && currentSection === 'tours')) {
        loadSection(currentSection);
    }
}

// Fetch Users (Mock data)
function fetchUsers() {
    const mockUsers = [
        { id: 1, name: 'John Doe', email: 'john@example.com', phone: '+1-555-0123', registered: '2024-01-15' },
        { id: 2, name: 'Jane Smith', email: 'jane@example.com', phone: '+1-555-0456', registered: '2024-01-20' },
        { id: 3, name: 'Mike Johnson', email: 'mike@example.com', phone: '+1-555-0789', registered: '2024-02-01' }
    ];
    
    let tableHTML = '';
    mockUsers.forEach(user => {
        tableHTML += `
            <tr>
                <td>${user.id}</td>
                <td>${user.name}</td>
                <td>${user.email}</td>
                <td>${user.phone}</td>
                <td>${new Date(user.registered).toLocaleDateString()}</td>
                <td>
                    <button class="btn btn-sm btn-primary me-1" onclick="editUser(${user.id})">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" onclick="deleteUser(${user.id})">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
    });
    
    document.getElementById('usersTableBody').innerHTML = tableHTML;
}

// Fetch Events (Mock data)
function fetchEvents() {
    const mockEvents = [
        { id: 1, title: 'Summer Music Festival', category: 'Festival', date: '2024-07-15', price: 89.99, status: 'Active' },
        { id: 2, title: 'Tech Conference 2024', category: 'Conference', date: '2024-06-20', price: 299.00, status: 'Active' },
        { id: 3, title: 'Comedy Night Live', category: 'Comedy', date: '2024-05-30', price: 45.00, status: 'Sold Out' }
    ];
    
    let tableHTML = '';
    mockEvents.forEach(event => {
        tableHTML += `
            <tr>
                <td>${event.id}</td>
                <td>${event.title}</td>
                <td><span class="badge bg-info">${event.category}</span></td>
                <td>${new Date(event.date).toLocaleDateString()}</td>
                <td>$${event.price}</td>
                <td><span class="badge bg-${event.status === 'Active' ? 'success' : 'warning'}">${event.status}</span></td>
                <td>
                    <button class="btn btn-sm btn-primary me-1" onclick="editEvent(${event.id})">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" onclick="deleteEvent(${event.id})">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
    });
    
    document.getElementById('eventsTableBody').innerHTML = tableHTML;
}

// Fetch Bookings (Mock data)
function fetchBookings() {
    const mockBookings = [
        { 
            id: 'TB001', 
            customer: 'John Doe', 
            type: 'Event', 
            date: '2024-07-15', 
            seats: 2, 
            amount: 179.98, 
            status: 'Confirmed' 
        },
        { 
            id: 'TB002', 
            customer: 'Jane Smith', 
            type: 'Movie', 
            date: '2024-05-30', 
            seats: 4, 
            amount: 68.00, 
            status: 'Pending' 
        }
    ];
    
    let tableHTML = '';
    mockBookings.forEach(booking => {
        tableHTML += `
            <tr>
                <td>${booking.id}</td>
                <td>${booking.customer}</td>
                <td><span class="badge bg-info">${booking.type}</span></td>
                <td>${new Date(booking.date).toLocaleDateString()}</td>
                <td>${booking.seats}</td>
                <td>$${booking.amount.toFixed(2)}</td>
                <td><span class="badge bg-${booking.status === 'Confirmed' ? 'success' : 'warning'}">${booking.status}</span></td>
                <td>
                    <button class="btn btn-sm btn-primary me-1" onclick="viewBooking('${booking.id}')">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" onclick="cancelBooking('${booking.id}')">
                        <i class="fas fa-times"></i>
                    </button>
                </td>
            </tr>
        `;
    });
    
    document.getElementById('bookingsTableBody').innerHTML = tableHTML;
}

// Additional functions for other sections
function loadMoviesSection() {
    // Similar to loadEventsSection but for movies
    console.log('Loading movies section...');
}

function loadSportsSection() {
    console.log('Loading sports section...');
}

function loadLeisureSection() {
    console.log('Loading leisure section...');
}

function loadFoodSection() {
    console.log('Loading food section...');
}

function loadToursSection() {
    console.log('Loading tours section...');
}

// Utility functions
function editUser(userId) {
    alert(`Edit user ${userId}`);
}

function deleteUser(userId) {
    if (confirm('Are you sure you want to delete this user?')) {
        alert(`User ${userId} deleted`);
        fetchUsers();
    }
}

function editEvent(eventId) {
    alert(`Edit event ${eventId}`);
}

function deleteEvent(eventId) {
    if (confirm('Are you sure you want to delete this event?')) {
        alert(`Event ${eventId} deleted`);
        fetchEvents();
    }
}

function viewBooking(bookingId) {
    alert(`View booking details for ${bookingId}`);
}

function cancelBooking(bookingId) {
    if (confirm('Are you sure you want to cancel this booking?')) {
        alert(`Booking ${bookingId} cancelled`);
        fetchBookings();
    }
}

function filterBookings(status) {
    console.log(`Filtering bookings by status: ${status}`);
    // Implement filtering logic
}

// Initialize dashboard
document.addEventListener('DOMContentLoaded', function() {
    console.log('Admin dashboard loaded');
});