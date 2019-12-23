@extends('frontend::layouts.app-frontendmosque')

@section('main-content')
    <div class="container">
        <input id="id" type='hidden' name='id' value='0'>
            <div class="row">
                <div class="col-md-11" style="color:black">
                <h1>Daftar Mustahiq di Lingkungan Masjid Al-Husna</h1><br>
                <div>
                <table id="mustahiqtable" class="table table-hover">
                        <thead style="vertical-align:middle">
                        <tr>
                        <th></th>
                            <th style="text-align:center">Nama</th>
                            <th style="text-align:center">Gender</th>
                            <th style="text-align:center">Golongan</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>     
                </div>
                <br><br>
                Catatan :<br>
                <b>Untuk Jamaah yang berkepentingan melihat data mustahiq lebih detail, dapat menghubungi pengurus Masjid Al-Husna</b>
                </div>
            </div><br>
    </div>
</section>

@endsection

{{-- page level scripts --}}
@section('footer_scripts')

<script type="text/javascript">
var $=jQuery.noConflict();
var table = $('#mustahiqtable').DataTable({
    processing: true,
    serverSide: true,
    lengthChange: false,
    pageLength: 10,
    pagingType: "simple",
    ajax:   {   "url" : "/mustahiq-list"},
    
    columns: [
        {data: 'no',visible: false}, {data: 'name'}, {data: 'gender'}, {data: 'type'}
    ],
});
</script>

@stop