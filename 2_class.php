<?php 
class Siswa {
    public $nrp;
    public $nama;
    public $daftarNilai;

    public function __construct($nrp, $nama, $daftarNilai)
    {
        $this->nrp = $nrp;
        $this->nama = $nama;
        $this->daftarNilai = $daftarNilai;
    }

    public function setDaftarNilai($value){
        $this->daftarNilai = $value;
    }
}

class Nilai {
    public $mapel;
    public $nilai;

    public function __construct($mapel, $nilai)
    {
        $this->mapel = $mapel;
        $this->nilai = $nilai;
    }
}

$nilai_1 = new Nilai('inggris', 80);
$nilai_2 = new Nilai('indonesia', 85);
$nilai_3 = new Nilai('jepang', 90);
$siswa = new Siswa(1, 'budi', null);
$siswa->setDaftarNilai(array($nilai_1, $nilai_2, $nilai_3));
print_r("Daftar Nilai Array 3 ".PHP_EOL);
print_r($siswa->daftarNilai);
print_r("Set Mapel inggris menjadi 100 ".PHP_EOL);
foreach($siswa->daftarNilai as $item){
    if($item->mapel == "inggris"){
        $item->nilai = 100;
    }
}
print_r($siswa);

function generateString($n){
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}

function generateMapel($index){
    $mapel = array('inggris', 'indonesia', 'jepang');
    return $mapel[$index];
}

print_r("Generate 10 Siswa ".PHP_EOL);
$collSiswa = [];
for($x=1; $x<=10; $x++){
    $siswa = new Siswa($x, generateString(10), new Nilai(generateMapel(rand(0,2)), rand(1, 100)));
    array_push($collSiswa, $siswa);
}
print_r($collSiswa);
?>