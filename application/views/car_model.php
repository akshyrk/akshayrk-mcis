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
    <?php $this->load->view('js') ?>  
    <?php $this->load->view('css') ?>  
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
                <h2>Add Car Model</h2>
            </div>
            <div class="content-bottom">
                <form id="add_manufacturer_form" role="form">
                    <div class="field_w3ls">
                        <div class="field-group">
                            <input name="car_model_name" id="car_model_name" type="text" placeholder="Enter Model Name" maxlength="50" required>
                        </div>
                    </div>
                    <div class="field_w3ls">
                        <div class="field-group">
                            <input name="car_model_count" id="car_model_count" type="number" placeholder="Enter Count" maxlength="10" required>
                        </div>
                    </div>

                    <div class="field_w3ls">
                        <select class="form-control" id="manufacturer_list" name="manufacturer_list" required>
                            <option value="" disabled selected>Select Manufacturer</option>
                            <?php if(@$data): ?>
                            <?php foreach ($data as $manufacturers_data) : ?>
                                <option value="<?= $manufacturers_data->name ?>"><?= $manufacturers_data->name ?></option>
                            <?php endforeach ; ?>
                            <?php endif; ?>
                        </select>    
                    </div>

                    <div class="col-md-12 pdt"></div>
                    <div class="col-md-12 pdt"></div>
                    <div class="wthree-field">
                        <input id="add_cars_model" name="add_cars_model" type="submit" value="Add" />
                    </div>
                </form>
            </div>
            <div class="col-md-12 pdt"></div>
            <div class="col-md-12 pdt"></div>
            <div class="col-md-12 pdt"></div>
            <div class="wthree-field">
                <button class="btn-sty" id="add_new_manufacturer">Add New Manufacturer</button>
            </div>
            <div class="col-md-12 pdt"></div>
            <div class="wthree-field">
                <button class="btn-sty" id="view_car_inventory1">View Inventory</button>
            </div>
        </div>
    </div>

    <script>

        $("#add_manufacturer_form").submit(function(e) {
            var form = $(this);

            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>"+"Pages/add_car_model",
                data: form.serialize(), 
                success: function(data)
                {
                    //console.log(data);
                    if(data == "inserted"){
                        alert("Car Model saved successfully");
                        $("#car_model_name").val('');
                        $("#car_model_count").val('');
                        $("#manufacturer_list").val('');
                    }else{
                        alert("Error occured while saving Car Model");
                        $("#car_model_name").val('');
                        $("#car_model_count").val('');
                        $("#manufacturer_list").val('');
                    }
                },
                error: function(error){
                    alert("Error occured while saving Car Model");
                }
            });
            e.preventDefault();
        });

        $("#add_new_manufacturer").click(function(){
            window.location.href = "<?= base_url() ?>"+"Pages";
        });

        $("#view_car_inventory1").click(function(){
            window.location.href = "<?= base_url() ?>"+"Pages/view_inventory";
        });

    </script>

</body>
</html>