
<!DOCTYPE html><html
lang="vi-VN"><head><meta
name="robots" content="noindex" /><meta
charset="utf-8"><title>Chi tiết website</title><meta
name="description" content="Phần mềm quản lý bán hàng, thiết kế webiste chuyên nghiệp"><meta
name="keywords" content="Phần mềm quản lý bán hàng, thiết kế webiste chuyên nghiệp"><meta
name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><link
href="/css/fontAwesome/font-awesome-4.7.0.min.css" media="screen" rel="stylesheet" type="text/css"><link
href="/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css"><link
href="/css/style.css" media="screen" rel="stylesheet" type="text/css"><link
href="/css/bootstrap-responsive.min.css" media="screen" rel="stylesheet" type="text/css"><script type="text/javascript" src="/js/jquery/1.9.1.min.js"></script> <script type="text/javascript" src="/js/bootstrap.min.js"></script> <!--[if lt IE 9]><script type="text/javascript" src="/js/html5.js"></script><![endif]--></head><body><div
class="container"><style type="text/css">.container {
	width: 100%;
}
#devices {
	background: #30373b;
	padding: 3px 0;
	text-align: center;
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	z-index: 999;
}

#devices a {
	color: #a9a9a9;
	font-weight: bold;
	padding: 0 15px;
	display: inline-block;
}

#devices a i {
	font-size: 25px;
	padding-right: 10px;
	vertical-align: middle;
}
#devices a.active,
#devices a:hover {
    color: #fff;
	cursor: pointer;
	text-decoration: none;
}
#devices a {
	border-radius: 0;
	border: none;
}

.websiteDetail {
	width: 100%;
    height: calc(100% - 41px);
    position: absolute;
    top: 40px;
    display: flex;
	justify-content: center;
	display: -webkit-flex;
	justify-content: -webkit-center;
}

.websiteDetail iframe {
	position: absolute;
    top: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    border: none;
}

.dMobile iframe {
	width: 414px;
	max-height: 568px;
}

#errWeb {
	text-align: center;
	padding: 50px;
	font-size: 17px;
}
#errWeb h1 {
	font-size: 30px;
	color: #333;
}
#devices>i {
	color: #fff;
    font-size: 15px;
    position: absolute;
    top: 12px;
    right: 20px;
}
@media screen and (max-width: 768px) {
    .dMobile iframe {
    	max-height: 100%;
    }
}
@media screen and (max-width: 500px) {
    .dMobile iframe {
    	width: 100%;
    	max-height: 100%;
    	border: none;
    }
    .websiteDetail {
        height: 100%;
    	top: 0;
    	left:0;
    	display: block;
    }
    #devices {
        display:none;
    }
    body {
        padding: 0;
    }
}</style><div
id="devices">
<a
href="javascript:void(0)" class="active desktop"><i
class="fa fa-desktop"></i> Desktop</a>
<a
href="javascript:void(0)" class="mobile"><i
class="fa fa-mobile" style="font-size: 35px;"></i> Mobile</a>
<i
class="fa fa-times" aria-hidden="true"></i></div><div
class="websiteDetail">
<iframe
src="http://nexshop.vn" class="device-preview__iframe"></iframe></div> <script type="text/javascript">$('#devices>i.fa-times').click(function(){
    	$('#devices').css('display', 'none');
    	$('.websiteDetail').css({'height':'100%','top': '0'});
    });
    $('#devices a').click(function(){
    	$('#devices a').removeClass('active');
		$(this).addClass('active');
    });
    $('.desktop').click(function(){
    	$('.websiteDetail').removeClass('dMobile');
    });
    $('.mobile').click(function(){
		$('.websiteDetail').addClass('dMobile');
    });</script> </div></body></html>