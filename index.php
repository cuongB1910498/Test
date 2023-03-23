<!DOCTYPE html>
<?php
        include("conect.php");
        require_once(__DIR__ . '/vendor/autoload.php');
        use Cloudinary\Cloudinary;
        use Cloudinary\Transformation\Resize;
        if(isset($_POST['up']) && isset($_FILES['file']['name'])){
            $hinhanh = $_FILES['file']['name'];
            $hinhanh_tmp = $_FILES['file']['tmp_name'];
        
            $cloudinary = new Cloudinary(
                [
                    'cloud' => [
                        'cloud_name' => 'dx3ymfyd4',
                        'api_key'    => '198624231658798',
                        'api_secret' => '9IshlkXpSpVocXzqy49XPNtq_Ww',
                    ],
                ]
            );
        
            $data = $cloudinary->uploadApi()->upload(
                $hinhanh_tmp, 
                [
                    'public_id' => $hinhanh
                ]
            );
        
            $stmt = $pdo->prepare("INSERT into tbl_img(name, link) VALUES(:name, :link)");
            $stmt->execute([
                'name' => $hinhanh,
                'link'=> $data['secure_url']
            ]);
        } 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>

    <form action="" method="post" enctype='multipart/form-data'>
        <div class="mb-3">
            <label for="" class="form-label">Choose file</label>
            <input type="file" class="form-control" name="file" id="" placeholder="" aria-describedby="fileHelpId">
            <div id="fileHelpId" class="form-text">Help text</div>
        </div>
        <button name="up">submit</button>
    </form>

    <h1>View</h1>
    <a href="view.php"> xem anh</a>

    
</body>
</html>