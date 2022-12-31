<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cek Ongkir</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
 <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">APLIKASI CEK ONGKIR LARAVEL 9.0 </h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#">Laravel</a>
            <a class="p-2 text-dark" href="#">Codeigniter</a>
            <a class="p-2 text-dark" href="#">Jquery</a>
            <a class="p-2 text-dark" href="#">Vue Js</a>
        </nav>
        <a class="btn btn-outline-primary" target="_blank" href="https://www.youtube.com/channel/UCXFdc68srZQ-ok4I1-pHs2g?view_as=subscriber">Tahu Coding</a>
    </div>

<div class="container">
		<div class="card">
			<form action="{{url('/')}}" method='get'>
				@csrf
			<div class="card-body">
				<div class="row">
					<div class="col-sm-12">
				<div class="form-group">
					<h6>Nama Anda</h6>
					<input type="text" class="form-control" name="name">
					</div>
				</div>
			</div>
		</div>

	<div class="row">
	<div class="col-sm-6">
				<div class="form-group">
					<h6>Kirim Dari</h6>
					<select name="province_from" id="" class="form-control">
					<option value="" holder>-- Pilih Provinsi --</option>
					@foreach($provinsi as $result)
					<option value="{{$result->id}}">{{$result->province}}</option>
					@endforeach	
					</select>
	</div>
				<div class="form-group">
					<select name="origin" id="" class="form-control">
						<option value="" holder>-- Pilih Kota --</option>	
					</select>
				</div>
			</div>

	<div class="col-sm-6">
				<div class="form-group">
					<h6>Kirim Ke</h6>
					<select name="province_to" id="" class="form-control">
					<option value="" holder>-- Pilih Provinsi --</option>
					@foreach($provinsi as $result)
					<option value="{{$result->id}}">{{$result->province}}</option>
					@endforeach	
					</select>
	</div>
				<div class="form-group">
					<select name="destination" class="form-control">
						<option value="" holder>-- Pilih Kota --</option>	
					</select>
				</div>
			</div>
		</div>
	
		<div class="row">
	<div class="col-sm-6">
				<div class="form-group">
					<h6>Berat Paket</h6>
					<input type="text" class="form-control" name="weight">
					<small>Dalam gram contoh = 1700 / 1.7kg</small>
</div>
</div>
<div class="col-sm-6">
				<div class="form-group">
					<h6>Pilih Kurir</h6>
					<select name="courier" id="" class="form-control">
						<option value="" holder>--Pilih Kurir --</option>
						<option value="jne">jne</option>
						<option value="tiki">tiki</option>
						<option value="pos">pos</option>
					</select>
			</div>
		</div>
	</div>
			<div class="row">
				<div class="col">
				<div class="form-group">
				<button type="submit" class="btn btn-info btn-block">Hitung Ongkir</button>
					</div>
				</div>
			</div>
			</form>
			<div class="row">
				<div class="col">
					@foreach($cekongkir as $result)
					{{$result['service']}}
					{{$result['description']}}
					{{$result['cost'][0]['value']}}
					{{$result['cost'][0]['etd']}}
					{{$result['cost'][0]['note']}}
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

  <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="province_from"]').on('change', function () {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: 'getCity/ajax/' + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="origin"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="origin"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="origin"]').empty();
                }
            });
            $('select[name="province_to"]').on('change', function () {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: 'getCity/ajax/' + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="destination"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="destination"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="destination"]').empty();
                }
            });
        });
    </script>

</body>
</html>