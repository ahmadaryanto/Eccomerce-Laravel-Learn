<table class="table table-bordered">
	<thead>
		<tr>
			<th>Menu</th>
			<th>Nama Menu</th>
			<th>Grup Menu</th>
			<th width="10%">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($data as $dt)
			<tr>
				<td>{{$dt->menu}}</td>
				<td>{{$dt->nama_menu}}</td>
				<td>{{$dt->namagrupmenu}}</td>
				<td>
					<a href="{{URL::to('')}}/menu/edit/{{$dt->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
					<button type="button" class="btn btn-danger" onclick="hapusdata('{{$dt->id}}')"><i class="fa fa-trash"></i></button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

{{$data->links()}}