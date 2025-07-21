<form method="GET" action="{{ route('manager.issues.search') }}">
    <div class="row mb-3">
        <div class="col-md-3">
            <input type="text" name="computer_id" class="form-control" placeholder="Mã máy tính">
        </div>
        <div class="col-md-3">
            <select name="status" class="form-control">
                <option value="">-- Tất cả trạng thái --</option>
                <option value="Chưa xử lý">Chưa xử lý</option>
                <option value="Đã xử lý">Đã xử lý</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="date" name="from_date" class="form-control" placeholder="Từ ngày">
        </div>
        <div class="col-md-3">
            <input type="date" name="to_date" class="form-control" placeholder="Đến ngày">
        </div>
    </div>
    <button class="btn btn-primary">🔍 Tra cứu</button>
</form>
