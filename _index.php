<?php
// ชื่อไฟล์ที่ต้องการอ่าน
$filename = './uploads/DCT240517162650.txt';

// ตรวจสอบว่าไฟล์มีอยู่หรือไม่
if (file_exists($filename)) {
    // เปิดไฟล์เพื่ออ่าน
    $file = fopen($filename, 'r');

    // อ่านเนื้อหาภายในไฟล์
    $content = fread($file, filesize($filename));

    // ปิดไฟล์หลังจากอ่านเสร็จ
    fclose($file);

    // แสดงผลเนื้อหาภายในไฟล์
    echo nl2br($content);
} else {
    echo "ไม่พบไฟล์ที่ระบุ";
}
?>
