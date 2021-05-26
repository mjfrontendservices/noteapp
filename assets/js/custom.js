$(document).ready(function () {

    // add note trigger

    $('.addnotetrigger').click(function () {
        $('.notes .noteinput form').slideDown();
        $('.notes .noteinput .canceladdnote').show();
        $(this).hide();
    });

    $('.canceladdnote').click(function () {
        $('.notes .noteinput form').slideUp();
        $('.notes .noteinput .addnotetrigger').show();
        $(this).hide();
    });

    // navigations

    $('.nav_all_notes').click(function () {
        window.location.href = "./index.php";
    });

    $('.nav_done').click(function () {
        window.location.href = "./donepage.php";
    });

    $('.nav_deleted').click(function () {
        window.location.href = "./deletedpage.php";
    });

})