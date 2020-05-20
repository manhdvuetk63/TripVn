<?php
use Illuminate\Support\Facades\Session;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('lib/bootstrap.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="{{asset('lib/jquery.min.js')}}"></script>
    <script src="{{asset('lib/popper.min.js')}}"></script>
    <script src="{{asset('lib/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="{{asset('lib/jquery-1.12.4.js')}}"></script>
    <script src="{{asset('lib/jquery-ui.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/commonStyle.css')}}">
    <script type="text/javascript" src="{{asset('js/commonJs.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/clockStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/ticketStyle.css')}}">
    <script type="text/javascript" src="{{asset('js/ticketJs.js')}}"></script>
    <link rel="icon" type="image/x-icon" href="{{asset('image/icon.png')}}">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Liu+Jian+Mao+Cao&display=swap" rel="stylesheet">
    <title>TripsVn - Đặt vé máy bay</title>
</head>
<body onload="time()">
<header class="fixed-top" style="z-index: 2;">
    <div class="container-fluid" id="note" >
        <i class="fas fa-bell fa" style=" font-size: 20px;"></i>
        <b style="font-size: 16px; opacity: 0.5; font-family: 'Comic Sans MS';">
            Thông tin cần biết về tình trạng và chính sách áp dụng cho các chuyến bay trong đợt dịch bệnh Corona.
            <a href="https://ncov.moh.gov.vn/" target="_blank">Xem toàn bộ thông tin cập nhật.</a>
        </b>
    </div>
    <div id="border"></div>
    <div class="container-fluid" style="padding-top: 15px; background-color: white;">
        <button type="button" class="btn btn-light" id="justify" style="margin-left: 100px;">
            <i class="fas fa-bars fa" style="color: #0770cd; font-size: 22px;"></i>
        </button>
        <a href="/" id="link_home" style="padding-right: 40px;">
            <b style="font-size: 21px; margin-left: 0px; font-family: 'Comic Sans MS';">
                TripsVN
            </b>
        </a>
        <div style="display: inline-block;">
            <form action="{{route('blogSearch')}}" method="post">
                @csrf
                <input  type="text" name="searchcity" id="city" placeholder="Search...">
                <button type="submit" id="searchbar" class="btn">
                    <i class="fas fa-search-location"></i>
                </button>
            </form>
        </div>
        <div id="personal" style="display: inline-block;">
            <a class="choice" href="/cart" style="position: absolute; left: 950px;">
                <button class="btn btn-info" type="button">
                    <i class="fas fa-cart-plus" style="color: white;"></i>
                    <span class="badge badge-danger">
                        @if(Session::has('count'))
                            {{Session::get('count')}}
                        @else
                            0
                        @endif
                    </span>
                </button>
            </a>
            <div style="display: inline; margin-left: 800px;">
                <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="login">
                    <i class="far fa-user-circle">
                        Profile<span class="badge" style="background-color: #34ce57;">!</span>
                    </i>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand bg-light sticky-top" style="padding-left: 100px;">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto" style="font-size: 15px; margin-left: 305px; z-index: 2">
                <li class="nav-item">
                    <a class="nav-link" href="/ticket" style="color: black;">
                        <i class="fas fa-plane-departure" style="color: #30c5f7;"></i>
                        <b>Vé máy bay</b>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/hotel" style="color: black; margin-left: 50px;">
                        <i class="fas fa-building" style="color: #235d9f;"></i>
                        <b>Khách sạn</b>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cart" style="color: black; margin-left: 50px;">
                        <i class="fas fa-clipboard-list" style="color: #37c337;"></i>
                        <b>Đặt chỗ của tôi</b>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/banking" style="color: black; margin-left: 50px;">
                        <i class="fab fa-cc-mastercard" style="color: #ff6001;"></i>
                        <b>Banking</b>
                    </a>
                </li>
                <li style="margin-left: 400px;">
                    <button type="button" class="btn btn-danger" disabled="disabled">
                        <i class="fas fa-star" style="color: yellow;"></i>
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div id="fix"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col col-sm-6 bg-success slide">
            <div class="carousel slide" data-ride="carousel" id="mycarousel">
                <div class="carousel-inner">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="#">
                                <img src="{{asset('image/halong.jpg')}}" alt="Hạ Long" width="640" height="415">
                            </a>
                            <div class="carousel-caption">
                                <h2 class="place">Vịnh Hạ Long</h2>
                                <p>Quảng Ninh</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <a href="#">
                                <img src="{{asset('image/trangan.jpg')}}" alt="Tràng An" width="640" height="415">
                            </a>
                            <div class="carousel-caption">
                                <h2 class="place">Di tích Tràng An</h2>
                                <p>Ninh Bình</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <a href="#">
                                <img src="{{asset('image/nhatrang.jpg')}}" alt="Nha Trang" width="640" height="415">
                            </a>
                            <div class="carousel-caption">
                                <h2 class="place">Bãi biển Nha Trang</h2>
                                <p>Nha Trang</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <a href="#">
                                <img src="{{asset('image/hue.jpg')}}" alt="Huế" width="640" height="415">
                            </a>
                            <div class="carousel-caption">
                                <h2 class="place">Kinh Thành Huế</h2>
                                <p>Thừa Thiên Huế</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <a href="#">
                                <img src="{{asset('image/hoian.jpg')}}" alt="Hội An" width="640" height="415">
                            </a>
                            <div class="carousel-caption">
                                <h2 class="place">Phố cổ Hội An</h2>
                                <p>Quảng Nam</p>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="carousel-indicators" style="margin-right: 208px; z-index: 1;">
                    <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#mycarousel" data-slide-to="1" ></li>
                    <li data-target="#mycarousel" data-slide-to="2" ></li>
                    <li data-target="#mycarousel" data-slide-to="3" ></li>
                    <li data-target="#mycarousel" data-slide-to="4" ></li>
                </ul>
            </div>
        </div>
        <div class="col col-sm-3 bg-danger second">
            <h2 id="textLeft">
                Đặt ngay Tour tại <b>TripsVN</b><br> để nhận ưu đãi lên đến<br />
                <span class="fas fa-paper-plane" style="color: white; transform: rotate(-100deg);"></span>
                <strong style="font-size: 50px; color: #ff5835">
                    <u style="font-family: 'Comic Sans MS';">30%</u>
                </strong>
            </h2>
        </div>
        <div class="col col-sm-3" id="clock">
            <div class="d-flex flex-row" style="margin-top: 300px; margin-left: 20px;">
                <div class="p-2 common" id="h" style="padding-top: 12px !important;"></div>
                <div class="p-2 common m" id="m" style="padding-top: 12px !important;"></div>
                <div class="p-2 common" id="s" style="padding-top: 12px !important;"></div>
                <div class="p-2 common" id="w">AM</div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div id="result" style="margin-top:30px;">
        <p>
            @if(isset($chuyenbay))
                <button class="btn btn-primary">
                    <b>Có {{count($chuyenbay)}} được tìm thấy...</b>
                </button>
            @endif
        </p>
    </div>
    <table class="table table-bordered table-striped" style="margin-top: 70px; margin-bottom: 100px;">
        <tr>
            <th>
                Hãng bay
            </th>
            <th>
                Số hiệu chuyến bay
            </th>
            <th>
                Điểm khởi hành
            </th>
            <th>
                Điểm đến
            </th>
            <th>
                Ngày bay
            </th>
            <th>
                Giờ bay
            </th>
            <th>
                Hạng ghế
            </th>
            <th>
                Giá vé
            </th>
            <th>
                Đặt chuyến
            </th>
        </tr>
        @if(isset($chuyenbay))
            @foreach($chuyenbay as $value)
                <tr>
                    <td>{{$value->tenhang}}</td>
                    <td>{{$value->sohieu}}</td>
                    <td>{{Session::get('start')}}</td>
                    <td>{{Session::get('end')}}</td>
                    <td>{{date("d-m-Y", strtotime(Session::get('date')))}}</td>
                    <td>{{$value->giobay}}</td>
                    @switch($value->loaive)
                            @case (1)
                                <td>Phổ thông</td>
                                @break;
                            @case (2)
                                <td>Phổ thông đặc biệt</td>
                                @break;
                            @case (3)
                                <td>Thương gia</td>
                                @break;
                            @case (4)
                                <td>Hạng nhất</td>
                                @break;
                            @default
                                <b>Nothing</b>
                        @endswitch
                    <td>{{$value->giave}}$</td>
                    <td>
                        <form action="{{route('datve')}}" method="post">
                        @csrf
                            <input type="hidden" name="idChuyenBay" value="{{$value->idChuyenBay}}">
                            <input type="hidden" name="cost" value="{{$value->giave}}">
                            <button class="btn btn-success" type="submit">Buy ticket</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
</div>
<div class="container">
    <div style="height: 2px; background-color: rgba(64,58,28,0.22);"></div>
</div>
<div class="container" style="margin-top: 50px; margin-left: 400px; margin-bottom: 50px;">
    <b style=" font-size: 20px; opacity: 0.7; text-transform: uppercase; ">
        Tại sao nên đặt vé máy bay & phòng khách sạn tại TripsVN?
    </b>
</div>
<div class="container" style="padding-bottom: 200px;">
    <p style="float: left; font-size: 17px; margin-left: 200px;">
        <img src="{{asset('image/img1.png')}}">
    <p style="position: relative;margin-left: 500px;">
        <b style="font-size: 20px; margin-left: 20px;">Kết quả tìm kiếm bao quát</b><br/>
        Chỉ với một cú nhấp chuột, dễ dàng so sánh các chuyến bay của <br>
        Vietnam Airlines, Jetstar, Vietjet và các chặng bay quốc tế khác với <br>
        100.000 đường bay ở châu Á Thái Bình Dương và châu Âu.<br>
    </p>
    </p>
    <br><br><br><br>
    <p style="float: right; font-size: 17px; margin-left: 200px;">
        <img src="{{asset('image/img2.png')}}">
    <p style="position: relative;margin-left: 300px;">
        <b style="font-size: 20px; margin-left: 20px;">Giá cuối cùng</b><br/>
        Không phụ thu. Giá bạn thấy là giá bạn sẽ trả, giúp bạn dễ dàng so sánh hơn<br>
    </p>
    </p>
    <br><br><br><br>
    <p style="float: left; font-size: 17px; margin-left: 200px;">
        <img src="{{asset('image/img3.png')}}">
    <p style="position: relative;margin-left: 500px;">
        <b style="font-size: 20px; margin-left: 20px;">Phương thức thanh toán an toàn và linh hoạt</b><br/>
        Giao dịch trực tuyến an toàn với nhiều lựa chọn như thanh toán tại cửa <br>
        hàng tiện lợi, chuyển khoản ngân hàng, thẻ tín dụng đến Internet <br>
        Banking. Không tính phí giao dịch..<br>
    </p>
    </p>
</div>
<div class="container">
    <div style="height: 2px; background-color: rgba(64,58,28,0.22);"></div>
</div>
<div class="container" style="padding-top: 50px; padding-bottom: 20px;">
    <b style=" font-size: 20px; opacity: 0.7; text-transform: uppercase;margin-left: 450px;">
        Điểm đến phổ biến
    </b>
    <br><br><br><br>
    <div class="row" style="margin-left: 200px;">
        <div class="col col-sm-4">
            <ul>
                <li>
                    <a href="/ticket">Vé máy bay đi Đà Nẵng</a>
                </li>
                <li>
                    <a href="/ticket">Vé máy bay đi Phú Quốc</a>
                </li>
                <li>
                    <a href="/ticket">Vé máy bay đi Nha Trang</a>
                </li>
                <li>
                    <a href="/ticket">Vé máy bay đi Hà Nội</a>
                </li>
                <li>
                    <a href="/ticket">Vé máy bay đi Đà Lạt</a>
                </li>
            </ul>
        </div>
        <div class="col col-sm-4" style="position: relative; margin-left: 100px;">
            <ul>
                <li>
                    <a href="/ticket">Vé máy bay đi Vinh</a>
                </li>
                <li>
                    <a href="/ticket">Vé máy bay đi Hải Phòng</a>
                </li>
                <li>
                    <a href="/ticket">Vé máy bay đi Côn Đảo</a>
                </li>
                <li>
                    <a href="/ticket">Vé máy bay đi Sài Gòn</a>
                </li>
                <li>
                    <a href="/ticket">Vé máy bay đi Quy Nhơn</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container" style="padding-top: 50px; padding-bottom: 20px;">
    <b style=" font-size: 20px; opacity: 0.7; text-transform: uppercase;margin-left: 450px;">
        Chặng bay hàng đầu
    </b>
    <br><br><br><br>
    <div class="row" style="margin-left: 200px;">
        <div class="col col-sm-4">
            <ul>
                <li>
                    <a href="/ticket">Sài Gòn-Hà Nội</a>
                </li>
                <li>
                    <a href="/ticket">Sài Gòn-Đà Nẵng</a>
                </li>
                <li>
                    <a href="/ticket">Sài Gòn-Phú Quốc</a>
                </li>
                <li>
                    <a href="/ticket">Sài Gòn-Nha Trang</a>
                </li>
                <li>
                    <a href="/ticket">Sài Gòn-Đà Lạt</a>
                </li>
                <li>
                    <a href="/ticket">Hà Nội-Sài Gòn</a>
                </li>
                <li>
                    <a href="/ticket">Hà Nội-Phú Quốc</a>
                </li>
            </ul>
        </div>
        <div class="col col-sm-4" style="position: relative; margin-left: 100px;">
            <ul>
                <li>
                    <a href="/ticket">Hà Nội-Đà Nẵng</a>
                </li>
                <li>
                    <a href="/ticket">Hà Nội-Nha Trang</a>
                </li>
                <li>
                    <a href="/ticket">Hà Nội-Đà Lạt</a>
                </li>
                <li>
                    <a href="/ticket">Đà Nẵng-Hà Nội</a>
                </li>
                <li>
                    <a href="/ticket">Đà Nẵng-Sài Gòn</a>
                </li>
                <li>
                    <a href="/ticket">Vinh-Sài Gòn</a>
                </li>
                <li>
                    <a href="/ticket">Đà Nẵng-Đà Lạt</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid" style="position:fixed;top: 0;z-index: 10;">
    <div class="row">
        <div class="col col-sm-3" id="menu">
            <nav class="navbar bg-light menu-item">
                <a class="navbar-brand link-item" href="/">
                    <i class="fas fa-home"></i>
                    Trang chủ
                </a>
            </nav>
            <nav class="navbar bg-light menu-item">
                <a class="navbar-brand link-item" href="/cart">
                    <i class="fas fa-clipboard-list" style="color: #37c337;"></i>
                    Đặt chỗ của tôi
                </a>
            </nav>
            <nav class="navbar bg-light menu-item">
                <a class="navbar-brand link-item" href="https://www.facebook.com/vannguyen.manh.566">
                    <i class="fas fa-phone"></i>
                    Liên hệ với chúng tôi
                </a>
            </nav>
            <nav class="navbar bg-light menu-item">
                <a class="navbar-brand link-item" href="https://www.facebook.com/vannguyen.manh.566">
                    <i class="material-icons">help_outline</i>
                    Trợ giúp
                </a>
            </nav>
            <nav class="navbar bg-light menu-item">
                <a class="navbar-brand link-item" href="/">
                    <i class="fas fa-percent" style="color: #ff6001;"></i>
                    Khuyến mại
                </a>
            </nav>
            <nav class="navbar bg-light menu-item">
                <a class="navbar-brand link-item" href="/ticket">
                    <i class="fas fa-plane-departure" style="color: #30c5f7;"></i>
                    Vé máy bay
                </a>
            </nav>
            <nav class="navbar bg-light menu-item">
                <a class="navbar-brand link-item" href="/hotel">
                    <i class="fas fa-building" style="color: #235d9f;"></i>
                    Khách sạn
                </a>
            </nav>
        </div>
        <div class="col col-sm-9" id="disable_bg">
            <button type="button" class="btn btn-danger" style="color: white;">X</button>
        </div>
    </div>
</div>
<div id="user">
    <div>
        <b>Thông tin khách hàng</b>
        <i class="fas fa-user-edit"></i>
    </div>
    <div id="fullname">
        Name: {{Session::get('name')}}
    </div>
    <div id="username">
        Username: {{Session::get('username')}}
    </div>
    <div id="usercontact">
        Contact: {{Session::get('phone')}}
    </div>
    <div><a href="/change">Đổi mật khẩu?</a></div>
    <div id="logout">
        <a href="/logout">
            <button class="btn btn-danger" title="Đăng xuất">
                <i class="fas fa-power-off"></i>
            </button>
        </a>
    </div>
</div>
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-3">
                <b>TripsVN</b>
                <br /><br />
                <p>
                    Ứng dụng đặt phòng, tìm kiếm địa điểm du lịch chất lượng. <br/>
                    TripsVN liên kết với các đối tác uy tín, nhằm đem lại cho khách hàng
                    sự thoải mái khi sử dụng dịch vụ!
                </p>
                <i class="fas fa-phone">
                    039 856 6421
                </i>
                <br/>
                <i class="fas fa-mail-bulk">
                    manh117bg@gmail.com
                </i>
                <br><br/>
                <a href="https://www.facebook.com/vannguyen.manh.566">
                    <i class="fa fa-facebook-official contact"></i>
                </a>
                <a href="#">
                    <i class="fab fa-instagram contact"></i>
                </a>
                <a href="#">
                    <i class="fab fa-twitter-square contact"></i>
                </a>
                <a href="#">
                    <i class="fab fa-youtube contact"></i>
                </a>
            </div>
            <div class="col col-md-3">
                <b>TripsVn-Services</b>
                <ul>
                    <li>
                        <a href="/ticket" class="contact service">Vé máy bay</a>
                    </li>
                    <li>
                        <a href="/hotel" class="contact service">Khách sạn</a>
                    </li>
                    <li>
                        <a href="/cart" class="contact service">Đã đặt</a>
                    </li>
                    <li>
                        <a href="/" class="contact service">Khuyến mại</a>
                    </li>
                    <li>
                        <a href="/" class="contact service">Tìm kiếm địa điểm thú vị</a>
                    </li>
                </ul>
            </div>
            <div class="col col-md-3">
                <b>Send report to us by</b>
                <br>
                <i class="fas fa-mail-bulk">
                    manh117bg@gmail.com
                </i>
                <br>
                <div style="width: 200px; height: 200px;">
                </div>
            </div>
        </div>
    </div>
    <div class="bg-dark" style="color: white;">Copyright © 2020 TripsVN</div>
</footer>
</body>
</html>
