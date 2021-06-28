function formatBytes(bytes, decimals = 2) {
    if (bytes === 0) return '0 Bytes';

    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

    const i = Math.floor(Math.log(bytes) / Math.log(k));

    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}
$(document).ready(function () {
    getAptFile(0, 0, 0);
    function getAptFile(sortName, sortDate, sortSize) {
        let params =
            '?' +
            (sortName !== 0 ? 'sortName=' + sortName : '') +
            (sortDate !== 0 ? '&sortDate=' + sortDate : '') +
            (sortSize !== 0 ? '&sortSize=' + sortSize : '');
        if (params === '?') {
            params = '';
        }
        $('#bodyTable').empty();
        $('#bodyTable').append('<div class="loader"></div>');
        $.ajax({
            url: './api_get_file.php' + params,
            type: 'get',
            dataType: 'json',
            success: function (result) {
                $('#bodyTable').empty();
                let html = '';
                $.each(result, function (key, value) {
                    html += '<tr>';
                    html += '<td>' + (key + 1) + '</td>';
                    html += '<td>' + value.pathInfo.filename + '</td>';
                    html +=
                        '<td>' +
                        new Date(value.updatedAt * 1000).toLocaleString() +
                        '</td>';
                    html += '<td>' + formatBytes(value.fileSize) + '</td>';
                    html += '</tr>';
                });
                $('#bodyTable').append(html);
            },
        });
    }

    // let sortName = 0;
    // let sortUpdatedAt = 0;
    // let sortSize = 0;

    $('#name1').on('click', function () {
        $('#name').text('Từ A-Z');
        $('#name').attr('value', 1);
        $('#date').text('Ngày tải lên');
        $('#date').attr('value', '');
        $('#size').text('Kích thước');
        $('#size').attr('value', '');
        getAptFile(1, 0, 0);
    });
    $('#name2').on('click', function () {
        $('#name').text('Từ Z-A');
        $('#name').attr('value', -1);
        $('#date').text('Ngày tải lên');
        $('#date').attr('value', '');
        $('#size').text('Kích thước');
        $('#size').attr('value', '');
        getAptFile(-1, 0, 0);
    });

    $('#date1').on('click', function () {
        $('#name').text('Tên');
        $('#name').attr('value', '');
        $('#date').text('Mới nhất');
        $('#date').attr('value', 1);
        $('#size').text('Kích thước');
        $('#size').attr('value', '');
        getAptFile(0, 1, 0);
    });
    $('#date2').on('click', function () {
        $('#name').text('Tên');
        $('#name').attr('value', '');
        $('#date').text('Cũ nhất');
        $('#date').attr('value', -1);
        $('#size').text('Kích thước');
        $('#size').attr('value', '');
        getAptFile(0, -1, 0);
    });

    $('#size1').on('click', function () {
        $('#name').text('Tên');
        $('#name').attr('value', '');
        $('#date').text('Ngày tải lên');
        $('#date').attr('value', '');
        $('#size').text('Tăng dần');
        $('#size').attr('value', 1);
        getAptFile(0, 0, 1);
    });
    $('#size2').on('click', function () {
        $('#name').text('Tên');
        $('#name').attr('value', '');
        $('#date').text('Ngày tải lên');
        $('#date').attr('value', '');
        $('#size').text('Giảm dần');
        $('#size').attr('value', -1);
        getAptFile(0, 0, -1);
    });
    $('#reset').on('click', function () {
        $('#name').text('Tên');
        $('#name').attr('value', '');
        $('#date').text('Ngày tải lên');
        $('#date').attr('value', '');
        $('#size').text('Kích thước');
        $('#size').attr('value', '');
        getAptFile(0, 0, 0);
    });
});
