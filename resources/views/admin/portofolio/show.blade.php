<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV - {{ $dataPortofolio->judul }}</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #e5e7eb; color: #1f2937; }
        .toolbar { max-width: 850px; margin: 15px auto; display: flex; gap: 10px; }
        .toolbar a, .toolbar button { background: #1f2a37; color: #fff; border: 0; padding: 8px 16px; border-radius: 6px; text-decoration: none; cursor: pointer; font-size: 14px; }
        .cv { max-width: 850px; margin: 0 auto 30px; background: #fff; display: flex; min-height: 1000px; }
        .side { width: 32%; background: #1f2a37; color: #fff; padding: 30px 20px; }
        .main { width: 68%; padding: 40px 30px; }
        .foto { width: 150px; height: 150px; border-radius: 50%; object-fit: cover; display: block; margin: 0 auto 25px; border: 4px solid #fff; }
        .foto-kosong { width: 150px; height: 150px; border-radius: 50%; background: #374151; margin: 0 auto 25px; }
        .badge { background: #e6c35c; color: #1f2a37; font-weight: bold; font-size: 13px; padding: 6px 16px; border-radius: 0 20px 20px 0; margin: 20px 0 12px -20px; display: inline-block; }
        .side p { font-size: 12px; line-height: 1.6; margin-bottom: 8px; }
        .nama { font-size: 34px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; }
        .sub { font-style: italic; font-size: 18px; color: #4b5563; margin-bottom: 25px; }
        h3 { font-size: 15px; border-bottom: 2px solid #1f2a37; padding-bottom: 4px; margin: 22px 0 10px; text-transform: uppercase; }
        .main p, .main li { font-size: 13px; line-height: 1.6; }
        .main ul { padding-left: 18px; }
        .row { display: flex; justify-content: space-between; font-size: 13px; margin-bottom: 8px; }
        @media print {
            body { background: #fff; }
            .toolbar { display: none; }
            .cv { margin: 0; max-width: 100%; }
            * { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        }
    </style>
</head>
<body>

    <div class="toolbar">
        <a href="{{ route('portofolio.index') }}">&larr; Kembali</a>
        <button onclick="window.print()">Cetak / Simpan PDF</button>
    </div>

    <div class="cv">
        <div class="side">
            @if ($dataPortofolio->gambar)
                <img class="foto" src="{{ asset('uploads/' . $dataPortofolio->gambar) }}" alt="Foto">
            @else
                <div class="foto-kosong"></div>
            @endif

            <span class="badge">DATA DIRI</span>
            @foreach (explode(';', $dataPortofolio->data_diri) as $item)
                @if (trim($item) != '')
                    <p>{{ trim($item) }}</p>
                @endif
            @endforeach

            <span class="badge">KONTAK</span>
            @foreach (explode(';', $dataPortofolio->kontak) as $item)
                @if (trim($item) != '')
                    <p>{{ trim($item) }}</p>
                @endif
            @endforeach

            <span class="badge">SOSIAL MEDIA</span>
            @foreach (explode(';', $dataPortofolio->sosial_media) as $item)
                @if (trim($item) != '')
                    <p>{{ trim($item) }}</p>
                @endif
            @endforeach
        </div>

        <div class="main">
            <div class="nama">{{ $dataPortofolio->judul }}</div>
            <div class="sub">Curriculum Vitae</div>

            <h3>Tentang Saya</h3>
            <p>{{ $dataPortofolio->tentang_saya }}</p>

            <h3>Pendidikan</h3>
            @foreach (explode(';', $dataPortofolio->pendidikan) as $item)
                @if (trim($item) != '')
                    @php $bagian = array_pad(explode('|', $item), 2, ''); @endphp
                    <div class="row">
                        <span>{{ trim($bagian[0]) }}</span>
                        <span>{{ trim($bagian[1]) }}</span>
                    </div>
                @endif
            @endforeach

            <h3>Pengalaman Kerja</h3>
            <ul>
                @foreach (explode(';', $dataPortofolio->pengalaman_kerja) as $item)
                    @if (trim($item) != '')
                        <li>{{ trim($item) }}</li>
                    @endif
                @endforeach
            </ul>

            <h3>Kemampuan</h3>
            <ul>
                @foreach (explode(';', $dataPortofolio->kemampuan) as $item)
                    @if (trim($item) != '')
                        <li>{{ trim($item) }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

</body>
</html>