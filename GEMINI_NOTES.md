
# Nhật ký cập nhật dự án - Gemini CLI

Tài liệu này ghi lại các thay đổi, cải tiến và cấu trúc hệ thống đã được thực hiện bởi Gemini CLI.

## 18/03/2026 - Cập nhật Giao diện & Hệ thống quản trị
### 1.1. Cải tiến Giao diện (UI/UX)
- **Framework:** Cập nhật và tối ưu hóa việc sử dụng **Bootstrap 5.3.3**, **Bootstrap Icons** và **Font Awesome 6**.
- **Layout:** Chuyển đổi từ bố cục bảng cũ sang bố cục **Sidebar + Main Content** hiện đại.
- **Responsive:** Giao diện đã tương thích tốt hơn với nhiều kích thước màn hình.

### 1.2. Các Tính năng Mới
- **Dashboard:** Hiển thị lời chào, thời gian đăng nhập gần nhất và các thẻ truy cập nhanh.
- **AdminLogin.php:** Thiết kế mới với nền Gradient, Floating Labels và hiệu ứng hiện đại.
- **Thống kê:** Tạo mới module `thongkeView` để theo dõi dữ liệu.

### 1.3. Cải tiến Mã nguồn & Bảo mật
- **Logic Đăng nhập:** Điều hướng thẳng về Dashboard sau khi đăng nhập thành công.
- **Xử lý Hình ảnh:** Sửa lỗi `ValueError: Path cannot be empty` khi không tải lên ảnh mới.
- **Database:** Sử dụng `__DIR__` và charset `utf8mb4` cho kết nối PDO.

---

## 21/03/2026 - Thống nhất Đăng nhập & Bảo mật Giỏ hàng
### 2.1. Hệ thống Đăng nhập Hợp nhất
- **`AdminAct.php`:** 
    - Cập nhật logic `checklogin` để kiểm tra cả bảng `admin` và `user`.
    - Phân quyền điều hướng: Admin về trang quản trị, User về trang chủ website.
    - Tách biệt phiên đăng xuất (`adminlogout` và `userlogout`) bằng cách chỉ `unset()` đúng biến session tương ứng, giúp giữ lại phiên làm việc của vai trò khác trên cùng trình duyệt.
    - **Tự động xóa giỏ hàng khi đăng xuất** để đảm bảo an toàn thông tin.

### 2.2. Giao diện Người dùng (Frontend)
- **`apart/header-mid.php`:**
    - Chuyển đổi khu vực "Tài khoản" thành một **Danh sách thả xuống (Dropdown List)** đồng nhất.
    - Hiển thị tên người dùng kèm chức năng "Đăng xuất" nếu đã đăng nhập User.
    - Chỉ hiển thị trạng thái đăng nhập cho User tại trang chủ (không hiển thị session Admin để đảm bảo tính riêng tư).
- **Điều hướng:** Sửa các liên kết tuyệt đối (localhost) thành đường dẫn tương đối trong `AdminLogin.php` và `viewGiohang.php` để tăng tính linh động cho mã nguồn.

### 2.3. Bảo mật Giỏ hàng (Security Enhancement)
- **`apart/viewHanghoa.php`:**
    - Tích hợp JavaScript kiểm tra trạng thái đăng nhập trước khi thêm hàng vào giỏ.
    - **Cảnh báo:** Nếu chưa đăng nhập User, hệ thống sẽ hiện thông báo yêu cầu đăng nhập và tự động chuyển hướng về trang đăng nhập.
    - Giỏ hàng sẽ được dọn sạch ngay khi User đăng xuất khỏi hệ thống.

### 2.4. Danh sách File đã tác động (Cập nhật mới)
- `administrator/AdminLogin.php` (Chỉnh sửa - Liên kết quay lại)
- `administrator/element/mAdmin/AdminAct.php` (Chỉnh sửa - Logic đăng nhập/đăng xuất kép & Xóa giỏ hàng)
- `apart/header-mid.php` (Chỉnh sửa - Dropdown menu tài khoản mới)
- `apart/viewHanghoa.php` (Chỉnh sửa - Validation đăng nhập khi mua hàng)
- `apart/viewGiohang.php` (Chỉnh sửa - Liên kết tiếp tục mua hàng)

---

## 22/03/2026 - Cập nhật Chức năng Tìm kiếm Admin
### 3.1. Cải tiến Hệ thống Tìm kiếm
- **`AdminCls.php`:** 
    - Bổ sung phương thức `AdminSearch($keyword)` cho phép tìm kiếm admin theo `adminname` hoặc `hoten` sử dụng truy vấn `LIKE`.
