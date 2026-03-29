# Quy trình làm việc của Gemini CLI

- **Tự động Commit:** Mỗi khi thực hiện thay đổi mã nguồn (sửa file, thêm tính năng, fix lỗi), Gemini CLI sẽ tự động thực hiện lệnh `git add` và `git commit` trên nhánh hiện tại.
- **Thông điệp Commit:** Thông điệp sẽ được mô tả ngắn gọn và rõ ràng theo chuẩn (ví dụ: `feat:`, `fix:`, `chore:`).
- **Nhánh riêng:** Luôn ưu tiên làm việc trên các nhánh tính năng (feature branches) để bảo vệ nhánh chính (`main`).

---
*Lưu ý: Người dùng có thể yêu cầu gộp nhánh (merge) vào `main` bất cứ lúc nào.*