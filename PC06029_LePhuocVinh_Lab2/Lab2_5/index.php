<?php
class myClass {
    public $string1 = "Hello World";
    protected $string2 = "Hello";
    private $string3 = "Alooo";

    function printVars() {
        echo $this->string1;
        echo $this->string2;
        echo $this->string3;
    }
}

class lopCon extends myClass {
    function truyXuat() {
        echo $this->string1; // Được khai báo public có thể truy xuất trong và ngoài lớp
        echo $this->string2; // Được khai báo proteced có thể truy xuất do kế thừa từ lớp cha
//        echo $this->string3; // Được khai báo private không thể truy xuất do chỉ được dùng trong lớp đã được khai báo.
    }
}

$obj = new myClass();
echo $obj->string1; // Không lỗi do được khai báo public
//echo $obj->string2; // Lỗi do string2 được khai báo là proteced
//echo $obj->string3; // Lỗi do string3 được khai báo là private
$obj->printVars();

$newObj = new lopCon();
$newObj->truyXuat(); // Gặp lỗi tại dòng $this->string3 do được khai báo là private
?>



