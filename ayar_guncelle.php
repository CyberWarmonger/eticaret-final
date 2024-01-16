<?php
include "../baglan.php";
if (isset($_POST['ayar_baslik']))
{
    $guncelle=$db->prepare("UPDATE ayar SET
        ayar_baslik=:ayar_baslik,
        ayar_aciklama=:ayar_aciklama,
        ayar_keywords=:ayar_keywords,
        ayar_facebook=:ayar_facebook,
        ayar_tiktok=:ayar_tiktok,
        ayar_instagram=:ayar_instagram,
        ayar_youtube=:ayar_youtube,
        ayar_sunucu=:ayar_sunucu,
        ayar_port=:ayar_port,
        ayar_mail=:ayar_mail,
        ayar_sifre=:ayar_sifre
        WHERE ayar_id = 1
        ");
    $Durum=$guncelle->execute(
        array(
            'ayar_baslik'=>$_POST['ayar_baslik'],
            'ayar_aciklama'=>$_POST['ayar_aciklama'],
            'ayar_keywords'=>$_POST['ayar_keywords'],
            'ayar_facebook'=>$_POST['ayar_facebook'],
            'ayar_tiktok'=>$_POST['ayar_tiktok'],
            'ayar_instagram'=>$_POST['ayar_instagram'],
            'ayar_youtube'=>$_POST['ayar_youtube'],
            'ayar_sunucu'=>$_POST['ayar_sunucu'],
            'ayar_port'=>$_POST['ayar_port'],
            'ayar_mail'=>$_POST['ayar_mail'],
            'ayar_sifre'=>$_POST['ayar_sifre'],
        )
    );

    header("Location:ayar.php?Durum=$Durum");
}
?>