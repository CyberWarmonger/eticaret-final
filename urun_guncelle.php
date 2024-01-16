<?php
include "../baglan.php";

if(isset($_POST['urun_id']))
{
    if($_POST['urun_id']>0)
    {
        $Guncelle=$db->prepare("UPDATE urun SET 
            urun_adi=:urun_adi,
            urun_aciklama=:urun_aciklama,
            urun_fiyat=:urun_fiyat,
            urun_indirim=:urun_indirim,
            urun_stok=:urun_stok,
            urun_vitrin=:urun_vitrin,
            urun_kategori_id=:urun_kategori_id,
            urun_renk=:urun_renk,
            urun_beden=:urun_beden,
            urun_marka=:urun_marka
            WHERE urun_id=:urun_id");
    
        $Durum=$Guncelle->execute(
            array(
                "urun_adi"=>$_POST["urun_adi"],
                "urun_aciklama"=>$_POST["urun_aciklama"],
                "urun_fiyat"=>$_POST["urun_fiyat"],
                "urun_indirim"=>$_POST["urun_indirim"],
                "urun_stok"=>$_POST["urun_stok"],
                "urun_vitrin"=>$_POST["urun_vitrin"],
                "urun_kategori_id"=>$_POST["urun_kategori_id"],
                "urun_renk"=>$_POST["urun_renk"],
                "urun_beden"=>$_POST["urun_beden"],
                "urun_marka"=>$_POST["urun_marka"],
                "urun_id"=>$_POST["urun_id"]
            ) 
        );
        //print_r($Guncelle->errorInfo());
        header("Location:UrunDetay.php?id=".intval($_POST["urun_id"]));
        exit;
    }
    else
    {

            
    $img_name = $_FILES["image"]["name"];
    $img_size = $_FILES["image"]["size"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $error = $_FILES["image"]["error"];


    if ($error === 0) {
        if ($img_size > 10000000) {
            $_SESSION['message'] = 'Fotoğrafın boyutu çok yüksek!.';
            header("Location: add-card.php");
            exit(0);
        }
        else {
            $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg","jpeg","png");

            if (in_array($img_ex_lc,$allowed_exs)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                $img_upload_path = 'img/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
            }else{
                $_SESSION['message'] = 'Yanlış Dosya Türü!';
                header('Location: add-card.php');
                exit(0);
            }
        }
        
    }
    else{
        $_SESSION['message'] = 'Bilinmeyen Bir hata oluştu.';
        header('Location: add-card.php');
        exit(0);
    }


        $Ekle=$db->prepare("INSERT INTO urun(urun_adi,urun_aciklama,urun_fiyat,urun_indirim,urun_stok,urun_vitrin,urun_kategori_id,urun_renk,urun_beden,urun_marka,image)VALUES(:urun_adi,:urun_aciklama,:urun_fiyat,:urun_indirim,:urun_stok,:urun_vitrin,:urun_kategori_id,:urun_renk,:urun_beden,:urun_marka,:new_img_name)");

        $Durum=$Ekle->execute(
            array(
                "urun_adi"=>$_POST["urun_adi"],
                "urun_aciklama"=>$_POST["urun_aciklama"],
                "urun_fiyat"=>$_POST["urun_fiyat"],
                "urun_indirim"=>$_POST["urun_indirim"],
                "urun_stok"=>$_POST["urun_stok"],
                "urun_vitrin"=>$_POST["urun_vitrin"],
                "urun_kategori_id"=>$_POST["urun_kategori_id"],
                "urun_renk"=>$_POST["urun_renk"],
                "urun_beden"=>$_POST["urun_beden"],
                "urun_marka"=>$_POST["urun_marka"],
                "new_img_name"=>$_POST["image"],

            ) 
        );
        $urun_id=$db->lastInsert_id();
        //print_r($Ekle->errorInfo());
        header("Location:UrunDetay.php?id=".intval($urun_id));
    }
}




 
if (isset($_POST["upload-card"]) && isset($_FILES['image'])) {

  

    $urun_adi = $_POST["urun_adi"];
    $urun_aciklama = $_POST["urun_aciklama"];
    $urun_fiyat = $_POST["urun_fiyat"];
    $urun_indirimv = $_POST["urun_indirim"];
    $urun_stok = $_POST["urun_stok"];
    $urun_vitrin = $_POST["urun_vitrin"];
    $urun_kategori_id = $_POST["urun_kategori_id"];
    $urun_renk = $_POST["urun_renk"];
    $urun_beden = $_POST["urun_beden"];
    $urun_marka = $_POST["urun_marka"];



    $img_name = $_FILES["image"]["name"];
    $img_size = $_FILES["image"]["size"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $error = $_FILES["image"]["error"];


    if ($error === 0) {
        if ($img_size > 10000000) {
            $_SESSION['message'] = 'Fotoğrafın boyutu çok yüksek!.';
            header("Location: add-card.php");
            exit(0);
        }
        else {
            $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg","jpeg","png");

            if (in_array($img_ex_lc,$allowed_exs)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                $img_upload_path = '../img'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
            }else{
                echo 'Yanlış Dosya Türü!';
                header('Location: add-card.php');
                exit(0);
            }
        }
        
    }
    else{
        echo 'Bilinmeyen Bir hata oluştu.';
        header('Location: add-card.php');
        exit(0);
    }


    try {
        $db->beginTransaction();

        $query = "INSERT INTO urun(urun_adi,urun_aciklama,urun_fiyat,urun_indirim,urun_stok,urun_vitrin,urun_kategori_id,urun_renk,urun_beden,urun_marka,image) VALUES (:urun_adi, :urun_aciklama, :urun_fiyat, :urun_indirim, :urun_stok, :urun_vitrin, :urun_kategori_id, :urun_renk, :urun_beden, :urun_marka, :new_img_name)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':urun_adi', $urun_adi);
        $stmt->bindParam(':urun_aciklama', $urun_aciklama);
        $stmt->bindParam(':urun_fiyat', $urun_fiyat);
        $stmt->bindParam(':urun_indirim', $urun_indirim);
        $stmt->bindParam(':urun_stok', $urun_stok);
        $stmt->bindParam(':urun_vitrin', $urun_vitrin);
        $stmt->bindParam(':urun_kategori_id', $urun_kategori_id);
        $stmt->bindParam(':urun_renk', $urun_renk);
        $stmt->bindParam(':urun_beden', $urun_beden);
        $stmt->bindParam(':urun_marka', $urun_marka);
        $stmt->bindParam(':new_img_name', $new_img_name);

        $stmt->execute();

        $db->commit();
        echo "Kart Başarılı bir şekilde eklenmiştir.";
        header("Location: add-cards.php");
        exit(0);
    } catch (Exception $e) {
        $db->rollBack();
        echo 'Bilinmeyen bir hata oluştu.';
        header('Location: add-card.php');
        exit(0);
    }
}

?>