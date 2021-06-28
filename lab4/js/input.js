//Đây là phần code cũ viết bằng tay, giữ lại làm kỷ niệm, TA vui lòng không chấm file này.

let limit = '1';
let files;
let notSubmit = false;
$(document).ready(function () {
    
    //Xử lý sự kiện thay đổi các giá trị của số file cần tải
    $('#number').on('change', function () {
        uploads.value = null;
        $('.input-content').html(`Chọn file hoặc kéo thả vào đây.`);
        limit = $('#number').val();
    });

    //Xử lý việc nhập file
    $('#uploads').on('input', function () {
        files = $('#uploads').prop('files');
        validateFiles(files);
    });

    //Xử lý sự kiện kéo thả
    var dropzone = $('#dropzone');

    dropzone.on(
        'drag dragstart dragend dragover dragenter dragleave drop',
        function (e) {
            e.preventDefault();
            e.stopPropagation();
        }
    );

    dropzone.on('dragover dragenter', function () {
        $(this).addClass('is-dragover');
    });
    dropzone.on('dragleave dragend drop', function () {
        $(this).removeClass('is-dragover');
    });

    dropzone.on('drop', function (e) {
        var files = e.originalEvent.dataTransfer.files;
        //Điền các file upload vào input file
        $('#uploads').prop('files', files);

        //Validate file
        files = $('#uploads').prop('files');
        validateFiles(files);
    });
});

//Hàm xử lý validate input file
function validateFiles(files) {
    //Xử lí điều kiện nhập loại file của kéo thả
    let checkFileType = ![...files].some((item) => {
        let ext = item.name.split('.').pop();
        return ![
            'doc',
            'docx',
            'pdf',
            'mp3',
            'wav',
            'png',
            'jpg',
            'xlsx',
            'txt',
            'json',
        ].some((value) => value == ext);
    });
    if (checkFileType == false) {
        $.toast({
            title: 'Cảnh báo!',
            // subtitle: '11 mins ago',
            content: 'Bạn đã chọn sai định dạng file.',
            type: 'warning',
            delay: 3000,
        });
        // $('.toast').toast('show');
        uploads.value = null;
        handleSubmit(false);
        $('.input-content').html(`Chọn file hoặc kéo thả vào đây.`);
        return;
    }
    //Xử lý sự kiện số lượng file
    if (files.length == 0) {
        $.toast({
            title: 'Cảnh báo!',
            // subtitle: '11 mins ago',
            content: 'Bạn phải nhập ít nhất một file.',
            type: 'warning',
            delay: 3000,
        });
        // $('.toast').toast('show');
        handleSubmit(false);
        $('.input-content').html(`Chọn file hoặc kéo thả vào đây.`);
    } else if (files.length <= limit && files.length > 0) {
        $.toast({
            title: 'Thông báo!',
            // subtitle: '11 mins ago',
            content: 'Bạn đã chọn file thành công.',
            type: 'info',
            delay: 3000,
        });
        // $('.toast').toast('show');
        handleSubmit(true);

        //Thêm tên file upload
        $('.input-content').html(
            `${[...files]
                .map(
                    (item) => `<div class="input-over-text">${item.name}</div>`
                )
                .join('')}`
        );
    } else {
        $.toast({
            title: 'Cảnh báo!',
            // subtitle: '11 mins ago',
            content: 'Bạn đã nhập quá số file cho phép.',
            type: 'warning',
            delay: 3000,
        });
        // $('.toast').toast('show');
        uploads.value = null;
        handleSubmit(false);
        $('.input-content').html(`Chọn file hoặc kéo thả vào đây.`);
    }
}

//Hàm xử lý sự kiện không cho submit
function pd(e) {
    $.toast({
        title: 'Cảnh báo!',
        // subtitle: '11 mins ago',
        content: 'Bạn phải nhập đúng số lượng file tương ứng.',
        type: 'warning',
        delay: 3000,
    });
    // $('.toast').toast('show');
    e.preventDefault(); // prevents the form from being submitted
}

//Disable nút submit
// btnUpload.classList.add("disabled");
btnUpload.addEventListener('click', pd);

//Hàm xử lý validate chung cho các input Tên

function handleSubmit(value) {
    if (value) {
        // btnUpload.classList.remove("disabled");
        btnUpload.removeEventListener('click', pd);
    } else {
        // btnUpload.classList.add("disabled");
        btnUpload.addEventListener('click', pd);
    }
}

