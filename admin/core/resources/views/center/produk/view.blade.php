<section class="content-header">
	
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h4>Data Produk</h4>
		</div>
		<div class="box-tools">
			<div class="col-md-4">
				<a class="btn btn-success btn-sm" href="{{URL::to('')}}/produk/add"><i class="fa fa-plus"></i></a>
			</div>
			<form id="frm_produk">
				{{csrf_field()}}
				<div class="col-md-4">
					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control" id="filter" name="filter">
								<option value="">No Filter</option>
								<option value="nama_produk">Nama Produk</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-group">
							<input type="text" name="valuefilter" id="valuefilter" class="form-control" placeholder="Input Filter">
							<span class="input-group-btn">
								<button type="button" class="btn btn-default" onclick="loadproduk()"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="col-md-4 pull-right">
					<select class="form-control" id="jumlahdata" name="jumlahdata" onchange="loadproduk()">
						<option>10</option>
						<option>25</option>
						<option>50</option>
					</select>
					</div>
				</div>
			</form>
		</div>
		<div class="box-body" id="dataproduk">

		</div>
	</div>
</section>

<script type="text/javascript">
	loadproduk();
	function loadproduk() {
		$.ajax({
			url : '{{URL::to("")}}/produk/data',
			method : 'get',
			data : $('#frm_produk').serialize(),
			error: function(result){
				alert(result);
			},
			success: function(data) {
				$('#dataproduk').html(data);
				$('.pagination a').click(function(event) {
					event.preventDefault();
					var page = $(this).attr('href');
					page = page.split('=')[1];
					loadprodukpage(page);
				});
			}
		})
	}

	function loadprodukpage(page) {
		$.ajax({
			url : '{{URL::to("")}}/produk/data?page='+page,
			method : 'get',
			data : $('#frm_produk').serialize(),
			error: function(result){
				alert(result);
			},
			success: function(data) {
				$('#dataproduk').html(data);
				$('.pagination a').click(function(event) {
					event.preventDefault();
					var page = $(this).attr('href');
					page = page.split('=')[1];
					loadprodukpage(page);
				});
			}
		})
	}

	function hapusdata(id) {
		var konfirmasi = confirm('HAPUS DATA?');
		if (!konfirmasi) return;
		$.ajax({
			url : '{{URL::to("")}}/produk/delete',
			method : 'post',
			data : {
				'id' : id,
				'_token' : '{{csrf_token()}}'
			},
			error: function(result){
				alert(result);
			},
			success: function(data) {
				loadproduk();
			}
		})
	}
</script>