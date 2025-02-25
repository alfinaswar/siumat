<table>
    <thead>
        <tr>
            <th>Nama Pengeluaran</th>
            <th>Jumlah (Rp)</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0; @endphp

        @foreach ($pengeluaran as $item)
            <tr>
                <td>{{ $item->NamaPengeluaran }}</td>
                <td>{{ number_format($item->JumlahPengeluaran, 0, ',', '.') }}</td>
                <td>{{ $item->TanggalPengeluaran }}</td>
                <td>{{ $item->Keterangan }}</td>
            </tr>
            @php $total += $item->JumlahPengeluaran; @endphp
        @endforeach

        <!-- Baris Total -->
        <tr>
            <td><strong>Total</strong></td>
            <td><strong>{{ number_format($total, 0, ',', '.') }}</strong></td>
            <td colspan="2"></td>
        </tr>
    </tbody>
</table>
