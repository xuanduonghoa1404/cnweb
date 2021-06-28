# Nhom_15

##**Triển khai bài tập tuần**
# Hướng dẫn cài đặt
## bật xampp, vào phpmyadmin
## tạo database có cấu hình như sau : 
    tên database : db
    tạo 1 bảng tên : users
    tạo 6 cột : id(int), 
                username(varchar(50),
                password(varchar(50)),
                id_msg(varchar(50)),
                username_msg(varchar(50),
                password_msg(varchar(50)
    Thực hiện truy vấn câu lệnh SQL để tạo bảng như trên trong MySQL:
    use db;
    CREATE TABLE `users` (
      `id` int(11) NOT NULL,
      `username` varchar(50),
      `password` varchar(50) ,
      `id_msg` varchar(50) ,
      `username_msg` varchar(50),
      `password_msg`  varchar(50))


## lưu lại database và các cột được tạo,sau khi lưu thành công thì vào http://localhost/Nhom_15/lab5_MVC/mvclesson
