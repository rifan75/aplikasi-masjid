@extends('admin::layouts.app')

@section('content')
<section class="banner-bottom-w3ls py-4">
    <div class="container">
            <div class="row">
            
                <div class="col-md-1">
                </div>
                <div class="col-md-10" style="color:black">

    <a href="{{route('development-admin')}}" id="createbutton" type="button" class=" btn btn-success" style="margin-bottom:5px">@lang("admin::dev.donation_journal")</a>
    <a href="{{route('development-admin')}}" id="createbutton" type="button" class=" btn btn-success" style="margin-bottom:5px">@lang("admin::dev.cost_journal")</a>
                <h3>@lang("admin::dev.donation")</h3>
                <table style = "width:80%">
                @foreach($incomeSrc as $key => $donation)
                <tr>
                    <td style = "width:60%">{{$donation}}</td>
                    <td style = "width:10%">:</td>
                    <td style = "width:10%">@lang("admin::dev.currency")</td>
                    <td style = "width:20%;text-align:right">{{number_format($income[$key], 0, ',', '.')}}</td>
                </tr>
                @endforeach
                <tr>
                    <td style = "width:60%"><b>@lang("admin::dev.total")</b></td>
                    <td style = "width:10%"></td>
                    <td style = "width:10%">@lang("admin::dev.currency")</td>
                    <td style = "width:20%;text-align:right"><b>{{number_format($incometotal, 0, ',', '.')}}</b></td>
                </tr>
                </table><br>
                <p>
                Catatan : <br> Untuk donasi berbentuk material/barang, nilai donasi merupakan perkiraan harga pembelian.
                </p>
                <h3>@lang("admin::dev.cost")</h3>
                <table style = "width:80%">
                @foreach($costSrc as $key => $costName)
                <tr>
                    <td style = "width:60%">{{$costName}}</td>
                    <td style = "width:10%">:</td>
                    <td style = "width:10%">@lang("admin::dev.currency")</td>
                    <td style = "width:20%;text-align:right">{{number_format($costval[$key], 0, ',', '.')}}</td>
                </tr>
                @endforeach
                <tr>
                    <td style = "width:60%"><b>@lang("admin::dev.total")</b></td>
                    <td style = "width:10%"></td>
                    <td style = "width:10%">@lang("admin::dev.currency")</td>
                    <td style = "width:20%;text-align:right"><b>{{number_format($costtotal, 0, ',', '.')}}</b></td>
                </tr>
                </table><br>
                <h3><b>
                @lang("admin::dev.remaining_fund") : @lang("admin::dev.currency") {{number_format($remaining, 0, ',', '.')}}
                </b></h3>
       
                </div>
                <div class="col-md-1">
                </div>
        </div>
    </div>
</section>

@endsection

{{-- page level scripts --}}
@section('footer_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
@stop