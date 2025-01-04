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
            width: 302.36220472px;
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

        @page {
            size: 80mm auto; /* Lebar 80mm (standar struk kasir) dan tinggi otomatis */
            margin: 0; /* Hapus margin default */
        }

        /* Print Styles */
        @media print {
            body {
                width: 80mm;
                margin: 0;
                padding: 0;
            }
            html, body {
                background: none;
            }
            .modal {
                border: none;
                box-shadow: none;
            }
            .modal-content {
                margin: 0;
                padding: 0;
            }
        }
    </style>
</head>
<body onafterprint="printFunction()">
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
                                <td><span id="invoice-number">#{{ $transaction->id }}</span></td>
                            </tr>
                            <tr>
                                <td>Waktu</td>
                                <td><span id="invoice-time">{{ $transaction->created_at }}</span></td>
                            </tr>
                            <tr>
                                <td>Kasir</td>
                                <td><span id="cashier-name">{{ $transaction->cashier_name }}</span></td>
                            </tr>
                            <tr>
                                <td>Metode Pembayaran</td>
                                <td><span id="payment-method">{{ $transaction->payment_method }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="text-align: center">----------------------------------------------------------</div>
                </div>
                <div class="modal-body" id="receipt-body" style="padding: 0px">
                    <table>
                        <tbody>
                            @foreach ($transaction_detail as $item)
                            <tr>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->name }}</td>
                                <td>Rp {{ number_format($item->qty * $item->price, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="text-align: center">----------------------------------------------------------</div>
                </div>
                <div class="modal-footer" style="padding: 0px">
                    <table>
                        <tbody>
                            <tr>
                                <td>Subtotal</td>
                                <td><span id="subtotal">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</span></td>
                            </tr>
                            {{-- <tr>
                                <td>PPN 11%</td>
                                <td><span id="subtotal">Rp 10.120</span></td>
                            </tr> --}}
                            <tr style="font-weight: bold">
                                <td>Total Tagihan</td>
                                <td><span id="total-bill">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="text-align: center">----------------------------------------------------------</div> 
                    <table>
                        <tbody>
                            <tr>
                                <td>Total Bayar</td>
                                <td><span id="total-paid">Rp {{ number_format($transaction->payment_amount, 0, ',', '.') }}</span></td>
                            </tr>
                            <tr>
                                <td>Kembalian</td>
                                <td><span id="change"></span>Rp {{ number_format($transaction->changes, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table> 
                    <div style="text-align: center">=================================</div>
                    <p style="text-align: center">Terima Kasih <br>
                        Selamat Menikmati! ☕︎
                    </p>
                    <p style="text-align: center">Instagram : @kongsi.kedaikopi</p>                    
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function.printFunction() {
        window.close();
    }

    document.addEventListener('DOMContentLoaded', function () {
        window.print();
    });
</script>
</html>