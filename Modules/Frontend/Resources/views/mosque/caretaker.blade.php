@extends('frontend::layouts.app-frontendmosque')

@section('main-content')
    <div class="container">
        <input id="id" type='hidden' name='id' value='0'>
            <div class="row">
                <div class="col-md-12" style="color:black">
                <h1>Susunan Pengurus Masjid Al-Husna</h1><br>
                    Ketua : <b>{{$mosque->organizer["chief"]}}</b><br>
                    Wakil Ketua : <b>{{$mosque->organizer["deputy_chief"]}}</b><br><br>
                    <b>Seksi -Seksi : </b><br>
                    Bendahra : <b> {{$mosque->organizer["treasury"]}} </b><br>
                    Seksi Keamanan : <b>{{$mosque->organizer["security"]}} </b><br>
                    Seksi Konsumsi : <b>{{$mosque->organizer["consumsi"]}} </b><br>
                    <br>
                    <b>Penyelenggara : </b><br>
                    Imam Mesjid : <b> {{$mosque->organizer["imam"]}} </b><br>
                    Muaddzin/ Marbot: <b> {{$mosque->organizer["marbout"]}} </b><br>
                    <div class="row">
                        <div class="col-md-6">
                           
                        </div>
                    </div>
                    <br>
                </div>
            </div><br>
    </div>

@endsection

{{-- page level scripts --}}
@section('footer_scripts')

<script type="text/javascript">

</script>

@stop