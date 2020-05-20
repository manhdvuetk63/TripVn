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
    <link rel="stylesheet" href="{{asset('lib/jquery-ui.css')}}">
    <script src="{{asset('lib/jquery-1.12.4.js')}}"></script>
    <script src="{{asset('lib/jquery-ui.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/commonStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/hanoiStyle.css')}}">
    <script type="text/javascript" src="{{asset('js/commonJs.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/clockStyle.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('image/icon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Liu+Jian+Mao+Cao&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Liu+Jian+Mao+Cao&display=swap" rel="stylesheet">
    <title>Thủ đô Hà Nội</title>
</head>
<body>
<header class="fixed-top" style="z-index: 2; position: absolute;">
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
<div class="container" id="hanoiblog">
    <h5>Khám phá vẻ đẹp dịu dàng của thủ đô Hà Nội</h5>
    <br/>
    <br/>
    <br/>
    <p>
        Tạm rời chốn xa hoa nơi Sài Gòn náo nhiệt và sôi nổi.
        Đến thăm một nơi mà mang một vẻ đẹp yên bình cùng cuộc sống chậm rãi, nhẹ nhàng.
        Một Hà Nội khiến lòng người say đắm và mê mẩn.
    </p>
    <br>
    <img src="{{asset('image/hn1.jpg')}}">
    <br/>
    <p>
        Nếu bạn đang ấp ủ dự định cho chuyến đi ngắn hạn cùng bạn bè và những người thân yêu.
        Săn vé máy bay giá rẻ đến thủ đô Hà Nội là điểm lý tưởng nhất.
        Hơn hết, quý du khách sẽ có một chuyến đi đầy thú vị và để lại ấn tượng tuyệt vời.
    </p>
    <p>
        Một thủ đô ẩn hiện trong khí trời se lạnh cùng những ánh nắng ban mai.
        Không khí dần trở nên ấm hơn cùng thời gian trôi yên bình.
        Chắc chắn những muộn phiền trong cuộc sống hàng ngày sẽ được êm đềm trôi theo.
    </p>
    <p style="font-weight: bold; font-style: italic">Hà Nội và những địa danh tham quan nổi tiếng</p>
    <p style="font-weight: bold;">Hồ Hoàn Kiếm</p>
    <br/>
    <p>Nằm ngay trung tâm và được mệnh danh là trái tim của thủ đô Hà Nội.
        Với không gian trong lành và thoáng đãng,
        là một nơi được đông đáo khách du lịch trong và ngoài nước ưa thích.
    </p>
    <img src="{{asset('image/hn2.jpg')}}">
    <br/>
    <p>
        Bên cạnh đó, giới trẻ và các đôi tình nhân chọn là địa điểm cho ra những bức ảnh cưới đầy lãng mạn.
        Hồ Hoàn Kiếm trong lành là trái tim của thủ đô xinh đẹp.
    </p>
    <img src="{{asset('image/hn4.jpg')}}">
    <br>
    <p style="font-weight: bold">
        Phố cổ Hà Nội
    </p>
    <p>
        Mang đậm lối kiến trúc của người Pháp ở thế kỉ 19.
        Những ngôi nhà, con đường và từng ngóc ngách của con phố nơi thủ đô yên tĩnh.
        Đây là linh hồn và là điểm đặc trưng mà chỉ có thủ đô mới có được.
    </p>
    <img src="{{asset('image/hn5.jpg')}}">
    <br>
    <p>
        Đến đây, bạn sẽ cảm nhận được trọn vẹn nhịp sống chậm rãi và yên bình nhất tại Hà Nội.
        Dòng xe thưa thớt và nếp sống của người dân nơi đây dưới những cái nắng dịu nhẹ ươm vàng chiếu rọi.
        Tất cả như hiện lên một bức tranh miêu tả những nét đẹp có từ rất lâu đời.
    </p>
    <img src="{{asset('image/hn1.jpg')}}">
    <p style="font-weight: bold">
        Chợ Đồng Xuân
    </p>
    <p>
        Hễ nhắc đến thành phố Hồ Chí Minh sẽ nhắc đến cái tên chợ Bến Thành.
        Vì thế, một thủ đô đất nước cũng có được cho mình khu chợ nổi tiếng bậc nhất chính là chợ Đồng Xuân.
    </p>
    <img src="{{asset('image/hn6.jpg')}}">
    <br>
    <p>
        Nét riêng nơi đây là khu chợ chỉ mở và buổi tối và phục vụ chủ yếu cho khách du lịch ghé thăm.
        Bạn có thể mua sắm những món đồ: vải vóc, đồ gia dụng,… và các món ăn đặc sản nơi Hà Thành dịu dàng và nên thơ.
    </p>
    <p style="margin-top: 50px; font-style: italic;">
        Nguồn: Internet
    </p>
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