- **`AdminView.php`:**
    - Cập nhật logic xử lý: Tự động kiểm tra tham số `search` từ URL. Nếu có từ khóa, hệ thống sẽ gọi `AdminSearch`, ngược lại sẽ gọi `AdminGetAll`.
    - **UI/UX Search Form:** 
        - Tích hợp form tìm kiếm trực tiếp vào thanh tiêu đề của bảng danh sách (Card Header).
        - Sử dụng `input-group-sm` để tiết kiệm không gian.
        - Giữ lại từ khóa tìm kiếm trong ô nhập liệu sau khi nhấn tìm kiếm.
        - Thêm nút "Xóa tìm kiếm" (Clear search) hiển thị khi đang có kết quả lọc, giúp người dùng quay lại danh sách đầy đủ nhanh chóng.
    - Sửa lỗi thuộc tính `action` của form tìm kiếm để hoạt động chính xác với phương thức `GET` trong môi trường `index.php?req=admin`.

### 3.2. Danh sách File đã tác động (Mới nhất)
- `administrator/element/mod/AdminCls.php` (Thêm phương thức `AdminSearch`)
- `administrator/element/mAdmin/AdminView.php` (Cập nhật logic & Giao diện tìm kiếm)

---

## 22/03/2026 - Tính năng Đăng ký User mới
### 4.1. Chức năng Đăng ký cho User
- **`AdminLogin.php`:**
    - Tích hợp thêm liên kết **"Đăng ký tài khoản"** ngay dưới nút đăng nhập.
    - Sử dụng **Bootstrap Modal** để hiển thị form đăng ký mà không cần chuyển trang, tạo trải nghiệm mượt mà.
    - Tích hợp thư viện **SweetAlert2** để hiển thị thông báo chuyên nghiệp khi đăng ký thành công, lỗi tên đăng nhập tồn tại hoặc đăng nhập thất bại.
- **`userAct.php`:**
    - Bổ sung `case 'userregister'`: Xử lý dữ liệu từ form đăng ký, kiểm tra trùng lặp tài khoản và thực hiện thêm vào CSDL qua `UserCls.php`.
    - Điều hướng kèm tham số kết quả (`register_result=ok/exists/notok`) về lại trang đăng nhập.
    - Sửa lỗi đường dẫn tuyệt đối trong `userchecklogin` thành đường dẫn tương đối để đảm bảo tính linh động.
- **`AdminAct.php`:**
    - Đồng bộ mã kết quả trả về (`error=1`) để hiển thị thông báo đăng nhập sai bằng SweetAlert2.

### 4.2. Danh sách File đã tác động
- `administrator/AdminLogin.php` (Giao diện Modal & Thông báo SweetAlert2)
- `administrator/element/mUser/userAct.php` (Logic xử lý Đăng ký & Sửa điều hướng)
- `administrator/element/mAdmin/AdminAct.php` (Đồng bộ thông báo lỗi đăng nhập)

---

## 22/03/2026 - Sửa lỗi & Tối ưu Tìm kiếm sản phẩm
### 5.1. Sửa lỗi gọi hàm không tồn tại
- **`apart/timkiem.php`:**
    - Sửa lỗi `Undefined method 'searchHanghoa'` bằng cách chuyển sang gọi hàm `HanghoaSearch($keyword)` đã được định nghĩa trong `hanghoaCls.php`.
    - **Refactoring:** Thay đổi biến tạm `$s` thành `$count` (số lượng kết quả) và `$item` (trong vòng lặp `foreach`) để mã nguồn rõ ràng hơn, tránh xung đột biến.

### 5.2. Danh sách File đã tác động
- `apart/timkiem.php` (Sửa lỗi logic & Refactoring)

---

## 22/03/2026 - Mở rộng Chức năng Tìm kiếm Hệ thống Quản trị
### 6.1. Bổ sung phương thức Tìm kiếm trong Model (Cls)
- **`DonhangCls.php`**: Thêm `DonhangSearch($keyword)` tìm theo tên, SĐT, email, địa chỉ, phương thức thanh toán.
- **`ChungtuxuatCls.php`**: Thêm `ChungtuxuatSearch($keyword)` tìm theo tên chứng từ, ghi chú.
- **`CTchungtunhapCls.php`**: Thêm `CTchungtunhapSearch($keyword)` tìm theo tên hàng nhập, ghi chú.
- **`CTchungtuxuatCls.php`**: Thêm `CTchungtuxuatSearch($keyword)` tìm theo tên hàng xuất, ghi chú.
- **`CTdonhangCls.php`**: Thêm `CTdonhangSearch($keyword)` tìm theo tên hàng hóa.

