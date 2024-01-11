<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Surat Pernyataan Terlambat</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 700px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            height: 750px;
        }

        .header {
            text-align: center;
            font-size: 16px;
            margin: 20px 0;
            margin-top: 70px
        }

        .header h2 {
            margin-bottom: 10px;
            font-size: 20px;
            color: black;
        }

        .header h3 {
            font-size: 18px;
            color: black;
        }
        .btn-print {
            float: LEFT;
            color: #fff;
            background-color: #f472b6;
            border: 1px solid #be185d;
            margin-bottom: 20px;
            padding: 6px 12px; 
            text-decoration: none;
            border-radius: 12px; 
            transition: background-color 0.3s;
            margin-left: 8px; 
        }


        .btn-print:hover {
            background-color: #be185d;
            border: 1px solid  #ec4899;
        
        }

        .content {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 16px;
            margin-top: 15px;
            line-height: 1.6;
            color: #333;
        }

        ul {
            padding: 0;
            margin-top: 15px;
        }

        ul li {
            list-style: none;
            margin-bottom: 10px;
            line-height: 1.6;
            font-size: 16px;
            color: #333;
        }

        ul li strong {
            display: inline-block;
            width: 120px;
            color: #333;
        }

        .footer {
            margin-top: 30px;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .signatures {
            margin-top: 30px;
            flex: 0 0 48%;
        }

        .signatures p {
            margin-bottom: 20px;
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        @if (Auth::user()->role == "ps")
            <a href="{{ route('ps.latest.rekap', ['id' => $telat->id]) }}" class="btn-print"> <svg xmlns="http://www.w3.org/2000/svg" style="width: 30px; height: 15px;" viewBox="0 0 448 512">
                <path fill="#ffff" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
            </svg></a>
        
            <a href="{{ route('ps.latest.download', ['id' => $telat->id]) }}" class="btn-print">Cetak (.pdf)</a>
        @else
            <a href="{{ route('latest.rekap', ['id' => $telat->id]) }}" class="btn-print"> <svg xmlns="http://www.w3.org/2000/svg" style="width: 30px; height: 15px;" viewBox="0 0 448 512">
                <path fill="#ffff" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
            </svg></a>
            <a href="{{ route('latest.download', ['id' => $telat->id]) }}" class="btn-print">Cetak (.pdf)</a>
        @endif 
        <div class="header">
        
            <h2>SURAT PERNYATAAN</h2>
            <h3>TIDAK AKAN DATANG TERLAMBAT KE SEKOLAH</h3>
        </div>
       
        <div class="content">
            <p>Yang bertanda tangan di bawah ini:</p>
            <ul>
                <li><strong>NIS</strong>: {{$telat->student->nis}}</li>
                <li><strong>Nama</strong>: {{$telat->student->name}} </li>
                <li><strong>Rombel</strong>: {{$telat->student->rombel->rombel}}</li>
                <li><strong>Rayon</strong>: {{$telat->student->rayon->rayon}}</li>
            </ul>
            
            <p>Dengan ini menyatakan bahwa saya telah melakukan pelanggaran tata tertib sekolah, yaitu terlambat datang ke sekolah sebanyak 3 kali yang mana hal tersebut termasuk ke dalam pelanggaran kedisiplinan. Saya berjanji tidak akan terlambat datang ke sekolah lagi. Apabila saya terlambat datang ke sekolah lagi, saya siap diberikan sanksi yang sesuai dengan peraturan sekolah.</p>
            <p>Demikian surat pernyataan terlambat ini saya buat dengan penuh penyesalan.</p>
        </div>

        <div class="footer">
            <div class="signatures">
                <p>Peserta Didik</p>
                <p>({{$telat->student->name}})</p>
            </div>
            <div class="signatures">
                <p>Orang Tua/Wali Peserta Didik</p>
                <p>(……………………)</p>
            </div>
            <div class="signatures">
                <p>Pembimbing Siswa</p>
                <p> ({{$telat->student->rayon->user->name}})</p>
            </div>
            <div class="signatures">
                <p>Kesiswaan</p>
                <p>(……………………)</p>
            </div>
        </div>    
    </div>
  
</body>
</html>

