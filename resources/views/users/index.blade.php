<!-- component -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Admin Panel</title>


<body class="text-gray-800 font-inter">
@include('partials._side')
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">

    @include('partials._nav')


    <style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap");

/* Reset and global styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

:root {
    --main-blue: #71b7e6;
    --main-purple: #9b59b6;
    --main-grey: #ccc;
    --sub-grey: #d9d9d9;
}

body {
    display: flex;
    height: 100vh;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
    padding: 10px;
}

/* Flex table and container styles */
.double-flex-tables {
    display: flex;
    justify-content: space-between;
    width: 100%;
    padding: 10px;
}

.table-container {
    flex: 1;
    padding: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    background: #fff; /* Ensures consistency in background */
    border-radius: 5px; /* Rounded corners for the container */
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    text-align: left;
    padding: 8px;
    border-bottom: 1px solid #ccc;
}

th {
    background-color: #f4f4f4;
}

button {
    margin-bottom: 10px;
    padding: 8px 16px;
    cursor: pointer;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 4px;
}
button:hover {
    background-color: #0056b3;
}

/* Modal specific styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%; /* Adjust width for modal */
    border-radius: 5px; /* Rounded corners for modal */
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Form and input styling */
.container form .user__details, .container form .button {
    margin: 20px 0;
}

.user__details {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Adds space between the input boxes */
}

.user__details .input__box {
    flex: 1 1 100%; /* Ensures each input box can grow and shrink but starts full-width */
    margin-bottom: 15px; /* Maintains a bottom margin for spacing */
}

@media (min-width: 600px) {
    .user__details .input__box {
        flex: 1 1 48%; /* Adjusts to roughly half width on wider screens */
    }
}


.user__details .input__box input, .user__details .input__box .details {
    display: block;
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid var(--main-grey);
    transition: all 0.3s ease;
}

input[type="text"], input[type="date"], input[type="email"], input[type="tel"], input[type="password"] {
    outline: none;
}

input[type="text"]:focus, input[type="date"]:focus, input[type="email"]:focus, input[type="tel"]:focus, input[type="password"]:focus {
    border-color: var(--main-purple);
}

form .button input {
    color: #fff;
    border: none;
    background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
}

form .button input:hover {
    background: linear-gradient(-135deg, var(--main-blue), var(--main-purple));
}
</style>
</head>
<body>

<div class="double-flex-tables">
<div class="table-container">
    <button id="addEmployee">Add Clients</button>
    <!-- Employee Registration Form inside the Modal -->
    <div id="employeeModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="container">
            <div class="title">Client Registration</div>
            <form id="clientForm" action="{{ route('clients.store') }}" method="POST">
    @csrf <!-- CSRF Token for form security -->
    <div class="user__details">
        <div class="input__box">
            <span class="details">Name</span>
            <input type="text" id="name" name="name" placeholder="Enter client's name" required>
        </div>
        <div class="input__box">
            <span class="details">Address</span>
            <input type="text" id="address" name="address" placeholder="Enter client's address" required>
        </div>
        <div class="input__box">
            <span class="details">Contact Info</span>
            <input type="text" id="contact_info" name="contact_info" placeholder="E.g: 123-456-7890" required>
        </div>
        <div class="input__box">
            <span class="details">Email</span>
            <input type="email" id="email" name="email" placeholder="client@example.com" required>
        </div>
    </div>
    <div class="form-buttons">
        <div class="button">
            <input type="submit" value="Register">
        </div>
    </div>
</form>

            </div>
        </div>
    </div>

    <table id="clientTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Contact Info</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clients as $client)
        <tr>
            <td>{{ $client->name }}</td>
            <td>{{ $client->address }}</td>
            <td>{{ $client->contact_info }}</td>
            <td>{{ $client->email }}</td>
        </tr>
        @endforeach
        @if($clients->isEmpty())
        <tr>
            <td colspan="4">No clients found.</td>
        </tr>
        @endif
    </tbody>
</table>


