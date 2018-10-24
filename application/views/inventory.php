<?php
    /*echo "<pre>";
    print_r($data);
    exit(); */
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Mini Car Inventory System | Add Manufacturer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Mini Car Inventory System">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/style.css" type="text/css" media="all">
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/fontawesome-all.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>

    <style type="text/css">
        .pdt {
            height:10px;
        }
    </style>
    

</head>


<body>
    <h1 class="title-agile text-center bck-clr">Mini Car Inventory System</h1>
    <div class="content-w3ls">
        <div class="agileits-grid">
            <div class="content-top-agile">
                <h2>Inventory</h2>
            </div>
            <div class="content-bottom">
                <div class="table-responsive">
                    <table id="view_inventory" class="table table-striped table-hover table-responsive table-bordered table-sm" style="font-size: small">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Model Name</th>
                                <th>Count</th>
                                <th>Manufacturer</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(@$data): ?>
                                <?php foreach ($data as $inventory_data) : ?>
                                    <tr>
                                        <td></td>
                                        <td><?= $inventory_data->name ?></td>
                                        <td><?= $inventory_data->count ?></td>
                                        <td><?= $inventory_data->manufacturers_name ?></td>
                                        <td>
                                            <button id="sold_item<?= $inventory_data->id ?>" class="btn btn-default sold-items">sold</button>
                                        </td>
                                    </tr>
                                <?php endforeach ; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12 pdt"></div>
            <div class="col-md-12 pdt"></div>
            <div class="col-md-12 pdt"></div>
            <div class="wthree-field">
                <button class="btn-sty" id="add_manufacturer2">Add New Manufacturer</button>
            </div>
            <div class="col-md-12 pdt"></div>
            <div class="wthree-field">
                <button class="btn-sty" id="add_car_model2">Add Car Model</button>
            </div>
        </div>
    </div>
    
    
    <script>

        $(document).ready(function() {
            var t = $('#view_inventory').DataTable( {
                "columnDefs": [ {
                    "searchable": true,
                    "orderable": false,
                    "targets": 0
                } ],
                "order": [[ 1, 'asc' ]]
            } );
         
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                }) ;
            }).draw();

            $('#view_inventory').add('[id^=sold_item]').on('click', '.sold-items', function() {
            var id = $(this).attr('id');
            var new_id = id.replace('sold_item', '');
            //alert(new_id);
            var url = '<?= base_url('Pages/sold_item') ; ?>';

                bootbox.confirm({
                    title: "Sold Confirmation!",
                    message: "Do you really want to sold this item",
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> Cancel'
                        },
                        confirm: {
                            label: '<i class="fa fa-check"></i> Confirm'
                        }
                    },
                    callback: function (result) {
                        console.log('This was logged in the callback: ' + result);
                        if (result) {

                            $.ajax({
                                url: url,
                                type: "POST",
                                data: {'new_id': new_id},
                                success: function (result) {

                                    if(result == "deleted"){
                                        bootbox.alert({
                                            message: "Model Sold Successfully",
                                            callback: function () {
                                                location.reload();
                                            }
                                        });
                                    }
                                    if(result == "record deleted"){
                                        bootbox.alert({
                                            message: "Model Sold Successfully and this model out of stock now!",
                                            callback: function () {
                                                location.reload();
                                            }
                                        });
                                    }
                                    if(result == "false"){
                                        bootbox.alert({
                                            message: "Error while sold Model",
                                            callback: function () {
                                                location.reload();
                                            }
                                        });
                                    }
                                    
                                },
                                error: function (error) {
                                    alert("Error")
                                }
                            });
                        }
                    }
                });
            });

        });
        



        $("#add_manufacturer2").click(function(){
            window.location.href = "<?= base_url() ?>"+"Pages/";
        });

        $("#add_car_model2").click(function(){
            window.location.href = "<?= base_url() ?>"+"Pages/add_model";
        });

    </script>

</body>
</html>