@push('css')
<link rel="stylesheet" href="{{ asset('css/Chart.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('js/Chart.bundle.min.js') }}"></script>
@endpush

@push('script')
<script>
	$(function(){
		$('#dt').DataTable({
			"language": {
				"lengthMenu": "Menampilkan _MENU_ baris data per halaman",
				"zeroRecords": "Tidak ada data",
				"info": "Menampilkan halaman _PAGE_ dari _PAGES_",
				"infoFiltered": "(filtered from _MAX_ total records)",
				"infoEmpty":      "Menampilkan 0 data",
				"search":'Pencarian',
				"paginate": {
					"previous": "Sebelumnya",
					"next":"Selanjutnya"
				}
			}
		} );
	});
</script>
@endpush