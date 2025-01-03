<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk</title>
    <style>
        html{
            background-color: rgb(8, 61, 8, 0.8);
        }
        body {
            display: flex;
            width: 340px;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            margin: auto;
            font-size: 14px;
        }
        .modal {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            background-color: white;
        }
        .modal-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
        .modal-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 90%;
        }
        .modal-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 90%;
        }

        .modal-header,
        .modal-body,
        .modal-footer {
        width: 100%; 
        }

        .modal-header table,
        .modal-body table,
        .modal-footer table {
        width: 100%; 
        border-collapse: collapse;
        border: none; 
        margin: 0 auto;
        }


        .modal-header td,
        .modal-body td,
        .modal-footer td {
        padding: 0; /* Hapus padding pada sel */
        font-size: 14px; /* Ukuran font */
        border: none; /* Tambahkan border pada sel */
        }

        /* Rata kiri untuk kolom pertama */
        .modal-header td:first-child,
        .modal-body td:first-child,
        .modal-footer td:first-child {
        text-align: left; /* Rata kiri */
        }

        /* Rata kanan untuk kolom kedua */
        .modal-header td:last-child,
        .modal-body td:last-child,
        .modal-footer td:last-child {
        text-align: right; /* Rata kanan */
        }

        /* Rata tengah untuk kolom menu */
        .modal-body td:nth-child(2) {
            text-align: start; /* Rata tengah untuk kolom menu */
        }
        .modal-body td:first-child {
            width: 6%; /* Rata tengah untuk kolom menu */
        }
        .modal-body td:last-child {
            width: 30%; /* Rata tengah untuk kolom menu */
        }
    </style>
</head>
<body>
    <div id="receipt-modal" class="modal">
        <div class="modal-content">
            <div class="modal-info">
                <img style="width: 150px" class="logo" src="{{ asset('assets/image/Logo_Kongsi.png') }}" alt="logo" />
                <div style="text-align: center"> 
                    Jl. Pandanwangi No.33, Cibiru Wetan</br>
                    Telp. 082291877703</br></br>
                </div>
            </div>
            <div class="modal-container">
                <div class="modal-header" style="padding: 0px">
                    <table>
                        <tbody>
                            <tr>
                                <td>No Order</td>
                                <td><span id="invoice-number">#3</span></td>
                            </tr>
                            <tr>
                                <td>Waktu</td>
                                <td><span id="invoice-time">03/01/2025 10:16</span></td>
                            </tr>
                            <tr>
                                <td>Kasir</td>
                                <td><span id="cashier-name">Annisa</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="text-align: center">-----------------------------------------------------------------</div>
                </div>
                <div class="modal-body" id="receipt-body" style="padding: 0px">
                    <table>
                        <tbody>
                            <tr>
                                <td>2</td>
                                <td>Kopi Susu Aren Kongsi</td>
                                <td>Rp 46.000</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Salted Caramel Macchiato</td>
                                <td>Rp 28.000</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Americano</td>
                                <td>Rp 19.000</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Cinnamon Latte</td>
                                <td>Rp 27.000</td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="text-align: center">-----------------------------------------------------------------</div>
                </div>
                <div class="modal-footer" style="padding: 0px">
                    <table>
                        <tbody>
                            <tr>
                                <td>Subtotal</td>
                                <td><span id="subtotal">Rp 92.000</span></td>
                            </tr>
                            <tr>
                                <td>PPN 11%</td>
                                <td><span id="subtotal">Rp 10.120</span></td>
                            </tr>
                            <tr style="font-weight: bold">
                                <td>Total Tagihan</td>
                                <td><span id="total-bill">Rp 102.120</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="text-align: center">-----------------------------------------------------------------</div> 
                    <table>
                        <tbody>
                            <tr>
                                <td>Total Bayar</td>
                                <td><span id="total-paid">Rp 110.000</span></td>
                            </tr>
                            <tr>
                                <td>Kembalian</td>
                                <td><span id="change"></span>Rp 7.880</td>
                            </tr>
                        </tbody>
                    </table> 
                    <div style="text-align: center">=====================================</div>
                    <p style="text-align: center">Terima Kasih <br>
                        Selamat Menikmati! ☕︎
                    </p>
                    <p style="text-align: center">Instagram : @kongsi.kedaikopi</p>                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>