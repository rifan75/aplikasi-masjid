@extends('frontend::layouts.app-frontendmosque')

@section('main-content')
    <div class="container">
        <input id="id" type='hidden' name='id' value='0'>
            <div class="row">
                <div class="col-md-11" style="color:black">
                <h1>Laporan Keuangan Masjid Al-Husna</h1><br>
                <b>Laporan Keuangan Masjid Al-Husna Per Jumat tanggal ....</b><br><br>
                <div>
                <table>
                    <tr>
                        <td>Sisa Cash Masjid Sebelumnya</td><td>:</td><td>Rp.</td><td>10000</td>
                    </tr>
                    <tr>
                        <td>Penerimaan :</td><td></td>
                        <td></td><td></td>
                    </tr>
                    <tr>
                        <td  style="padding-left:5px; width:50%">- Kotak Amal Jumat</td>
                        <td style="width:5%">:</td>
                        <td style="width:10%">Rp.</td><td style="width:25%">10000</td>
                        </tr>
                    <tr>
                        <td style="padding-left:5px">- Kotak Amal Jumat</td><td>:</td>
                        <td>Rp.</td><td>10000</td>
                        </tr>
                    <tr>
                        <td style="padding-left:5px">- Kotak Amal Jumat</td><td>:</td>
                        <td>Rp.</td><td>10000</td>
                    </tr>
                    <tr>
                        <td>Jumlah Pemasukan Minggu Ini</td><td>:</td>
                        <td>Rp.</td><td>10000</td>
                    </tr>
                    <tr>
                        <td>Pengeluaran :</td><td></td>
                        <td></td><td></td>
                    </tr>
                    <tr>
                        <td style="padding-left:5px">- Kotak Amal Jumat</td><td>:</td>
                        <td>Rp.</td><td>10000</td>
                        </tr>
                    <tr>
                        <td style="padding-left:5px">- Kotak Amal Jumat</td><td>:</td>
                        <td>Rp.</td><td>10000</td>
                    </tr>
                    <tr>
                        <td>Jumlah Pengeluaran Minggu Ini</td><td>:</td>
                        <td>Rp.</td><td>10000</td>
                    </tr>
                    <tr>
                        <td>Sisa Cash Masjid Per Jumat tanggal</td><td>:</td>
                        <td>Rp.</td><td>10000</td>
                    </tr>
                </table>        
                </div>
                <br><br>
                Catatan :<br>
                <b>Laporan Keuangan Masjid Al-Husna Menggunakan Metode Cash Basis
                   ( pemasukan -Infaq/shodaqoh- dan pengeluaran masjid dihitung berdasarkan
                   uang yang masuk dan keluar -- tidak ada utang piutang dan biaya akrual ) 
                </b>
                <br>
                <b>Jurnal Pemasukan dan Pengeluaran di Hitung per-Minggu setiap Jumat</b>
                </div>
            </div><br>
    </div>
</section>

@endsection

{{-- page level scripts --}}
@section('footer_scripts')

<script type="text/javascript">

</script>

@stop