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
                <h2>Add Manufacturer</h2>
            </div>
            <div class="content-bottom">
                <form id="add_manufacturer_form" role="form">
                    <div class="field_w3ls">
                        <div class="field-group">
                            <input name="manufacturer" id="manufacturer" type="text" placeholder="Enter Manufacturer Name" maxlength="50" required>
                        </div>
                    </div>
                    <div class="wthree-field">
                        <input id="add_manufacturer" name="add_manufacturer" type="submit" value="Add" />
                    </div>
                </form>
            </div>
            <div class="col-md-12 pdt"></div>
            <div class="col-md-12 pdt"></div>
            <div class="col-md-12 pdt"></div>
            <div class="wthree-field">
                <button class="btn-sty" id="add_car_model" name="add_car_model">Add Car Model</button>
            </div>
            <div class="col-md-12 pdt"></div>
            <div class="wthree-field">
                <button class="btn-sty" id="view_car_inventory" name="view_car_inventory">View Inventory</button>
            </div>
        </div>
    </div>

    <script>
        
    
        $("#add_manufacturer_form").submit(function(e) {
            var form = $(this);

            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>"+"Pages/add_manufacturer",
                data: form.serialize(), 
                success: function(data)
                {
                    if(data == "inserted"){
                        alert("Manufacturer saved successfully");
                        $("#manufacturer").val('');
                    }if(data == "failed"){
                        alert("Error occured while saving Manufacturer");
                        $("#manufacturer").val('');
                    }
                    if(data == "exists"){
                        alert("Manufacturer name already exists");
                    }
                },
                error: function(error){
                    alert("Error occured while saving Manufacturer");
                }
            });
            e.preventDefault();
        });

        $("#add_car_model").click(function(){
            window.location.href = "<?= base_url() ?>"+"Pages/add_model";
        });

        $("#view_car_inventory").click(function(){
            window.location.href = "<?= base_url() ?>"+"Pages/view_inventory";
        });

    </script>

</body>
</html>