
//2.1.xem nhà cung cấp
    SELECT * FROM `nha_cung_caps` 

//2.2 Mã hàng, tên hàng và số lượng của các mặt hàng hiện có trong công ty.
    SELECT * FROM `mat_hangs`

//2.3 Họ tên và địa chỉ và năm bắt đầu làm việc của các nhân viên trong công ty.
    SELECT * FROM `nhan_viens`

//2.4 Địa chỉ và điện thoại của nhà cung cấp có tên giao dịch VINAMILK là gì?
    SELECT DIACHI , DIENTHOAI FROM `nha_cung_caps`WHERE MACONGTY=2;

//2.5 Cho biết mã và tên của các mặt hàng có giá lớn hơn 100000 và số lượng hiện có ít hơn 50.
    SELECT MAHANG , TENHANG FROM `mat_hangs` WHERE GIAHANG > 100000 AND SOLUONG < 50; 

//2.6 Cho biết mỗi mặt hàng trong công ty do ai cung cấp.
    SELECT mat_hangs.TENHANG , nha_cung_caps.TENCONGTY FROM `mat_hangs` LEFT JOIN nha_cung_caps ON mat_hangs.MACONGTY = nha_cung_caps.MACONGTY;

//2.7 Công ty Việt Tiến đã cung cấp những mặt hàng nào?
    SELECT nha_cung_caps.TENCONGTY, mat_hangs.TENHANG FROM nha_cung_caps LEFT JOIN mat_hangs 
    ON nha_cung_caps.MACONGTY = mat_hangs.MACONGTY WHERE nha_cung_caps.MACONGTY = 1;
    
//2.8 Loại hàng thực phẩm do những công ty nào cung cấp và địa chỉ của các công ty đó là gì?
    SELECT loaihangs.TENLOAIHANG, nha_cung_caps.TENCONGTY,nha_cung_caps.DIACHI
    FROM loaihangs
    LEFT JOIN nha_cung_caps
    ON loaihangs.MALOAIHANG=nha_cung_caps.MACONGTY WHERE loaihangs.MALOAIHANG = 1;
    
//2.9 Những khách hàng nào (tên giao dịch) đã đặt mua mặt hàng Sữa hộp XYZ của công ty?
    không có
//2.10 Đơn đặt hàng số 1 do ai đặt và do nhân viên nào lập, thời gian và địa điểm giao hàng là ở đâu?
    SELECT don_dat_hangs.SOHOADON, khach_hangs.TENGIAODICH,nhan_viens.HO, nhan_viens.TEN, don_dat_hangs.NGAYDATHANG, don_dat_hangs.NOIGIAOHANG
    FROM don_dat_hangs
    LEFT JOIN khach_hangs
    ON don_dat_hangs.MAKHACHHANG = khach_hangs.MAKHACHHANG
    LEFT JOIN nhan_viens
    ON don_dat_hangs.MANHANVIEN = nhan_viens.MANHANVIEN
    WHERE don_dat_hangs.SOHOADON = 1;

//2.11 Hãy cho biết số tiền lương mà công ty phải trả cho mỗi nhân viên là bao nhiêu (lương = lương cơ bản + phụ cấp).
    SELECT MANHANVIEN,HO,TEN, LUONGCOBAN+PHUCAP AS tong_luong
    FROM nhan_viens;

//2.12 Trong đơn đặt hàng số 3 đặt mua những mặt hàng nào và số tiền mà khách hàng phải trả cho mỗi mặt hàng là bao nhiêu
    SELECT don_dat_hangs.SOHOADON, mat_hangs.TENHANG ,chi_tiet_dat_hangs.GIABAN- chi_tiet_dat_hangs.MUCGIAMGIA AS THANHTOAN
    FROM chi_tiet_dat_hangs
    LEFT JOIN don_dat_hangs
    ON don_dat_hangs.SOHOADON = chi_tiet_dat_hangs.SOHOADON
    LEFT JOIN mat_hangs
    ON chi_tiet_dat_hangs.MAHANG = mat_hangs.MAHANG
    WHERE don_dat_hangs.SOHOADON = 3;


   