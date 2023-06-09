<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewpport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cetak Kartu Member</title>

	<style>
        .box {
            position: relative;
        }
        .card {
            width: 85.60mm;
        }
        .logo {
            position: absolute;
            top: 3pt;
            right: 0pt;
            font-size: 18pt;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            color: #fff !important;
        }
        .logo p {
            text-align: right;
            margin-right: 16pt;
        }
        .logo img {
            position: absolute;
            top: 50pt;
            width: 40px;
            height: 40px;
            right: 16pt;
        }
        .nama {
            position: absolute;
            top: 90pt;
            right: 16pt;
            font-size: 12pt;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 500;
            color: #fff !important;
        }
        .telepon {
            position: absolute;
            top: 110pt;
            right: 16pt;
            font-size: 9pt;
            font-family: Arial, Helvetica, sans-serif;
            color: #fff;
        }
        .barcode {
            position: absolute;
            top: 90pt;
            left: .860rem;
            border: 1px solid #fff;
            padding: .5px;
            background: #fff;
        }
        .text-left {
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
	<section style="border:1px solid #fff;">
		<table width="100%">
			@foreach ($datamember as $key => $data):				
			<tr>
					@foreach ($data as $item):
						<td>
							<div class="box">
								<img src="{{asset($setting->path_kartu_member)}}" alt="card" class="card">
								<div class="logo">
									<p>{{$setting->nama_perusahaan}}</p>
									<img src="{{asset($setting->path_logo)}}" alt="logo">
								</div>
								<div class="nama">{{$item->nama_member}}</div>
								<div class="telepon">{{$item->telepon}}</div>
								<div class="barcode text-left">
									<img src="data:image/png;base64, {{DNS2D::getBarcodePNG("$item->id_member", 'QRCODE')}}" alt="qrcode" height="45" width="45">
								</div>
							</div>
						</td>

                        {{-- jika yang tercetak hanya satu member --}}
                        @if (count($datamember) == 1)
                        <td class="text-center" style="width: 50%;"></td>
                        @endif
					@endforeach
				</tr>
			@endforeach
		</table>
	</section>

</body>
</html>