<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $title;?></title>
    <!--

    Template 2090 Kinetic

    http://www.tooplate.com/view/2090-kinetic

    -->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url()?>assets/front/img/location.png">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/dataWisata/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/dataWisata/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/dataWisata/css/fontAwesome.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/dataWisata/css/tooplate-style.css">
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyD77UkTG_J8TBzvJVCxfQTP1vp2I6uYkC0&libraries=places"></script>
    <script src="<?php echo base_url()?>assets/front/dataWisata/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<?php foreach ($getDataWisataSatu as $dat) {
    $id = $dat->id_wisata;
    $nama = $dat->nama_tempat;
    $alamat = $dat->alamat;
    $regencies = $dat->regencies;
    $districts = $dat->districts;
    $villages = $dat->villages;
    $htm = $dat->htm;
    $des = $dat->deskripsi;
    $lat = $dat->lat;
    $long = $dat->lng;
    $owner = $dat->owner;
}
foreach ($getDataFotoSatu as $dat) {
    $idFoto[] = $dat->id_foto;
    $namaFoto[] = $dat->nama_foto;
}
foreach ($getDataFasilitasSatu as $dat) {
    $idFa[] = $dat->id_fasilitas;
    $namaFa[] = $dat->nama_fasilitas;
    $hargaFa[] = $dat->harga_fasilitas;

}
?>

<div class="ct" id="t1">
    <div class="ct" id="t2">
        <div class="ct" id="t3">
            <div class="ct" id="t4">
                <section>
                    <ul>
                        <a href="#t1"><li class="icon fa fa-home" id="uno"></li></a>
                        <a href="#t2"><li class="icon fa fa-plus" id="dos"></li></a>
                        <a href="#t3"><li class="icon fa fa-image" id="tres"></li></a>
                        <a href="#t4"><li class="icon fa fa-map-marker" id="cuatro"></li></a>
                        <br><br>
                        <a href="<?php echo base_url()?>"><li class="icon fa fa-arrow-left" id="back"></li></a>
                    </ul>
                    <div class="page" id="p1">
                        <li class="icon fa fa-home">
                            <span class="title">Welcome To</span>
                            <h4><?php echo $nama;?></h4><p><?php echo $des;?></p>
                            <div class="primary-button"><a href="#t2">Discover More</a></div>
                        </li>
                    </div>
                    <div class="page" id="p2">
                        <li class="icon fa fa-plus"><span class="title">Fasility And Other Rides</span>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="left-text">
                                            <h4><?php echo $nama;?></h4>
                                            <p><?php echo "HTM : Rp.".$htm?></p>
                                            <p>Fasility </p>
                                            <p>
                                                <?php
                                                $max = count($idFa);
                                                for ($i=0;$i<$max;$i++){
                                                    echo $namaFa[$i].' - Rp. '.$hargaFa[$i].'<br>';
                                                }

                                                ?>
                                            </p>
                                            <div class="primary-button">
                                                <a href="#t3">Discover More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="right-image">
                                            <?php
                                            if($regencies==3217){
                                                $folder = "kab_bandung_barat";
                                            }else if($regencies==3273){
                                                $folder = "kota_bandung";
                                            }else if($regencies==3277){
                                                $folder = "cimahi";
                                            }else if($regencies==3204){
                                                $folder = "kab_bandung";
                                            }
                                            ?>
                                            <img src="<?php echo base_url()."uploads/wisata/".$folder."/".$namaFoto[0]?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                    <div class="page" id="p3">
                        <li class="icon fa fa-image"><span class="title">Photos</span>
                            <div class="container">
                                <div class="row">
                                    <?php
                                    $max = count($idFoto);
                                    for ($i=0;$i<$max;$i++){
                                    ?>
                                    <div class="col-md-4">
                                        <div class="project-item">
                                            <a href="<?php echo base_url()."uploads/wisata/".$folder."/".$namaFoto[$i]?>" data-lightbox="image-1">
                                                <img src="<?php echo base_url()."uploads/wisata/".$folder."/".$namaFoto[$i]?>"></a>
                                        </div>
                                    </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </li>
                    </div>
                    <div class="page" id="p4">
                        <li class="icon fa fa-map-marker"><span class="title">Map</span>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10" id="maps" style="width: 100%; height:400px">
                                        <script type="text/javascript">
                                            var myLatLng = {lat: <?php echo $lat;?>, lng: <?php echo $long;?>};
                                            function init(){
                                                // membuat peta
                                                map = new google.maps.Map(document.getElementById('maps'),{
                                                    'center': myLatLng,
                                                    'zoom': 12.5,
                                                    scaleControl : true,
                                                    gestureHandling : 'cooperative',
                                                    'mapTypeId': google.maps.MapTypeId.ROADMAP
                                                });
                                                var marker = new google.maps.Marker({
                                                    position: myLatLng,
                                                    map: map,
                                                    title: '<?php echo $nama?>',
                                                    animation:google.maps.Animation.BOUNCE

                                                });
                                                var infowindow = new google.maps.InfoWindow();
                                                google.maps.event.addListener(marker, 'click', function () {
                                                    infowindow.setContent('<b style="color: black">'+this.title+'</b><br>'+
                                                        '<p style="color: black">'+this.position+'<p>');
                                                    infowindow.open(map, this);
                                                });
                                                marker.setMap(map);
                                            }
                                            google.maps.event.addDomListener(window, 'load', init);
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                    <p class="credit">Copyright &copy; 2017 Company Name

                        - Design: <a href="http://www.tooplate.com/view/2090-kinetic" target="_parent">Kinetic</a></p>
                </section>
            </div>
        </div>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url()?>assets/front/dataWisata/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="<?php echo base_url()?>assets/front/dataWisata/js/vendor/bootstrap.min.js"></script>

<script src="<?php echo base_url()?>assets/front/dataWisata/js/plugins.js"></script>
<script src="<?php echo base_url()?>assets/front/dataWisata/js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
</body>
</html>