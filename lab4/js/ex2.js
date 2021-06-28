let limit = '1';

//Xử lý sự kiện thay đổi các giá trị của số file cần tải
$('#number').on('change', function () {
    limit = $('#number').val();
    $('#uploads').fileinput('clear');
    $('#uploads').fileinput('refresh', {
        maxTotalFileCount: limit,
    });
});
$('#uploads').fileinput({
    theme: 'fas',
    uploadUrl: './api_upload_file.php', // you must set a valid URL here else you will get an error
    allowedFileExtensions: [
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
    ],
    overwriteInitial: false,
    language: 'vi',
    maxFileSize: 10000,
    maxTotalFileCount: limit,
    //allowedFileTypes: ['image', 'video', 'flash'],
    slugCallback: function (filename) {
        return filename.replace('(', '_').replace(']', '_');
    },
});
