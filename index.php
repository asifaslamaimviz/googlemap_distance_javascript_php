<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - distance between two points</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="./style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet"id="bootstrap-css">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <style>
    body {
        margin-top: 40px;
    }

    .stepwizard-step p {
        margin-top: 10px;
    }

    .stepwizard-row {
        display: table-row;
    }

    .stepwizard {
        display: table;
        width: 100%;
        position: relative;
    }

    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }

    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;

    }

    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
    </style>
    <!-- partial:index.partial.html -->
    <!-- Google map here hidden -->
    <div class="map" id="map" style="display:none;"></div>
     <div class="data-box" style="display:none;">
        <div class="box" id="resultDistance" name="resultDistance"></div>
        <div id="resultDuration" class="box"></div>
        <div id="result" class="box" style="color: #ff7e7e"></div>
    </div>
    </div>
            <!--  Step-Forms  -->
    <div class="wrapper">
        <form action="" id="formDestination" method="post">
            <div class="container">
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle"></a>
                            <p>Step 1</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"></a>
                            <p>Step 2</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled"></a>
                            <p>Step 3</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled"></a>
                            <p>Step 4</p>
                        </div>
                    </div>
                </div>
                <!-- Step 1 -->
                <div class="row setup-content" id="step-1">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> Step 1</h3>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label class="control-label">Full Name</label>
                                        <input maxlength="100" type="text" name="f_name" class="form-control"
                                            placeholder="Enter Full Name" />
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label class="control-label">Email Address</label>
                                        <input maxlength="100" type="text" name="email_add" class="form-control"
                                            placeholder="Enter Email Address" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label class="control-label">Phone Number</label>
                                        <input maxlength="100" type="text" name="p_no" class="form-control"
                                            placeholder="Enter Phone Number" />
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label class="control-label">Country</label>
                                        <input maxlength="100" type="text" name="coun" class="form-control"
                                            placeholder="Enter Country" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Enter Pickup / Return Address</label>
                                <input maxlength="100" type="text" name="pick_add" class="form-control"
                                    placeholder="Enter Pickup / Return Address" />
                            </div>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="row setup-content" id="step-2">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> Step 2</h3>
                            <div class="form-group">
                                <label class="control-label">Address Line</label>
                                <input maxlength="200" type="text" id="fromPlaces" name="pick_add_line"
                                    class="form-control" placeholder="Enter Address Line" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">City</label>
                                <input maxlength="200" type="text" name="pick_city" class="form-control"
                                    placeholder="Enter City" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">ZIP</label>
                                <input maxlength="200" type="text" name="pick_zip" class="form-control"
                                    placeholder="Enter ZIP" />
                            </div>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                            <button class="btn btn-success preBtn btn-lg " type="button">Back</button>
                        </div>
                    </div>
                </div>
                <!-- Step 3 -->
                <div class="row setup-content" id="step-3">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> Step 3</h3>
                            <div class="form-group">
                                <label class="control-label">Address Line</label>
                                <input maxlength="200" type="text" id="toPlaces" name="drop_add_line"
                                    class="form-control" placeholder="Enter Address Line" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">City</label>
                                <input maxlength="200" type="text" name="drop_city" class="form-control"
                                    placeholder="Enter City" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">ZIP</label>
                                <input maxlength="200" type="text" name="drop_zip" class="form-control"
                                    placeholder="Enter ZIP" />
                            </div>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                                id="submitDestination">Next</button>
                            <button class="btn btn-success preBtn btn-lg " type="button">Back</button>
                        </div>
                    </div>
                </div>
                <!-- Step 4 -->
                <div class="row setup-content" id="step-4">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> Step 4</h3>
                            <input type="hidden" id="nameofid" name="nameofid" class="form-control" readonly
                                placeholder="Enter a location" value="" />
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label class="control-label">Receiver Name</label>
                                        <input maxlength="200" type="text" name="rec_name" class="form-control"
                                            placeholder="Enter Receiver Name" />
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label class="control-label">Receiver Email</label>
                                        <input maxlength="200" type="text" name="rec_email" class="form-control"
                                            placeholder="Enter City" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Receiver Contact Number</label>
                                <input maxlength="200" type="text" name="rec_con_numb" class="form-control"
                                    placeholder="Enter Receiver Contact Number" />
                            </div>
                            <button name="insert" id="insert" type="submit"
                                class="btn btn-primary mb-2 float-right">Save</button>
                            <button class="btn btn-success preBtn btn-lg" type="button">Back</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <!-- partial -->
    <script
        src='https://maps.googleapis.com/maps/api/js?libraries=places&amp;language=en&amp;key=AIzaSyD61CGRsenVDXkRMrBzxQnVTtL7EZz0k_c'>
    </script>
    <script src="./script.js"></script>
    <script>
    $(document).ready(function() {
        //          step-form functionality
        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');
            allPreBtn = $('.preBtn');
            allWells.hide();
            navListItems.click(function(e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);
            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });
        allPreBtn.click(function() {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev()
                .children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }
            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });
                allNextBtn.click(function() {
                var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next()
                .children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;
            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }
            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });
                $('div.setup-panel div a.btn-primary').trigger('click');
                //          Ajax functionality  
                $('#insert').on("click", function(event) {
                event.preventDefault();
                $.ajax({
                url: "distance_api.php",
                method: "POST",
                data: $('#formDestination').serialize(),
                success: function(data) {
                    console.log(data);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'New record created successfully',
                        showConfirmButton: false,
                        timer: 2500
                    })
                    $('#formDestination')[0].reset();
                    window.location.reload();
                }
            });

        });

    });
    </script>
</body>

</html>