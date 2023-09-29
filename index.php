<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เปิดปิดประตู</title>
    <!-- เรียกใช้ Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* ปรับแต่งแบบอักษรของปุ่ม */
        body {
          margin:0;
          font-family: 'Open Sans',sans-serif;
          background-color: #c7f7f5;
        }
        .custom-btn {
            font-size: 20px;
            font-weight: bold;
        }

        /* ปรับแต่งสีพื้นหลังและข้อความของปุ่มแต่ละปุ่ม */
        .custom-btn-primary {
            background-color: #007bff;
            width: 100px;
            /*min-height: 80vh;*/
            color: #fff;
        }

        .custom-btn-secondary {
            background-color: #6c757d;
            width: 100px;
            color: #fff;
        }

        /* ปรับแต่งขอบของปุ่ม */
        .custom-btn-primary:hover,
        .custom-btn-secondary:hover {
            border: 2px solid #007bff;
            background-color: transparent;
            color: #007bff;
        }

        /* สร้าง Flexbox container และกำหนดความสูงเต็มหน้าจอ */
        .flex-container1 {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 30vh;
          /*  background-color: #009c8f; /* เปลี่ยนสีพื้นหลังของ Flexbox container */
        }

        .flex-container2 {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 30vh;
          /*  background-color: #009c8f; /* เปลี่ยนสีพื้นหลังของ Flexbox container2 */
        }

        .flex-container3 {
            display: flex;
            color: #ff0000;
            justify-content: center;
            align-items: center;
            min-height: 5vh;
          /*  background-color: #009c8f; /* เปลี่ยนสีพื้นหลังของ Flexbox container2 */
        }
    </style>
</head>
<body>
    <!-- Flexbox container -->
    <div class="flex-container2">
      <h1 class="arrow"><br><br><span>เลือกเปิดหรือปิดประตู</span><br><br></h1>
    </div>
    <div class="flex-container3">
      <h3 class="arrow"><span><?php 
       require_once('cn.php');
      $sql = "SELECT * FROM datos WHERE num = '1'"; 
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)):
           $x=$row['temperature'];         
        endwhile; 
          if ($x=="1"){
            echo ("สถานะ : ประตูเปิดอยู่");
          }else{
            echo ("สถานะ : ประตูปิดอยู่");
          }?></span></h3>
    </div>
    <div class="flex-container1">
        <!-- สร้างปุ่มแรก -->
        <a href="off.php" class="btn custom-btn custom-btn-primary">ปิด</a>
        <!-- สร้างปุ่มที่สอง -->
        <a href="on.php" class="btn custom-btn custom-btn-secondary">เปิด</a>
    </div>
    <!-- เรียกใช้ Bootstrap JS และ Popper.js (ถ้าต้องการใช้ Tooltip, Popover, หรือ Modal) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>