</div>


    
    <div class="table-container">
    <button id="addTask">Make Schedule</button>
    <!-- Task Modal -->
    <div id="taskModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="container">
            <div class="title">Schedule Creation</div>
                
                <form id="scheduleForm" action="{{ route('schedules.store') }}" method="POST">
                    
                @csrf 
                    <div class="user__details">
                        
                    <!-- Assuming you are inside a form in a Blade template -->
                    <div class="input__box">
                        <span class="details">Employee ID</span>
                        <select id="employee_id" name="employee_id" required>
                            <option value="">Select Employee's ID</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>


                       <!-- Assuming you are inside a form in a Blade template -->
                    <div class="input__box">
                        <span class="details">Task ID</span>
                        <select id="task_id" name="task_id" required>
                            <option value="">Select Task ID</option>
                            @foreach ($tasks as $task)
                                <option value="{{ $task->id }}">{{ $task->title }}</option>
                            @endforeach
                        </select>
                    </div>


                        <div class="input__box">
                            <span class="details">Scheduled Date</span>
                            <input type="date" id="scheduled_date" name="scheduled_date" required>
                        </div>
                        <div class="input__box">
                            <span class="details">Start Time</span>
                            <input type="time" id="start_time" name="start_time" required>
                        </div>
                        <div class="input__box">
                            <span class="details">End Time</span>
                            <input type="time" id="end_time" name="end_time" required>
                        </div>
                    </div>
                    <div class="form-buttons">
                        <div class="button">
                            <input type="submit" value="Create Schedule">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table id="taskTable">
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Start Time</th>
            <th>End Time</th>
        </tr>
    </table>
</div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var employeeModal = document.getElementById('employeeModal');
        var taskModal = document.getElementById('taskModal');

        document.getElementById('addEmployee').onclick = function() {
            employeeModal.style.display = 'block';
        };

        document.getElementById('addTask').onclick = function() {
            taskModal.style.display = 'block';
        };

        document.querySelectorAll('.close').forEach(item => {
            item.onclick = function() {
                item.parentElement.parentElement.style.display = 'none';
            };
        });

        window.onclick = function(event) {
            if (event.target == employeeModal || event.target == taskModal) {
                employeeModal.style.display = 'none';
                taskModal.style.display = 'none';
            }
        };
    });

    // Implement functions to handle adding employees and tasks if needed
</script>


</main>


<script>
    function toggleModal() { document.getElementById('modal').classList.toggle('hidden')
    }
