<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Fonts --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@500&display=swap" />

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    {{-- <link rel="stylesheet" href="../CSS/page/pos.css" /> --}}
    @stack('styles')

    <title>QPOS - @yield('title')</title>
</head>

<body>
    {{-- HEADER --}}
    <header>
        @include('layouts.header')
        {{-- <div class="header">
            <div class="logo-header">
                <img class="logo-icon" alt="" src="../image/Logo.png" />
                <div class="text-header">
                    <b class="logo-title">Q-POS</b>
                    <div class="date">Sabtu, 25 Oktober 2024</div>
                </div>
            </div>
            <div class="search">
                <input class="placeholder" type="text" placeholder="Search" />
                <img class="icon-l" alt="" src="../image/search.svg" />
            </div>
        </div> --}}
        @yield('more-header')
        {{-- <div class="aside-header">
            <div class="aside-header-content">
                <div class="icon-order-detail">
                    <img class="clipboard-icon" alt="" src="../image/clipboard.svg" />
                </div>
                <div class="order-detail">
                    <div class="title">Order Menu</div>
                    <div class="order-number">Order No. 16</div>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path
                            d="M14 10V17M10 10V17M6 6V17.8C6 18.9201 6 19.4798 6.21799 19.9076C6.40973 20.2839 6.71547 20.5905 7.0918 20.7822C7.5192 21 8.07899 21 9.19691 21H14.8031C15.921 21 16.48 21 16.9074 20.7822C17.2837 20.5905 17.5905 20.2839 17.7822 19.9076C18 19.4802 18 18.921 18 17.8031V6M6 6H8M6 6H4M8 6H16M8 6C8 5.06812 8 4.60241 8.15224 4.23486C8.35523 3.74481 8.74432 3.35523 9.23438 3.15224C9.60192 3 10.0681 3 11 3H13C13.9319 3 14.3978 3 14.7654 3.15224C15.2554 3.35523 15.6447 3.74481 15.8477 4.23486C15.9999 4.6024 16 5.06812 16 6M16 6H18M18 6H20"
                            stroke="#8A8A8A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
            <div class="divider"></div>
        </div> --}}
    </header>
    {{-- END OF HEADER --}}
    <main>
        <div class="left-page">
            {{-- SIDEBAR --}}
            @include('layouts.sidebar')
            {{-- <sidebar class="sidebar">
                <div class="sidebar-top">
                    <div class="menu-sidebar">
                        <img class="menu-icon" alt="" src="../Image/cart.svg" />

                        <div class="menu-text">Point Of Sale</div>
                        <img class="icon-tabler-icons-chevron-" alt="" src="../Image/chevron-right.svg" />
                    </div>
                    <div class="menu-sidebar">
                        <img class="menu-icon" alt="" src="../Image/document-f.svg" />

                        <div class="menu-text" id="button-menu-selected">Transaksi</div>
                        <img class="icon-tabler-icons-chevron-" alt="" src="../Image/chevron-down.svg" />
                    </div>
                    <div class="menu-sidebar">
                        <img class="menu-icon" alt="" src="../Image/currency-dollar.svg" />

                        <div class="menu-text">Keuangan</div>
                    </div>
                    <div class="menu-sidebar">
                        <img class="menu-icon" alt="" src="../Image/bag.svg" />

                        <div class="menu-text">Penjualan</div>
                    </div>
                    <div class="menu-sidebar">
                        <img class="menu-icon" alt="" src="../Image/Box.svg" />

                        <div class="menu-text">Inventori</div>
                    </div>
                </div>
                <div class="sidebar-bottom">
                    <div class="divider"></div>
                    <div class="menu-sidebar">
                        <img class="icon-ionicons-filled-car" alt="" src="../Image/settings.svg" />

                        <div class="menu-text">Settings</div>
                    </div>
                    <div class="menu-sidebar" id="logout">
                        <img class="icon-ionicons-filled-car" alt="" src="../Image/Log_Out.svg" />

                        <div class="menu-text">Logout</div>
                    </div>
                </div>
            </sidebar> --}}
            {{-- END OF SIDE BAR --}}

            {{-- MAIN CONTENT --}}
            @yield('main-content')
            {{-- <div class="main-content">
                <div class="menu-container">
                    <div class="menu-card">
                        <div class="image">
                            <img class="image-5-icon" alt="" src="../Image/image-menu.png" />
                        </div>
                        <div class="information">
                            <div class="name-menu">Kopi Susu Aren KONGSI</div>
                            <div class="price-menu">Rp 23.000</div>
                        </div>
                    </div>
                    <div class="menu-card">
                        <div class="image">
                            <img class="image-5-icon" alt="" src="../Image/image-menu.png" />
                        </div>
                        <div class="information">
                            <div class="name-menu">Kopi Susu Aren KONGSI</div>
                            <div class="price-menu">Rp 23.000</div>
                        </div>
                    </div>
                    <div class="menu-card">
                        <div class="image">
                            <img class="image-5-icon" alt="" src="../Image/image-menu.png" />
                        </div>
                        <div class="information">
                            <div class="name-menu">Kopi Susu Aren KONGSI</div>
                            <div class="price-menu">Rp 23.000</div>
                        </div>
                    </div>
                    <div class="menu-card">
                        <div class="image">
                            <img class="image-5-icon" alt="" src="../Image/image-menu.png" />
                        </div>
                        <div class="information">
                            <div class="name-menu">Kopi Susu Aren KONGSI</div>
                            <div class="price-menu">Rp 23.000</div>
                        </div>
                    </div>
                    <div class="menu-card">
                        <div class="image">
                            <img class="image-5-icon" alt="" src="../Image/image-menu.png" />
                        </div>
                        <div class="information">
                            <div class="name-menu">Kopi Susu Aren KONGSI</div>
                            <div class="price-menu">Rp 23.000</div>
                        </div>
                    </div>
                    <div class="menu-card">
                        <div class="image">
                            <img class="image-5-icon" alt="" src="../Image/image-menu.png" />
                        </div>
                        <div class="information">
                            <div class="name-menu">Kopi Susu Aren KONGSI</div>
                            <div class="price-menu">Rp 23.000</div>
                        </div>
                    </div>
                    <div class="menu-card">
                        <div class="image">
                            <img class="image-5-icon" alt="" src="../Image/image-menu.png" />
                        </div>
                        <div class="information">
                            <div class="name-menu">Kopi Susu Aren KONGSI</div>
                            <div class="price-menu">Rp 23.000</div>
                        </div>
                    </div>
                    <div class="menu-card">
                        <div class="image">
                            <img class="image-5-icon" alt="" src="../Image/image-menu.png" />
                        </div>
                        <div class="information">
                            <div class="name-menu">Kopi Susu Aren KONGSI</div>
                            <div class="price-menu">Rp 23.000</div>
                        </div>
                    </div>
                    <div class="menu-card">
                        <div class="image">
                            <img class="image-5-icon" alt="" src="../Image/image-menu.png" />
                        </div>
                        <div class="information">
                            <div class="name-menu">Kopi Susu Aren KONGSI</div>
                            <div class="price-menu">Rp 23.000</div>
                        </div>
                    </div>
                    <div class="menu-card">
                        <div class="image">
                            <img class="image-5-icon" alt="" src="../Image/image-menu.png" />
                        </div>
                        <div class="information">
                            <div class="name-menu">Kopi Susu Aren KONGSI</div>
                            <div class="price-menu">Rp 23.000</div>
                        </div>
                    </div>
                </div>
            </div> --}}
            
        </div>
        @yield('more-content')
        {{-- <aside class="right-page">
            <div class="aside-body">
                <div class="menu-order-container">
                    <div class="menu-order">
                        <div class="menu-selected">
                            <div class="name">Es Kopi Susu Aren Berlima</div>
                            <div class="price">Rp 108.000</div>
                            <div class="notes">
                                <img class="icon-notes" alt="" src="../Image/edit.svg" />
                                <div class="text-notes">Less Sugar</div>
                            </div>
                        </div>
                        <div class="qty-option">
                            <div class="button-minus">
                                <img class="minus-icon" alt="" src="../Image/Minus.png" />
                            </div>
                            <div class="input-qty">
                                <div class="div">1</div>
                            </div>
                            <div class="button-plus">
                                <img class="minus-icon" alt="" src="../Image/Plus.png" />
                            </div>
                        </div>
                    </div>
                    <div class="menu-order">
                        <div class="menu-selected">
                            <div class="name">Es Kopi Susu Aren Berlima</div>
                            <div class="price">Rp 108.000</div>
                            <div class="notes">
                                <img class="icon-notes" alt="" src="../Image/edit.svg" />
                                <div class="text-notes">Less Sugar</div>
                            </div>
                        </div>
                        <div class="qty-option">
                            <div class="button-minus">
                                <img class="minus-icon" alt="" src="../Image/Minus.png" />
                            </div>
                            <div class="input-qty">
                                <div class="div">1</div>
                            </div>
                            <div class="button-plus">
                                <img class="minus-icon" alt="" src="../Image/Plus.png" />
                            </div>
                        </div>
                    </div>
                    <div class="menu-order">
                        <div class="menu-selected">
                            <div class="name">Es Kopi Susu Aren Berlima</div>
                            <div class="price">Rp 108.000</div>
                            <div class="notes">
                                <img class="icon-notes" alt="" src="../Image/edit.svg" />
                                <div class="text-notes">Less Sugar</div>
                            </div>
                        </div>
                        <div class="qty-option">
                            <div class="button-minus">
                                <img class="minus-icon" alt="" src="../Image/Minus.png" />
                            </div>
                            <div class="input-qty">
                                <div class="div">1</div>
                            </div>
                            <div class="button-plus">
                                <img class="minus-icon" alt="" src="../Image/Plus.png" />
                            </div>
                        </div>
                    </div>
                    <div class="menu-order">
                        <div class="menu-selected">
                            <div class="name">Es Kopi Susu Aren Berlima</div>
                            <div class="price">Rp 108.000</div>
                            <div class="notes">
                                <img class="icon-notes" alt="" src="../Image/edit.svg" />
                                <div class="text-notes">Less Sugar</div>
                            </div>
                        </div>
                        <div class="qty-option">
                            <div class="button-minus">
                                <img class="minus-icon" alt="" src="../Image/Minus.png" />
                            </div>
                            <div class="input-qty">
                                <div class="div">1</div>
                            </div>
                            <div class="button-plus">
                                <img class="minus-icon" alt="" src="../Image/Plus.png" />
                            </div>
                        </div>
                    </div>
                    <div class="menu-order">
                        <div class="menu-selected">
                            <div class="name">Es Kopi Susu Aren Berlima</div>
                            <div class="price">Rp 108.000</div>
                            <div class="notes">
                                <img class="icon-notes" alt="" src="../Image/edit.svg" />
                                <div class="text-notes">Less Sugar</div>
                            </div>
                        </div>
                        <div class="qty-option">
                            <div class="button-minus">
                                <img class="minus-icon" alt="" src="../Image/Minus.png" />
                            </div>
                            <div class="input-qty">
                                <div class="div">1</div>
                            </div>
                            <div class="button-plus">
                                <img class="minus-icon" alt="" src="../Image/Plus.png" />
                            </div>
                        </div>
                    </div>
                    <div class="menu-order">
                        <div class="menu-selected">
                            <div class="name">Es Kopi Susu Aren Berlima</div>
                            <div class="price">Rp 108.000</div>
                            <div class="notes">
                                <img class="icon-notes" alt="" src="../Image/edit.svg" />
                                <div class="text-notes">Less Sugar</div>
                            </div>
                        </div>
                        <div class="qty-option">
                            <div class="button-minus">
                                <img class="minus-icon" alt="" src="../Image/Minus.png" />
                            </div>
                            <div class="input-qty">
                                <div class="div">1</div>
                            </div>
                            <div class="button-plus">
                                <img class="minus-icon" alt="" src="../Image/Plus.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="aside-footer">
                <div class="divider"></div>
                <div class="aside-footer-container">
                    <div class="text-info">
                        <div class="qty-total">3 Item</div>
                        <div class="price-total">Rp 235.000</div>
                    </div>
                    <div class="button-order">
                        <div class="button">Order</div>
                    </div>
                </div>
            </div>
        </aside> --}}
    </main>
</body>

</html>
