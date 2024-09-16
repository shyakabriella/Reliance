<!--sidenav-->
<div class="fixed left-0 top-0 w-64 h-full bg-[#9AC8CD] p-4 z-50 sidebar-menu transition-transform">
    <a href="{{ route('home') }}" class="flex items-center pb-4 border-b border-b-gray-800">
        <h2 class="font-bold text-2xl">Reliance <span class="bg-[#f84525] text-white px-2 rounded-md">Cleaning</span></h2>
    </a>

    <ul class="mt-4">
        <!-- Admin and Scheduler Section -->
        @if(Auth::user()->hasAnyRole(['Admin', 'Scheduler']))
        <span class="text-gray-400 font-bold">ADMIN & SCHEDULER</span>
        <li class="mb-1 group">
            <a href="{{ route('admin.dashboard') }}" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-home-2-line mr-3 text-lg"></i>
                <span class="text-sm">Dashboard</span>
            </a>
        </li>
        @if(Auth::user()->hasRole('Admin'))  
        <li class="mb-1 group">
            <a href="{{ route('users.index') }}" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='bx bx-user mr-3 text-lg'></i>
                <span class="text-sm">Clients</span>
            </a>
        </li>
        @endif
        <li class="mb-1 group">
            <a href="{{ route('tasks.index') }}" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='bx bx-list-ul mr-3 text-lg'></i>
                <span class="text-sm">Tasks</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="{{ route('schedules.index') }}" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='bx bx-calendar-event mr-3 text-lg'></i>
                <span class="text-sm">Schedules</span>
            </a>
        </li>

        
        <li class="mb-1 group">
            <a href="{{ route('reports.index') }}" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='bx bx-chart mr-3 text-lg'></i>
                <span class="text-sm">Reports</span>
            </a>
        </li>
        @endif

        <!-- Cleaner Specific Links -->
        @if(Auth::user()->hasRole('Cleaner'))
        <span class="text-gray-400 font-bold">CLEANER</span>
        <li class="mb-1 group">
            <a href="{{ route('tasks.mytasks') }}" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='bx bx-task mr-3 text-lg'></i>
                <span class="text-sm">My Tasks</span>
            </a>
        </li>
        @endif

        <!-- Client Specific Links -->
        @if(Auth::user()->hasRole('Client'))
        <span class="text-gray-400 font-bold">CLIENT</span>
        <li class="mb-1 group">
            <a href="#" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='bx bx-file mr-3 text-lg'></i>
                <span class="text-sm">View Services</span> <!-- Adjust as needed -->
            </a>
        </li>
        @endif

        <!-- More roles and links can be added here -->
    </ul>
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<!-- end sidenav -->
