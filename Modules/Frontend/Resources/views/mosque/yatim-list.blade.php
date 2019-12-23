@extends('frontend::layouts.app-frontendmosque')

@section('main-content')
    <div class="container">
        <input id="id" type='hidden' name='id' value='0'>
            <div class="row">
                <div class="col-md-11" style="color:black">
                <h1>Daftar Anak Yatim di Lingkungan Masjid Al-Husna</h1><br>
                <div>
                <table id="yatimtable" class="table table-hover">
                        <thead style="vertical-align:middle">
                        <tr>
                        <th></th>
                            <th style="text-align:center">Nama</th>
                            <th style="text-align:center">Gender</th>
                            <th style="text-align:center">Tgl Lahir</th>
                            <th style="text-align:center">Umur</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>     
                </div>
                <br><br>
                Catatan :<br>
                <b>Untuk Jamaah yang berkepentingan melihat data anak yatim lebih detail, dapat menghubungi pengurus Masjid Al-Husna</b>
                </div>
            </div><br>
    </div>
</section>

@endsection

{{-- page level scripts --}}
@section('footer_scripts')

<script type="text/javascript">
var $=jQuery.noConflict();
var table = $('#yatimtable').DataTable({
    processing: true,
    serverSide: true,
    lengthChange: false,
    pageLength: 10,
    pagingType: "simple",
    ajax:   {   "url" : "/yatim-list"},
    
    columns: [
        {data: 'no',visible: false}, {data: 'name'}, {data: 'gender'}, {data: 'birth'}, {data: 'age'}
    ],
});
</script>

@stop