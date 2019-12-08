<section class="content-header">
	
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h4>Data Kategori Produk</h4>
		</div>
		<div class="box-tools">
			<div class="col-md-4">
				<a class="btn btn-success btn-sm" href="{{URL::to('')}}/kategoriproduk/add"><i class="fa fa-plus"></i></a>
			</div>
			<form id="frm_katproduk">
				{{csrf_field()}}
				<div class="col-md-4">
					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control" id="filter" name="filter">
								<option value="">No Filter</option>
								<option value="Nama_kategori_produk">Kategori Produk</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-group">
							<input type="text" name="valuefilter" id="valuefilter" class="form-control" placeholder="Input Filter">
							<span class="input-group-btn">
								<button type="button" class="btn btn-default" onclick="loadkatproduk()"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="col-md-4 pull-right">
					<select class="form-control" id="jumlahdata" name="jumlahdata" onchange="loadkatproduk()">
						<option>10</option>
						<option>25</option>
						<option>50</option>
					</select>
					</div>
				</div>
			</form>
		</div>
		<div class="box-body" id="datakatproduk">

		</div>
	</div>
</section>

<script type="text/javascript">
	loadkatproduk();
	function loadkatproduk() {
		$.ajax({
			url : '{{URL::to("")}}/kategoriproduk/data',
			method : 'get',
			data : $('#frm_katproduk').serialize(),
			error: function(result){
				alert(result);
			},
			success: function(data) {
				$('#datakatproduk').html(data);
			}
		})
	}

	function hapusdata(id) {
		var konfirmasi = confirm('HAPUS DATA?');
		if (!konfirmasi) return;
		$.ajax({
			url : '{{URL::to("")}}/kategoriproduk/delete',
			method : 'post',
			data : {
				'id' : id,
				'_token' : '{{csrf_token()}}'
			},
			error: function(result){
				alert(result);
			},
			success: function(data) {
				loadkatproduk();
			}
		})
	}
</script>