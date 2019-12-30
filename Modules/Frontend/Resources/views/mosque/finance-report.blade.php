@extends('frontend::layouts.app-frontendmosque')

@section('main-content')
    <div class="container">
        <input id="id" type='hidden' name='id' value='0'>
            <div class="row">
                <div class="col-md-11" style="color:black">
                <h1>Laporan Keuangan Masjid Al-Husna</h1><br>
                <b>Laporan Keuangan Masjid Al-Husna Per Hari {{$datenowgeo}}</b><br><br>
                <div>
                <table style="width:100%">
                    <tr>
                        <td style="width:60%">Sisa Dana Masjid Jum'at Sebelumnya {{$fridaybeftrans}}</td>
                        <td style="width:10%">:</td
                        ><td style="width:10%">Rp.</td>
                        <td style="width:20%;text-align:right"> {{number_format($remainingbef,0,',','.')}}</td>
                    </tr>
                    <tr>
                        <td></td><td>&nbsp;</td>
                        <td></td><td><b></b></td>
                    </tr>
                    <tr>
                        <td>Penerimaan :</td><td></td>
                        <td></td><td></td>
                    </tr>
                    @foreach($incomeSrc as $key => $donation)
                    <tr>
                        <td  style="padding-left:5px; width:50%">- {{$donation}}</td>
                        <td style="width:10%">:</td>
                        <td style="width:10%">Rp.</td><td style="width:20%;text-align:right">{{number_format($income[$key], 0, ',', '.')}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td><b>Jumlah Pemasukan Minggu Ini</b></td><td>:</td>
                        <td>Rp.</td><td style="text-align:right"><b>{{number_format(array_sum($income), 0, ',', '.')}}</b></td>
                    </tr>
                    <tr>
                        <td></td><td>&nbsp;</td>
                        <td></td><td><b></b></td>
                    </tr>
                    <tr>
                        <td>Pengeluaran :</td><td></td>
                        <td></td><td></td>
                    </tr>
                    @foreach($costSrc as $key => $costName)
                    <tr>
                        <td style="padding-left:5px">- {{$costName}}</td><td>:</td>
                        <td>Rp.</td><td style="text-align:right">{{number_format($costval[$key], 0, ',', '.')}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td><b>Jumlah Pengeluaran Minggu Ini</b></td><td>:</td>
                        <td>Rp.</td><td style="text-align:right"><b>{{number_format(array_sum($costval), 0, ',', '.')}}</b></td>
                    </tr>
                    <tr>
                        <td></td><td>&nbsp;</td>
                        <td></td><td><b></b></td>
                    </tr>
                    <tr>
                        <td>Sisa Dana Masjid Per Hari {{$datenowgeo}}</td><td>:</td>
                        <td>Rp.</td><td style="text-align:right"><b>{{number_format($remaining,0,',','.')}}</b></td>
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