<div class="header">
	<div class="header-top">
		<div class="container">
			<div class="col-sm-4 logo animated wow fadeInLeft" data-wow-delay=".5s">
			<h1><a href="{{URL::to('')}}">Youth <span>Fashion</span></a></h1>	
			</div>
			<div class="col-sm-4 world animated wow fadeInRight" data-wow-delay=".5s">
				<div class="cart box_1">
					<a href="{{URL::to('')}}/checkout">
						<h3> <div class="total">
							<span class="simpleCart_total"></span></div>
							<img src="{{URL::to('')}}/images/cart.png" alt=""/></h3>
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>

					</div>
				</div>
				<div class="col-sm-2 number animated wow fadeInRight" data-wow-delay=".5s">
					<span><i class="glyphicon glyphicon-phone"></i>085 596 234</span>
					<p>Call me</p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="head-top">
				<div class="n-avigation">

					<nav class="navbar nav_bottom" role="navigation">

						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header nav_2">
							<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#"></a>
						</div> 
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav nav_1">
								<li><a href="{{URL::to('')}}">Home</a></li>
								<li class="dropdown mega-dropdown active">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories<span class="caret"></span></a>				
									<div class="dropdown-menu">
										<ul class="nav-list">
											@foreach(Settings::getKatproduk() as $katproduk)
											<li><a href="{{URL::to('')}}/list-produk?katproduk={{$katproduk->id}}">{{$katproduk->Nama_kategori_produk}}</a></li>
											@endforeach
										</ul>
										
										<!-- Nav tabs -->

									</div>				
								</li>
								<li><a href="{{URL::to('')}}/list-produk">Products</a></li>
								<li><a href="{{URL::to('')}}/artikel">Artikel</a></li>
								<li class="last"><a href="{{URL::to('')}}/aboutus">About us</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->

					</nav>
				</div>
			</div>
		</div>