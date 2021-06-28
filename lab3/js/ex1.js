
$(document).ready(function() {
    //reset form
    $("#resetBtn").click(function() {
        window.location = window.location
    });

    //Khởi tạo giá trị cho khung chọn độ chính xác
    // for (let i = 1; i <= 10; i++) {
    //     $('#decimal').append(new Option(i, i))
    // }

    //Khi thay đổi lựa chọn đơn vị
    $("#from").on('change', function() {
        if ($("#from").val() === "rad") {
            $("#to").val("deg");
        } else if ($("#from").val() === "deg") {
            $("#to").val("rad");
        }
    });
    $("#to").on('change', function() {
        if ($("#to").val() === "rad") {
            $("#from").val("deg");
        } else if ($("#to").val() === "deg") {
            $("#from").val("rad");
        }
    });
    $("#btnConvert").on("click", function() {
        if ($("#from").val() === "rad") {
            $("#from").val("deg");
            $("#to").val("rad");
        } else if ($("#from").val() === "deg") {
            $("#from").val("rad");
            $("#to").val("deg");
        }
    })
})