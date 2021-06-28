$(document).ready(function() {
    //reset form
    $("#resetBtn").click(function() {
        window.location = window.location
    });

    //khởi tạo giá trị cho các lựa chọn
    for (let i = 1; i <= 31; i++) {
        $('[id^="day"]').append(new Option(i, i));
    }
    for (let i = 1; i <= 12; i++) {
        $('[id^="month"]').append(new Option(i, i));
    }
    for (let i = 1900; i <= 2100; i++) {
        $('[id^="year"]').append(new Option(i, i));
    }
});



//Xử lý tiếng việt có dấu
function removeAscent(str) {
    if (str === null || str === undefined) return str;
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    return str;
}

//Kiểm tra tên có hợp lệ hay không
function isValid(string) {
    var re = /^[a-zA-Z' ]+$/ // regex here
    return re.test(removeAscent(string))
}


//Hàm xử lý sự kiện không cho submit
function pd(e) {
    e.preventDefault() // prevents the form from being submitted
}

//Hàm xử lý validate chung cho các input Tên
function handleName(that) {
    if (isValid(that.value)) {
        that.classList.add("is-valid");
        that.classList.remove("is-invalid");
        btnSubmit.classList.remove("disabled");
        btnSubmit.removeEventListener("click", pd);
    } else {
        that.classList.add("is-invalid");
        that.classList.remove("is-valid");
        btnSubmit.classList.add("disabled");
        btnSubmit.addEventListener("click", pd);
    }
}