<sidebar class="sidebar">
    <div class="sidebar-top">
        <div class="menu-sidebar">
            <img class="menu-icon" alt="" src="{{ asset('assets/image/cart.svg') }}" />

            <div class="menu-text">Point Of Sale</div>
            <img class="icon-tabler-icons-chevron-" alt="" src="{{ asset('assets/image/chevron-right.svg') }}" />
        </div>
        <div class="menu-sidebar">
            <img class="menu-icon" alt="" src="{{ asset('assets/image/document-f.svg') }}" />

            <div class="menu-text" id="button-menu-selected">Transaksi</div>
            <img class="icon-tabler-icons-chevron-" alt="" src="{{ asset('assets/image/chevron-down.svg') }}" />
        </div>
        <div class="menu-sidebar">
            <img class="menu-icon" alt="" src="{{ asset('assets/image/currency-dollar.svg') }}" />

            <div class="menu-text">Keuangan</div>
        </div>
        <div class="menu-sidebar">
            <img class="menu-icon" alt="" src="{{ asset('assets/image/bag.svg') }}" />

            <div class="menu-text">Penjualan</div>
        </div>
        <div class="menu-sidebar">
            <img class="menu-icon" alt="" src="{{ asset('assets/image/Box.svg') }}" />

            <div class="menu-text">Inventori</div>
        </div>
    </div>
    <div class="sidebar-bottom">
        <div class="divider"></div>
        <div class="menu-sidebar">
            <img class="icon-ionicons-filled-car" alt="" src="{{ asset('assets/image/settings.svg') }}" />

            <div class="menu-text">Settings</div>
        </div>
        <div class="menu-sidebar" id="logout">
            <img class="icon-ionicons-filled-car" alt="" src="{{ asset('assets/image/Log_Out.svg') }}" />

            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="menu-text">Logout</div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                @csrf
            </form>
        </div>
    </div>
</sidebar>