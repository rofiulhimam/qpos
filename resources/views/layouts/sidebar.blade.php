<sidebar class="sidebar">
    <div class="sidebar-top">
        <a href="#" class="menu-toggle" data-target="point-of-sale-dropdown">
            <div class="menu-sidebar {{ request()->is('pos') ? 'selected' : '' }}" id="point-of-sale">
                <img class="menu-icon" alt="" src="{{ asset('assets/image/cart.svg') }}" />
                <div class="menu-text">Point Of Sale</div>
                <img class="icon-tabler-icons-chevron-" alt="" src="{{ asset('assets/image/chevron-right.svg') }}" />
            </div>
        </a>
        <div class="dropdown" id="point-of-sale-dropdown" style="display: {{ request()->is('pos') ? 'show' : 'none' }};">
            <div class="dropdown-content">
                <a href="{{ route('pos') }}" class="dropdown-item">All</a>
                <a href="{{ route('pos') }}" class="dropdown-item">Coffee</a>
                <a href="{{ route('pos') }}" class="dropdown-item">Noncoffee</a>
                <a href="{{ route('pos') }}" class="dropdown-item">Mojito</a>
                <a href="{{ route('pos') }}" class="dropdown-item">Pastry & Snack</a>
            </div>
        </div>
        {{-- <a href="#" class="menu-toggle" data-target="transaksi-dropdown">
            <div class="menu-sidebar {{ request()->is('transaksi') ? 'selected' : '' }}">
                <img class="menu-icon" alt="" src="{{ asset('assets/image/document-f.svg') }}" />
                <div class="menu-text" id="button-menu-selected">Transaksi</div>
                <img class="icon-tabler-icons-chevron-" alt="" src="{{ asset('assets/image/chevron-right.svg') }}" />
            </div>
        </a> --}}
        {{-- <div class="dropdown" id="transaksi-dropdown" style="display: {{ request()->is('transaksi') ? 'show' : 'none' }};">
            <div class="dropdown-content">
                <a href="{{ route('transaksi') }}" class="dropdown-item">Hari ini</a>
                <a href="{{ route('transaksi') }}" class="dropdown-item">Kemarin</a>
                <a href="{{ route('transaksi') }}" class="dropdown-item">Bulan ini</a>
                <a href="{{ route('transaksi') }}" class="dropdown-item">Bulan lalu</a>
            </div>
        </div> --}}
        <a href="{{ route('transaksi')}}">
            <div class="menu-sidebar {{ request()->is('transaksi') ? 'selected' : '' }}">
                <img class="menu-icon" alt="" src="{{ asset('assets/image/document-f.svg') }}" />
                <div class="menu-text">Transaksi</div>
            </div>
        </a>
        <a href="{{ route('keuangan') }}">
            <div class="menu-sidebar {{ request()->is('keuangan') ? 'selected' : '' }}">
                <img class="menu-icon" alt="" src="{{ asset('assets/image/currency-dollar.svg') }}" />
                <div class="menu-text">Keuangan</div>
            </div>
        </a>
        <a href="{{ route('penjualan') }}">
            <div class="menu-sidebar {{ request()->is('penjualan') ? 'selected' : '' }}">
                <img class="menu-icon" alt="" src="{{ asset('assets/image/bag.svg') }}" />
                <div class="menu-text">Penjualan</div>
            </div>
        </a>
        @if (Auth::user()->role === 'Admin')
        <a href="{{ route('inventori') }}">
            <div class="menu-sidebar {{ request()->is('inventori') ? 'selected' : '' }}">
                <img class="menu-icon" alt="" src="{{ asset('assets/image/Box.svg') }}" />
                <div class="menu-text">Inventori</div>
            </div>
        </a>
        <a href="{{ route('kategori') }}">
            <div class="menu-sidebar {{ request()->is('kategori') ? 'selected' : '' }}">
                <img class="menu-icon" alt="" src="{{ asset('assets/image/category.svg') }}" />
                <div class="menu-text">Kategori</div>
            </div>
        </a>
        <a href="{{ route('staff') }}">
            <div class="menu-sidebar {{ request()->is('staff') ? 'selected' : '' }}">
                <img class="menu-icon" alt="" src="{{ asset('assets/image/staff.svg') }}" />
                <div class="menu-text">Staff</div>
            </div>
        </a>
        @endif
    </div>
    <div class="sidebar-bottom">
        <div class="divider"></div>
        <div class="menu-sidebar" id="logout">
            <img class="icon-ionicons-filled-car" alt="" src="{{ asset('assets/image/Log_Out.svg') }}" />
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="menu-text" style="color: #1E3B1B">Logout</div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                @csrf
            </form>
        </div>
    </div>
</sidebar>

<script>
    document.querySelectorAll('.menu-toggle').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault();
            const targetId = item.getAttribute('data-target');
            const targetDropdown = document.getElementById(targetId);
            const isVisible = targetDropdown.style.display === 'block';
            const chevron = item.querySelector('.icon-tabler-icons-chevron-');

            document.querySelectorAll('.dropdown').forEach(dropdown => {
                dropdown.style.display = 'none';
            });

            if (!isVisible) {
                targetDropdown.style.display = 'block';
                chevron.style.transform = 'rotate(90deg)';
            } else {
                targetDropdown.style.display = 'none';
                chevron.style.transform = 'rotate(0deg)';
            }
        });
    });
</script>