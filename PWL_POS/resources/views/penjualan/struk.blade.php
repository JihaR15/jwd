<div class="struk-container">
    <div class="center">
        <h3>JIHA - POS</h3>
        <p>Jl. Soekarno-Hatta No. 9 Malang 65141</p>
        <p>-----------------------------------</p>
    </div>

    <p>
        <strong>Kode:</strong> {{ $penjualan->penjualan_kode }}<br>
        <strong>Tanggal:</strong> {{ date('d/m/Y H:i', strtotime($penjualan->penjualan_tanggal)) }}<br>
        <strong>Kasir:</strong> {{ $penjualan->user->nama }}<br>
        <strong>Pembeli:</strong> {{ $penjualan->pembeli }}
    </p>

    <table>
        <thead>
            <tr>
                <th>Barang</th>
                <th>Jml</th>
                <th>Harga</th>
                <th>Subt.</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0; 
            @endphp
            @foreach ($penjualan->detail as $item)
            @php
                $subtotal = $item->harga * $item->jumlah;
                $total += $subtotal;
            @endphp
                <tr>
                    <td>{{ $item->barang->barang_nama }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ number_format($item->harga) }}</td>
                    <td>{{ number_format($subtotal) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="total center">
        TOTAL: Rp {{ number_format($total) }}
    </p>

    <div class="footer">
        <p>Terima kasih!</p>
        <p>~ Sampai Jumpa Lagi ~</p>
    </div>
</div>