</script>

    <script>
        // start: Sidebar
        const sidebarToggle = document.querySelector('.sidebar-toggle')
        const sidebarOverlay = document.querySelector('.sidebar-overlay')
        const sidebarMenu = document.querySelector('.sidebar-menu')
        const main = document.querySelector('.main')
        sidebarToggle.addEventListener('click', function (e) {
            e.preventDefault()
            main.classList.toggle('active')
            sidebarOverlay.classList.toggle('hidden')
            sidebarMenu.classList.toggle('-translate-x-full')
        })
        sidebarOverlay.addEventListener('click', function (e) {
            e.preventDefault()
            main.classList.add('active')
            sidebarOverlay.classList.add('hidden')
            sidebarMenu.classList.add('-translate-x-full')
        })
        document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (item) {
            item.addEventListener('click', function (e) {
                e.preventDefault()
                const parent = item.closest('.group')
                if (parent.classList.contains('selected')) {
                    parent.classList.remove('selected')
                } else {
                    document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (i) {
                        i.closest('.group').classList.remove('selected')
                    })
                    parent.classList.add('selected')
                }
            })
        })
        // end: Sidebar



        // start: Popper
        const popperInstance = {}
        document.querySelectorAll('.dropdown').forEach(function (item, index) {
            const popperId = 'popper-' + index
            const toggle = item.querySelector('.dropdown-toggle')
            const menu = item.querySelector('.dropdown-menu')
            menu.dataset.popperId = popperId
            popperInstance[popperId] = Popper.createPopper(toggle, menu, {
                modifiers: [
                    {
                        name: 'offset',
                        options: {
                            offset: [0, 8],
                        },
                    },
                    {
                        name: 'preventOverflow',
                        options: {
                            padding: 24,
                        },
                    },
                ],
                placement: 'bottom-end'
            });
        })
        document.addEventListener('click', function (e) {
            const toggle = e.target.closest('.dropdown-toggle')
            const menu = e.target.closest('.dropdown-menu')
            if (toggle) {
                const menuEl = toggle.closest('.dropdown').querySelector('.dropdown-menu')
                const popperId = menuEl.dataset.popperId
                if (menuEl.classList.contains('hidden')) {
                    hideDropdown()
                    menuEl.classList.remove('hidden')
                    showPopper(popperId)
                } else {
                    menuEl.classList.add('hidden')
                    hidePopper(popperId)
                }
            } else if (!menu) {
                hideDropdown()
            }
        })

        function hideDropdown() {
            document.querySelectorAll('.dropdown-menu').forEach(function (item) {
                item.classList.add('hidden')
            })
        }
        function showPopper(popperId) {
            popperInstance[popperId].setOptions(function (options) {
                return {
                    ...options,
                    modifiers: [
                        ...options.modifiers,
                        { name: 'eventListeners', enabled: true },
                    ],
                }
            });
            popperInstance[popperId].update();
        }
        function hidePopper(popperId) {
            popperInstance[popperId].setOptions(function (options) {
                return {
                    ...options,
                    modifiers: [
                        ...options.modifiers,
                        { name: 'eventListeners', enabled: false },
                    ],
                }
            });
        }
        // end: Popper



        // start: Tab
        document.querySelectorAll('[data-tab]').forEach(function (item) {
            item.addEventListener('click', function (e) {
                e.preventDefault()
                const tab = item.dataset.tab
                const page = item.dataset.tabPage
                const target = document.querySelector('[data-tab-for="' + tab + '"][data-page="' + page + '"]')
                document.querySelectorAll('[data-tab="' + tab + '"]').forEach(function (i) {
                    i.classList.remove('active')
                })
                document.querySelectorAll('[data-tab-for="' + tab + '"]').forEach(function (i) {
                    i.classList.add('hidden')
                })
                item.classList.add('active')
                target.classList.remove('hidden')
            })
        })
        // end: Tab



        // start: Chart
        new Chart(document.getElementById('order-chart'), {
            type: 'line',
            data: {
                labels: generateNDays(7),
                datasets: [
                    {
                        label: 'Active',
                        data: generateRandomData(7),
                        borderWidth: 1,
                        fill: true,
                        pointBackgroundColor: 'rgb(59, 130, 246)',
                        borderColor: 'rgb(59, 130, 246)',
                        backgroundColor: 'rgb(59 130 246 / .05)',
                        tension: .2
                    },
                    {
                        label: 'Completed',
                        data: generateRandomData(7),
                        borderWidth: 1,
                        fill: true,
                        pointBackgroundColor: 'rgb(16, 185, 129)',
                        borderColor: 'rgb(16, 185, 129)',
                        backgroundColor: 'rgb(16 185 129 / .05)',
                        tension: .2
                    },
                    {
                        label: 'Canceled',
                        data: generateRandomData(7),
                        borderWidth: 1,
                        fill: true,
                        pointBackgroundColor: 'rgb(244, 63, 94)',
                        borderColor: 'rgb(244, 63, 94)',
                        backgroundColor: 'rgb(244 63 94 / .05)',
                        tension: .2
                    },
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        function generateNDays(n) {
            const data = []
            for(let i=0; i<n; i++) {
                const date = new Date()
                date.setDate(date.getDate()-i)
                data.push(date.toLocaleString('en-US', {
                    month: 'short',
                    day: 'numeric'
                }))
            }
            return data
        }
        function generateRandomData(n) {
            const data = []
            for(let i=0; i<n; i++) {
                data.push(Math.round(Math.random() * 10))
            }
            return data
        }
        // end: Chart

        
    </script>

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>