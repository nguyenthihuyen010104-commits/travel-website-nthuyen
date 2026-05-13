function chonTour(name) {
    document.getElementById("thongbao").innerText =
        "Bạn đã chọn tour " + name;
}

function datTour() {
    let name = document.getElementById("name").value;
    let phone = document.getElementById("phone").value;
    let email = document.getElementById("email").value;
    let tour = document.getElementById("tour").value;
    let date = document.getElementById("date").value;
    let people = document.getElementById("people").value;

    if (name === "") {
        alert("Họ tên không được để trống");
        return false;
    }

    if (phone === "") {
        alert("SĐT không được để trống");
        return false;
    }

    if (email === "") {
        alert("Email không được để trống");
        return false;
    }

    if (tour === "") {
        alert("Phải chọn điểm đến");
        return false;
    }

    if (date === "") {
        alert("Phải chọn ngày đi");
        return false;
    }

    if (people <= 0) {
        alert("Số người phải > 0");
        return false;
    }

    document.getElementById("msg").innerText =
        "Đặt tour thành công";

    return false;
}