<?php
session_start();
if (!isset($_SESSION["data"])) {
    header('location:form_booking.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('include/head.php')
    ?>
    <link rel="stylesheet" href="admin/plugins/fullcalendar/main.css">
    <link rel="stylesheet" href="simplePagination.css">
</head>
<style>
    a.form-btn {
        border: none;
        background-color: white;
        border: 2px solid #B90072;
        color: #B90072 !important;
        padding: 5px 20px;
        font-size: 1.25em;
        border-radius: 20px;
        cursor: pointer;
    }

    .form-btn {
        border: none;
        background-color: white;
        border: 2px solid #B90072;
        color: #B90072 !important;
        padding: 5px 20px;
        font-size: 1.25em;
        border-radius: 20px;
        cursor: pointer;
    }

    .form-btn:hover {
        background-color: #B90072;
        color: white !important;
        border: 2px solid white;
        transition: 0.25s;
    }

    a.form-btn-2 {
        border: none;
        background-color: #B90072;
        color: white !important;
        padding: 5px 20px;
        font-size: 1.25em;
        border-radius: 20px;
        cursor: pointer;
    }

    a.form-btn:hover {
        background-color: #B90072;
        color: white !important;
        border: 2px solid white;
        transition: 0.25s;
    }

    a.form-btn-2:hover {
        background-color: white;
        color: #B90072 !important;
        border: 2px solid #B90072;
        transition: 0.25s;
    }
</style>

<body class="animsition">

    <!-- Header -->
    <?php
    include('include/header.php')
    ?>
    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="index.php" class="breadcrumb-item f1-s-3 cl9">
                    หน้าแรก
                </a>

                <span class="breadcrumb-item f1-s-3 cl9">
                    จองคิวขอใช้บริการ <code>ปรับเป็น dynamic</code>
                </span>
            </div>
        </div>
    </div>
    <!-- Page heading -->
    <div class="container p-t-4 p-b-20">
        <h2 class="f1-l-1 cl2">
            จองคิวขอใช้บริการ
            <code>สร้าง Session ในการตรวจสอบการกรอกข้อมูล ตรงปุ่มย้อนกลับให้ทำการทำลาย Sesstion กรณีมี 2 เดือนให้มีปุ่มถัดไปเพื่อเดือนถัดไปด้วย</code>
        </h2>
    </div>
    <!-- Post -->
    <section class="bg0 p-b-55">
        <div class="container">
            <div class="row justify-content-center align-items-start">
                <div class="col-lg-12">
                    <div class="row py-3">
                        <div class="col-md-12 col-lg-12 p-b-80">
                            <div class="p-r-10 p-r-0-sr991">
                                <div class="mb-3">
                                    <a href="form_booking.php" class="btn btn-secondary text-white">ย้อนกลับ</a>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div id="pagination-container"></div>
                                </div>
                                <!-- Date Selector  -->
                                <div class="list-wrapper">
                                    <?php
                                    require_once('admin/staff/api/date_range.php');
                                    $myobj  = get_date_cal($conn);
                                    $last =  count($myobj);
                                    foreach ($myobj as $key => $val) {
                                    ?>
                                        <!-- StartLoop -->

                                        <div class="list-item">
                                            <div class="text-center">
                                                <div class="card bg-dark">
                                                    <div class="card-body">
                                                        <h1 class="f1-l-4 text-light" style="font-size:3em;">
                                                            <?= get_mounth($val["M"])[0] ?> <?= $val["Y"] ?>
                                                        </h1>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <!-- V1 -->
                                                <?php
                                                if ($key != $last - 1) {
                                                    for ($i = $val["S_D"]; $i <= $val["first_mounth_cout"]; $i++) {
                                                        $date = sprintf('%s-%s-%s', $i, $val["M"], $val["Y"]);
                                                ?>
                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-3">
                                                            <div class="card text-center bg-dark text-white">
                                                                <div class="card-header h1">
                                                                    วันที่ <?= $i ?>
                                                                </div>
                                                                <div class="card-body">
                                                                    <button onclick="booking('<?= $date ?>','<?= $val['ref'] ?>')" href="booking_complete.php?date=<?= $date ?>" class="btn form-btn btn-block mb-3">จองคิว</button>
                                                                    <p class="mb-3 f1-m-3">จองแล้ว <span class="text-danger">12</span> คน</p>
                                                                    <p class="mb-3 f1-m-3">ยังไม่ได้จอง <span class="text-success">12</span> คน</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                } else {
                                                    for ($i = $val["S_D"]; $i <= $val["E_D"]; $i++) {
                                                        $date = sprintf('%s-%s-%s', $i, $val["M"], $val["Y"]);
                                                    ?>
                                                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-3">
                                                            <div class="card text-center bg-dark text-white">
                                                                <div class="card-header h1">
                                                                    วันที่ <?= $i ?>
                                                                </div>
                                                                <div class="card-body">
                                                                    <button onclick="booking('<?= $date ?>','<?= $val['ref'] ?>')" href="booking_complete.php?date=<?= $date ?>" class="btn form-btn btn-block mb-3">จองคิว</button>
                                                                    <p class="mb-3 f1-m-3">จองแล้ว <span class="text-danger">12</span> คน</p>
                                                                    <p class="mb-3 f1-m-3">ยังไม่ได้จอง <span class="text-success">12</span> คน</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <!-- EndLoop -->
                                </div>
                                <!-- .End Date Selector -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php
    include("include/footer.php")
    ?>

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <span class="fas fa-angle-up"></span>
        </span>
    </div>

    <!-- Modal Video 01-->
    <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

            <div class="wrap-video-mo-01">
                <div class="video-mo-01">
                    <iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="admin/plugins/jquery/jquery.js"></script>
    <script src="jquery.simplePagination.js"></script>
    <!--===============================================================================================-->
    <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="admin/plugins/moment/moment.min.js"></script>
    <script src="admin/plugins/fullcalendar/main.js"></script>
    <!--===============================================================================================-->

    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <!-- <script src="vendor/bootstrap/js/popper.js"></script> -->
    <!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <!--===============================================================================================-->
    <!-- <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script> -->
    <!--===============================================================================================-->
    <!-- <script src="admin/plugins/moment/moment.min.js"></script> -->
    <!-- <script src="admin/plugins/fullcalendar/main.js"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {

            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function() {

                    // create an Event Object (https://fullcalendar.io/docs/event-object)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 1070,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0 //  original position after the drag
                    })

                })
            }

            ini_events($('#external-events div.external-event'))

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            var containerEl = document.getElementById('external-events');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');

            // initialize the external events
            // -----------------------------------------------------------------

            new Draggable(containerEl, {
                itemSelector: '.external-event',
                eventData: function(eventEl) {
                    return {
                        title: eventEl.innerText,
                        backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                        borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                        textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                    };
                }
            });

            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                //Random default events
                events: [{
                        title: 'All Day Event',
                        start: new Date(y, m, 1),
                        backgroundColor: '#f56954', //red
                        borderColor: '#f56954', //red
                        allDay: true
                    },
                    {
                        title: 'Long Event',
                        start: new Date(y, m, d - 5),
                        end: new Date(y, m, d - 2),
                        backgroundColor: '#f39c12', //yellow
                        borderColor: '#f39c12' //yellow
                    },
                    {
                        title: 'Meeting',
                        start: new Date(y, m, d, 10, 30),
                        allDay: false,
                        backgroundColor: '#0073b7', //Blue
                        borderColor: '#0073b7' //Blue
                    },
                    {
                        title: 'Lunch',
                        start: new Date(y, m, d, 12, 0),
                        end: new Date(y, m, d, 14, 0),
                        allDay: false,
                        backgroundColor: '#00c0ef', //Info (aqua)
                        borderColor: '#00c0ef' //Info (aqua)
                    },
                    {
                        title: 'Birthday Party',
                        start: new Date(y, m, d + 1, 19, 0),
                        end: new Date(y, m, d + 1, 22, 30),
                        allDay: false,
                        backgroundColor: '#00a65a', //Success (green)
                        borderColor: '#00a65a' //Success (green)
                    },
                    {
                        title: 'Click for Google',
                        start: new Date(y, m, 28),
                        end: new Date(y, m, 29),
                        url: 'https://www.google.com/',
                        backgroundColor: '#3c8dbc', //Primary (light-blue)
                        borderColor: '#3c8dbc' //Primary (light-blue)
                    }
                ],
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function(info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                }
            });

            calendar.render();
            // $('#calendar').fullCalendar()

            /* ADDING EVENTS */
            var currColor = '#3c8dbc' //Red by default
            // Color chooser button
            $('#color-chooser > li > a').click(function(e) {
                e.preventDefault()
                // Save color
                currColor = $(this).css('color')
                // Add color effect to button
                $('#add-new-event').css({
                    'background-color': currColor,
                    'border-color': currColor
                })
            })
            $('#add-new-event').click(function(e) {
                e.preventDefault()
                // Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                    return
                }

                // Create events
                var event = $('<div />')
                event.css({
                    'background-color': currColor,
                    'border-color': currColor,
                    'color': '#fff'
                }).addClass('external-event')
                event.text(val)
                $('#external-events').prepend(event)

                // Add draggable funtionality
                ini_events(event)

                // Remove event from text input
                $('#new-event').val('')
            })
        })
    </script>
</body>
<script>
    // jQuery Plugin: http://flaviusmatis.github.io/simplePagination.js/

    var items = $(".list-wrapper .list-item");
    var numItems = items.length;
    var perPage = 1;
    var li = $('#pagination-container ul li')
    items.slice(perPage).hide();

    $('#pagination-container').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "&laquo;",
        nextText: "&raquo;",
        onPageClick: function(pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });
    // console.log(li[0].remove());
</script>
<script type="text/javascript">
    function booking(date, id) {
        Swal.fire({
            title: 'คุณแน่ใจไหมที่จะจองวันนี้?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = "src/booking_last_check.php?date=" + date + "&id=" + id;
            }
        })
    }
</script>

</html>