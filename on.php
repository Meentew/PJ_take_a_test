<?php
require_once('cn.php');
$x=1;
                    $sql = "UPDATE datos SET 
                    temperature = '$x'
                    WHERE num = '1'";
            if (mysqli_query($conn, $sql)) {
               /* echo '<script> alert("แก้ไขข้อมูลเสร็จเรียบร้อย")</script>';
                //header('Refresh:0; url= ../');
                header("user_main.php");*/
                header("location:index.php");
                ?><body>
                <h2>แก้ไขข้อมูลเสร็จเรียบร้อย</h2>
                <a href="index.php" class="button">ตกลง</a>
                </form>
                
                </body><?php
            } else {
               /* echo '<script> alert("แก้ไขข้อมูลไม่สำเร็จ")</script>';
                //header('Refresh:0; url= ../form-update.php');
                header("psch.php");*/
                ?><body>
                <h2>แก้ไขข้อมูลไม่สำเร็จ</h2>
                <a href="index.php" class="button">ตกลง</a>
                </form>
                
                </body><?php
            }
        ?>