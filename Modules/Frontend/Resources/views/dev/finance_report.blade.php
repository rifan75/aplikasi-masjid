@extends('frontend::layouts.app-frontend1')

@section('main-content')
<section class="banner-bottom-w3ls py-md-5 py-4">
    <div class="container">
    <div class="inner-sec-wthreelayouts py-md-5 py-4">
    <div style ="text-align:center">  
            <img src="{{asset('images/article_head1.png')}}" style="width:60%;height:100px">
        </div><br>
            <div class="row">
                <div class="col-md-10  offset-md-1" style="color:black">
                <h3>Laporan Keuangan<br>{{$dev->name}}</h3><br>
                <h5>@lang("admin::dev.donation")</h5>
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
                <div>
                Catatan : <br> Untuk donasi berbentuk material/barang, nilai donasi merupakan perkiraan harga pembelian.
                </div><br>
                <h5>@lang("admin::dev.cost")</h5>
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
        </div>
    </div>
    </div>
</section>

@endsection