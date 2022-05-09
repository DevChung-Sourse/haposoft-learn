$(document).ready(() => {
    $('.star').on('click', function () {
        $('.star').addClass('selected');
        let count = $(this).attr('name');
        for (let i = 0; i < count - 1; i++) {
            $('.star').eq(i).removeClass('selected');
        }
    });
})
