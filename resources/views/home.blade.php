<?php
use Illuminate\Support\Facades\Session;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('lib/bootstrap.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="{{asset('lib/jquery.min.js')}}"></script>
    <script src="{{asset('lib/popper.min.js')}}"></script>
    <script src="{{asset('lib/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('lib/jquery-ui.css')}}">
    <script src="{{asset('lib/jquery-1.12.4.js')}}"></script>
    <script src="{{asset('lib/jquery-ui.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/clockStyle.css')}}">
    <script type="text/javascript" src="{{asset('js/myJS.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/commonJs.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/clockStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/commonStyle.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('image/icon.png')}}">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Liu+Jian+Mao+Cao&display=swap" rel="stylesheet">
    <title>
        TripsVN - Ứng dụng quản lý du lịch
    </title>
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
            <nav class="navbar bg-light menu-item">
                <a class="navbar-brand link-item" href="/banking">
                    <i class="fab fa-cc-mastercard" style="color: #ff6001;"></i>
                    Banking
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
<div class="container" style="height: 2px; background-color: rgba(64,58,28,0.22); margin-top: 100px;"></div>
<div class="container" style="margin-top: 150px; margin-left: 550px;">
    <b style=" font-size: 20px; opacity: 0.7;">KHUYẾN MẠI DÀNH RIÊNG CHO KHÁCH HÀNG MỚI</b>
</div>
<div class="d-flex flex-row container" id="voucher">
    <a href="#">
        <div class="p-2" style="background-image: url('../image/km1.jpg');"></div>
    </a>

    <a href="#">
        <div class="p-2" style="background-image: url('../image/km2.jpg'); margin-left: 20px;"></div>
    </a>

    <a href="#">
        <div class="p-2" style="background-image: url('../image/km3.jpg'); margin-left: 20px;"></div>
    </a>

    <a href="#">
        <div class="p-2" style="background-image: url('../image/km4.jpg'); margin-left: 20px;"></div>
    </a>
</div>
<div class="container">
    <div style="height: 2px; background-color: rgba(64,58,28,0.22); margin-top: 100px;"></div>
</div>
<div class="container" style="margin-top: 50px; margin-left: 550px; margin-bottom: 50px;">
    <b style=" font-size: 20px; opacity: 0.7; text-transform: uppercase; ">REVIEW ĐỊA ĐIỂM HẤP DẪN MÙA HÈ NÀY</b>
</div>
<div class="container">
    <div class="card card-common" id="card1">
        <div class="card-title">
            <button class="btn btn-info" id="showDown1">
                <i class="fas fa-angle-double-down"></i>
            </button>
            <button class="btn btn-info" id="hideUp1">
                <i class="fas fa-angle-double-up"></i>
            </button>
        </div>
        <div class="card-body">
            <img class="card-img-top" id="blog1" src="{{asset('image/dalat.jpg')}}">
        </div>
        <a href="/blog/dalat">
            <div class="card-footer" id="footer1">Resort xanh tại Đà Lạt</div>
        </a>
    </div>
    <div class="card card-common" id="card2">
        <div class="card-title">
            <button class="btn btn-info" id="showDown2">
                <i class="fas fa-angle-double-down"></i>
            </button>
            <button class="btn btn-info" id="hideUp2">
                <i class="fas fa-angle-double-up"></i>
            </button>
        </div>
        <div class="card-body">
            <img class="card-img-top" id="blog2" src="{{asset('image/phuquoc.jpg')}}">
        </div>
        <a href="/blog/phuquoc">
            <div class="card-footer" id="footer2">Bãi biển Phú Quốc</div>
        </a>
    </div>
    <div class="card card-common" id="card3">
        <div class="card-title">
            <button class="btn btn-info" id="showDown3">
                <i class="fas fa-angle-double-down"></i>
            </button>
            <button class="btn btn-info" id="hideUp3">
                <i class="fas fa-angle-double-up"></i>
            </button>
        </div>
        <div class="card-body">
            <img class="card-img-top" id="blog3" src="{{asset('image/goldbridge.jpg')}}">
        </div>
        <a href="/blog/danang">
            <div class="card-footer" id="footer3">Gold Bridge Đà Nẵng</div>
        </a>
    </div>
</div>
<div class="container">
    <div style="height: 2px; background-color: rgba(64,58,28,0.22); margin-top: 400px;"></div>
</div>
<div class="container" style="margin-top: 50px; margin-left: 550px; margin-bottom: 50px;">
    <b style=" font-size: 20px; opacity: 0.7; text-transform: uppercase; ">Tại sao nên đặt chỗ với TripsVN?</b>
</div>
<div class="container">
    <p style="float: left; font-size: 17px;">
        <img src="{{asset('image/search.png')}}">
        <b style="font-size: 20px; margin-left: 20px;">Đặt phòng giá rẻ với những ưu đãi đặc biệt dành riêng cho ứng dụng</b><br/>
        TripsVN - Đặt phòng trực tuyến để nhận được giá tốt nhất với các <br/>khuyến mại tuyệt vời!<br/>
        Tìm kiếm địa điểm du lịch lý thú<br/><br/><br/><br/>
    </p>
</div>
<div class="container" style="margin-left: 500px;">
    <p style="float: left; font-size: 17px;">
        <img src="{{asset('image/credit.png')}}" style="float: right;">
        <b style="font-size: 20px; margin-left: 20px;">Phương thức thanh toán an toàn và linh hoạt</b><br/>
        Giao dịch trực tuyến an toàn với nhiều lựa chọn như thanh toán tại cửa <br/>hàng
        tiện lợi, chuyển khoản ngân hàng, thẻ tín dụng đến Internet Banking. Không tính phí giao dịch.<br/><br/><br/><br/>
    </p>
</div>
<div class="container">
    <p style="float: left; font-size: 17px;">
        <img src="{{asset('image/chat.png')}}">
        <b style="font-size: 20px; margin-left: 20px;">Hỗ trợ khách hàng 24/7</b><br/>
        Đội ngũ nhân viên hỗ trợ khách hàng luôn sẵn sàng giúp đỡ bạn trong<br>
        từng bước của quá trình đặt vé!<br/><br/><br/><br/>
    </p><br>
</div>
<div class="container" style="margin-left: 400px;">
    <p style="float: left; font-size: 17px;">
        <img src="{{asset('image/vote.png')}}" style="float: right;">
        <b style="font-size: 20px; margin-left: 20px;">Khách thực, đánh giá thực</b><br/>
        Hơn 10.000.000 đánh giá, bình chọn đã được xác thực từ du khách sẽ giúp bạn đưa ra lựa chọn đúng đắn.
    </p>
</div>
<div class="clear"></div>
<div class="container">
    <div style="height: 2px; background-color: rgba(64,58,28,0.22); margin-top: 100px;"></div>
</div>
<div class="container" style="margin-top: 50px; margin-left: 550px; margin-bottom: 50px;">
    <b style=" font-size: 20px; text-transform: uppercase; ">Bạn muốn khám phá điều gì?</b>
</div>
<ul id="discover" style="position: absolute; left: 13%;">
    <li id="more1" style="color: green;">Các chặng bay và hãng bay hàng đầu</li>
    <li id="more2">Các khách sạn hàng đầu</li>
    <li id="more3">Combo Vé máy bay và Khách sạn</li>
    <li id="more4">Hoạt động Tham quan và Giải trí</li>
</ul>
<div class="container" style="padding-top:  50px;margin-bottom: 150px;">
    <table class="table table-borderless table-dark">
        <tbody>
        <tr>
            <td>
                <a href="/ticket" >Vé máy bay đi Đà Nẵng</a>
            </td>
            <td>
                <a href="/ticket" >Vé máy bay Sài Gòn-Hà Nội</a>
            </td>
            <td>
                <a href="/ticket" >Vé máy bay Hà Nội-Sài Gòn</a>
            </td>
            <td>
                <a href="/ticket" >Vé máy bay đi Đà Nẵng-Hà Nội</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="/ticket" >Vé máy bay đi Phú Quốc</a>
            </td>
            <td>
                <a href="/ticket" >Vé máy bay Sài Gòn-Đà Nẵng</a>
            </td>
            <td>
                <a href="/ticket" >Vé máy bay Đà Nẵng-Sài Gòn</a>
            </td>
            <td>
                <a href="/ticket" >Vé máy bay đi Hà Nội-Phú Quốc</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="/ticket" >Vé máy bay đi Nha Trang</a>
            </td>
            <td>
                <a href="/ticket" >Vé máy bay Sài Gòn-Phú Quốc</a>
            </td>
            <td>
                <a href="/ticket" >Vé máy bay Hà Nội-Đà Nẵng</a>
            </td>
            <td>
                <a href="/ticket" >Vé máy bay đi Hà Nội-Nha Trang</a>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="table table-borderless table-dark" style="display: none;">
        <tbody>
        <tr>
            <td>
                <a href="/hotel" >Khách sạn Vũng Tàu</a>
            </td>
            <td>
                <a href="/hotel" >Khách sạn Nha Trang</a>
            </td>
            <td>
                <a href="/hotel" >Khách sạn Phan Thiết</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="/hotel" >Khách sạn Đà Lạt</a>
            </td>
            <td>
                <a href="/hotel" >Khách sạn Hội An</a>
            </td>
            <td>
                <a href="/hotel" >Khách sạn Phú Quốc</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="/hotel" >Khách sạn Đà Nẵng</a>
            </td>
            <td>
                <a href="/hotel" >Khách sạn Sa Pa</a>
            </td>
            <td>
                <a href="/hotel" >Khách sạn Quy Nhơn</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="/hotel" >Khách sạn Hồ Chí Minh</a>
            </td>
            <td>
                <a href="/hotel" >Khách sạn Hà Nội</a>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="table table-borderless table-dark" style="display: none;">
        <tbody>
        <tr>
            <td>
                <a href="#" >Combo du lịch TP Hồ Chí Minh</a>
            </td>
            <td>
                <a href="#" >Combo du lịch Đà Nẵng</a>
            </td>
            <td>
                <a href="#" >Combo du lịch Nha Trang</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="/ticket" >Vé máy bay đi Đà Nẵng</a>
            </td>
            <td>
                <a href="/ticket" >Vé máy bay Sài Gòn-Hà Nội</a>
            </td>
            <td>
                <a href="/ticket" >Vé máy bay Hà Nội-Sài Gòn</a>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="table table-borderless table-dark" style="display: none;">
        <tbody>
        <tr>
            <td>
                <a href="#">Hoạt động tham quan và giải trí tại TP.HCM</a>
            </td>
            <td>
                <a href="#">Hoạt động tham quan và giải trí tại Hà</a>
            </td>
            <td>
                <a href="#">Hoạt động tham quan và giải trí tại Hội An</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="#">Hoạt động tham quan và giải trí tại Phú Quốc</a>
            </td>
            <td>
                <a href="#">Hoạt động tham quan và giải trí tại Đà Nẵng</a>
            </td>
            <td>
                <a href="#">Hoạt động tham quan và giải trí tại Sa Pa</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="#">Hoạt động tham quan và giải trí tại Nha Trang</a>
            </td>
            <td>
                <a href="#">Hoạt động tham quan và giải trí tại Hà Giang</a>
            </td>
            <td>
                <a href="#">Hoạt động tham quan và giải trí tại Đà Lạt</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="#">Hoạt động tham quan và giải trí tại Ninh Bình</a>
            </td>
        </tr>
        </tbody>
    </table>
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
