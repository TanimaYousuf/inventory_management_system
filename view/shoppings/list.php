<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventory Management System</title>
    <?php include "view/layouts/styles.php" ?>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include "view/layouts/header.php" ?>
    <div class="container-fluid page-body-wrapper">
    <?php include "view/layouts/sidebar.php" ?>
        <div class="main-panel users-list-main-panel">
            <div class="content-wrapper" >
                <div id="alert-show">

                </div>
                <div class="row">
                    <div class="col-md-5">
                        <h3 class="users-list-title">Inventory Management</h3>
                        <hr class="Dash-Line">
                    </div>
                    <div class="col-md-7 task_Status_date_filter">
                        <span class="btn-hover"><button class="Rectangle-btn form-submit" type="button" style="float: right; margin-top:5px;"><i class="fas fa-search" style="margin-right:5px;"></i>Search</button></span>
                        <button type="reset" class="btn-custom-reset" id="reset" style="float:right; margin-top:10px; border: none;background: content-box; color:#009877">Clear</button>
                        
                        <span class='right-inner-addon date datepicker end-date-box' style="float:right;">
                            <i class="fa fa-calendar-o"></i>
                            <input name='end_date' value="" type="text" data-date="" data-date-format="d M, yyyy" class="date-picker task-list-filter" placeholder="To" autocomplete="off" id="end_date"/>
                            <p class="error end_date-error" style="color:red;"></p>
                        </span>
                        
                        <span class='right-inner-addon date datepicker start-date-box' style="float:right;">
                            <i class="fa fa-calendar-o"></i>
                            <input name='start_date' value="" type="text" data-date="" data-date-format="d M, yyyy" class="date-picker task-list-filter" placeholder="From" autocomplete="off" id="start_date"/>
                            <p class="error start_date-error" style="color:red;"></p>
                        </span>
                        
                    </div>
                </div>
                <div class="row DataTableBox">
                    <div class="row users-list-table-subHeader">
                        <div class="col-sm-5 subHeader-col-1">
                            <div class="form-inline">
                                <span><b>All Shopping List</b></span>
                                <input class="form-control user-list-search" style="height: 20px;" type="search" placeholder="Search by id..." aria-label="Search" id="search_key">
                            </div>
                        </div>
                        <div class="col-sm-7 subHeader-col-2">
                            <a class="btn-hover" href="index.php?controller=shopping&action=create"><button class="user-list-New-User">New Shopping</button></a>
                        </div>
                    </div>
                    <div>
                      <hr>
                    </div>

                    <div class="shopping-table-section">
                        <?php include "view/shoppings/fetch_shopping.php" ?>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
    </div>
</div>
        <!-- page-body-wrapper ends -->
        <!-- container-scroller -->

        <?php include "view/layouts/scripts.php" ?>
        <script type="text/javascript">
            $(document).ready(function(){
                    $(".fa-calendar-o").on("click", function(){
                    $(this).siblings("input").datepicker({
                        forceParse:false,
                        autoclose: true,
                        immediateUpdates: true,
                        todayBtn: true,
                        todayHighlight: true
                    });

                    // $(this).siblings("input").datepicker('update', new Date());
                   $(this).siblings("input").datepicker('show');
               });

               $("#reset").click(function(){
                    $("#start_date").val('');
                    $("#end_date").val('');
                    $("#search_key").val('');
                    formSubmit();
               })
               $("#search_key").keyup(function(){
                    formSubmit();
               });

               $('.form-submit').click(function(){
                    var flag = '';
                    if($('#start_date').val() == ''){
                        $(".start_date-error").html("From field is required");
                        flag='start_date_error';
                    }
                    else if($('#start_date').val() != ''){
                        if($('#end_date').val() == ''){
                            $(".end_date-error").html("To field is required");
                            flag = 'end_date';
                        }
                        if(($('#start_date').val() != '') && ($('#end_date').val() != '')){
                            var startDateTimeInMillis = Date.parse($('#start_date').val());
                            var endDateTimeInMillis = Date.parse($('#end_date').val());
                            if(startDateTimeInMillis > endDateTimeInMillis){
                                $(".start_date-error").html("From should smaller than To");
                                flag = 'start_date_not_equal';
                            }
                        }
                    }
                    if(flag == ''){
                        formSubmit();
                    }
                });
            });

            function formSubmit(){
                var query = $("#search_key").val();
                var from = $("#start_date").val();
                var to = $("#end_date").val();
                $.ajax({
                    url:"controller/fetchShopping.php",
                    type:"post",
                    data:{query:query,from:from,to:to},
                    success:function(data){
                        console.log(data);
                        $('tbody').html(data);
                    }
                });
            }
        </script>

</body>

</html>
