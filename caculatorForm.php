
<html>
<style>
    .card{
        border: solid 1px #0000000f;
    }
    .card-header {
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
        padding: .75rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(0,0,0,.03);
    }
    .flex-row{
        display: flex;
    }
    .left-col{
        text-align: left;
        max-width: 20%;
        width: 15%;
    }
    .right-col{
        max-width: 80%;
        width: 80%;
    }

</style>
<body>
    <div class="col-lg-5 col-sm-12 col-12">
          
        <div class="card">
            <div class="card-header">
                <h5 class="card-title" style="padding:0px;margin:0px;">Tính giá tem nhãn tự động</h5>
            </div>
            <div class="card-body">
                <p class="text-dark" style="font-size:12px;"><i>Vui lòng nhập kích thước, số lượng và chất liệu decal</i></p>
                <form id="calculate_form" name="caculator_form">
                    <div class="flex-row">
                        <label class="left-col">Nhập kích thước <span class="text-danger">(Đơn vị milimet)</span></label>
                        <div>
                            <input type="number" placeholder="Ngang (mm)" name="width" id="cal_width">
                        </div>
                        <div>
                            <input type="number" placeholder="Cao (mm)" name="cal_height">    
                        </div>
                    </div>
                    <div class="flex-row">
                        <label class="left-col">Số lượng cần in</label>
                        <div class="right-col">
                            <input type="number" placeholder="Nhập số lượng nhãn in" name="amount" id="cal_amout">
                        </div>
                    </div>
                    <div class="flex-row">
                        <label class="left-col">Loại in ấn</label>
                        <div class="right-col">
                            <select name="print_type" id="print_type">
                                <?php foreach ($print->in_an as $pr) : ?>
                                    <option value="<?php echo $pr ?>"><?php echo $pr ?> </option>
                                <?php endforeach?>
                                
                            </select>
                        </div>
                    </div>
                    <div class="flex-row">
                        <label class="left-col">Chất liệu</label>
                        <div class="right-col">
                            <select name="decal_type" id="decal_type">
                                <?php foreach ($print->chat_lieu as $pr) : ?>
                                    <option value="<?php echo $pr ?>"><?php echo $pr ?> </option>
                                <?php endforeach?>
                            </select>
                        </div>
                    </div>
                    <div class="flex-row">
                        <label class="left-col">Gia công</label>
                        <div class="right-col">
                            <select id="menbran_type" name="menbran_type">
                            <?php foreach ($print->gia_cong as $pr) : ?>
                                <option value="<?php echo $pr ?>"><?php echo $pr ?> </option>
                            <?php endforeach?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script>
    $('#calculate_form input,#calculate_form input').change(function(){
        if(validateCal()){
            $.ajax({
                url: '/crawl/api.php?action=get-price',
                type: 'GET',
                contentType: "application/json",
                dataType: 'html',
                data: {
                    "cal_width": $('#cal_width').val(),
                    "cal_height": $('#cal_height').val(),
                    "cal_amout": $('#cal_amout').val(),
                    "print_type": $('#print_type').val(),
                    "decal_type": $('#decal_type').val(),
                    "menbran_type": $('#menbran_type').val(),
                    
                },
                success: function(data) {
                //  alert(jQuery.dataType);
                    debugger
                    alert("No1");

                },
                error: function() {
                    alert("No");
                }
            })
        }
    })

    function validateCal(){
        var check = true;
        $.each($('#calculate_form')[0].elements, function(index, e){
            if(e.value == ''){
                check = false;
                return;
            }
        });
        return check;
    }
</script>
</body>


</html>