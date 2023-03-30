<?php
    echo $_GET['name'];
    include("conect.php");
    $stmt = $pdo->prepare("DELETE FROM tbl_img WHERE tbl_img.name = '".$_GET['name']."'");
    $stmt->execute();
    require('vendor/autoload.php');
    use Cloudinary\Cloudinary;
    $cloudinary = new Cloudinary(
        [
            'cloud' => [
                'cloud_name' => 'dx3ymfyd4',
                'api_key'    => '198624231658798',
                'api_secret' => '9IshlkXpSpVocXzqy49XPNtq_Ww',
            ],
        ]
    );
    $data = $cloudinary->uploadApi()->destroy($_GET['name']);
    print_r($data);
?>