### 6.2. Cập nhật Giao diện (View)
- Tích hợp Thanh tìm kiếm (Search Bar) và logic lọc dữ liệu vào các trang:
    - **Quản lý Đơn hàng** (`donhangView.php`)
    - **Quản lý Chứng từ xuất** (`chungtuxuatView.php`)
    - **Chi tiết Đơn hàng** (`CTdonhangView.php`)
    - **Chi tiết Chứng từ nhập** (`CTchungtunhapView.php`)
    - **Chi tiết Chứng từ xuất** (`CTchungtuxuatView.php`)
- Đồng bộ giao diện sử dụng Bootstrap 5: Input group, nút tìm kiếm và nút xóa tìm kiếm (Clear search).
- Cập nhật hiển thị số lượng bản ghi tương ứng với kết quả lọc.

### 6.3. Danh sách File đã tác động
- `administrator/element/mod/DonhangCls.php`
- `administrator/element/mod/ChungtuxuatCls.php`
- `administrator/element/mod/CTchungtunhapCls.php`
- `administrator/element/mod/CTchungtuxuatCls.php`
- `administrator/element/mod/CTdonhangCls.php`
- `administrator/element/mdonhang/donhangView.php`
- `administrator/element/mChungtuxuat/chungtuxuatView.php`
- `administrator/element/mCTdonhang/CTdonhangView.php`
- `administrator/element/mCTchungtunhap/CTchungtunhapView.php`
- `administrator/element/mCTchungtuxuat/CTchungtuxuatView.php`

---
*Ghi chú: Cơ sở dữ liệu (Database) được giữ nguyên cấu trúc gốc theo yêu cầu.*

## 30/03/2026 - Thống nhất Giao diện Nút chức năng (Admin UI)
### 7.1. Cải tiến CSS cho các nút hành động (Action Buttons)
- **`administrator/admin.css`**: 
    - Bổ sung class `.btn-action-group`: Sử dụng `flex` để căn giữa và tạo khoảng cách (`gap: 0.4rem`) hợp lý giữa các nút trong bảng, thay thế cho `btn-group` của Bootstrap vốn gây cảm giác dính liền.
    - Bổ sung class `.btn-action`: Quy định kích thước đồng nhất (32x32px), căn giữa biểu tượng (`display: inline-flex`), bo góc (`0.4rem`) và thêm hiệu ứng phóng to nhẹ khi hover (`transform: scale(1.1)`) giúp tăng trải nghiệm người dùng.

### 7.2. Đồng bộ hóa toàn bộ các trang View (Administrator)
- Thực hiện cập nhật cấu trúc nút chức năng (Xóa, Cập nhật, Khóa, In) tại tất cả các module quản trị để đảm bảo tính thẩm mỹ và nhất quán:
    - **Quản lý Hàng hóa & Loại hàng** (`hanghoaview.php`, `loaihangview.php`)
    - **Quản lý Tài khoản** (`AdminView.php`, `userView.php`)
    - **Quản lý Đơn hàng & Chứng từ** (`donhangView.php`, `chungtunhapView.php`, `chungtuxuatView.php`)
    - **Quản lý Chi tiết & Thuộc tính** (`CTdonhangView.php`, `CTchungtunhapView.php`, `CTchungtuxuatView.php`, `thuoctinhView.php`, `thuoctinh_hanghoaView.php`, `Giaview.php`)
- **Sửa lỗi HTML:** Đã rà soát và khắc phục các lỗi thẻ đóng dư thừa (`</div>`, `</td>`) phát sinh trong quá trình tái cấu trúc giao diện, đảm bảo mã nguồn sạch và trình duyệt render chính xác.

### 7.3. Danh sách File đã tác động (Mới nhất)
- `administrator/admin.css` (Cập nhật Stylesheet)
- Toàn bộ các file `.php` trong thư mục `administrator/element/` (Cập nhật UI nút bấm)

---
## Quy trình làm việc của Gemini CLI (Cập nhật 29/03/2026)
- **Tự động Commit:** Mỗi khi thực hiện thay đổi mã nguồn (sửa file, thêm tính năng, fix lỗi), Gemini CLI sẽ tự động thực hiện lệnh `git add` và `git commit` trên nhánh hiện tại.
- **Thông điệp Commit:** Thông điệp sẽ được mô tả ngắn gọn và rõ ràng theo chuẩn (ví dụ: `feat:`, `fix:`, `chore:`, `docs:`).
- **Nhánh riêng:** Luôn ưu tiên làm việc trên các nhánh tính năng (feature branches) để bảo vệ nhánh chính (`main`).
- **Gộp nhánh:** Người dùng có thể yêu cầu gộp nhánh (merge) vào `main` bất cứ lúc nào bằng lệnh `git merge`.
