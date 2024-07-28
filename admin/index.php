<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";

    include "header.php";
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "listsp":
                if(isset($_POST['clickOK'])&&($_POST['clickOK'])){
                    $keyw=$_POST['keyw'];
                    $iddm=$_POST['iddm'];
                }else{
                    $keyw="";
                    $iddm=0;
                }
                $listdanhmuc= loadall_danhmuc();
                $listsanpham = loadall_sanpham($keyw,$iddm);
                include "sanpham/list.php";
                break;
            case "addsp":
                if(isset($_POST['themmoi'])&& ($_POST['themmoi'])){
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $hinh = $_FILES['hinh']['name'];
//                    echo $hinh;
                    $target_dir = "../upload/";
                    $target_file = $target_dir.basename($_FILES['hinh']['name']);
//                    echo $target_file;
                    if(move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)){
//                        echo "Bạn đã upload ảnh thành công";
                    }else{
//                        echo "Upload ảnh không thành công";
                    }
//                    echo $iddm;
                    insert_sanpham($tensp, $giasp, $hinh,$mota, $iddm);
                    $thanhcong = "Thêm thành công";
                }

                $listdanhmuc= loadall_danhmuc();
                include "sanpham/add.php";
                break;  
                case "bieudo":
                    include "bieudo.php";
                    break;  
                case "suasp":                   
                    if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
                        $sanpham=loadone_sanpham($_GET['idsp']);
                    }
                    include "sanpham/update.php";
                    break;
        }
    }else{      
        include "home.php";
    }
    include "footer.php";
?>
