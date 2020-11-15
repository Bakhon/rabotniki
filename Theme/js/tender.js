$('#btn_tender').click(function(){
  var tender_id = $('#hidden_id_tender').val();
  var tender_city = $('#tender-city').val();
  var tender_address = $('#tender-address').val();
  var tender_title = $('#tender-title').val(); 
  var text_editor = $('#texteditor').val();
  var i = $('#i0').val();
  var i1 = $('#i1').val();
  var i2 = $('#i2').val();
  var i3 = $('#i3').val();
  var price = $('#tender-budget').val();
  var date_start = $('#datetimepicker1').val();
  var date_finish = $('#datetimepicker2').val();
  var tender_expired = $('#tender-expired').val();
  var username =  $('#signup-username').val();
  var phone1 = $('#phone1').val();
 // $tender_showphone = $('#tender-showphone').val();
 if($("#tender-showphone").is(":checked")){ 
  var tender_showphone = $('input[name="tender-showphone"]:checked').val();
 }else {
  var tender_showphone = 0;
 }
  var check =  $("input[name='optradio']:checked").val();
  var checkboxes = [];
 var tender_cat =  $('input[name="tender_category[]"]:checked').each(function(){
    //добавляем значение каждого флажка в этот массив
    checkboxes.push(this.value);
  });
  var text = CKEDITOR.instances['editor1'].getData();

  var radiobutton = $('input[name="contact"]:checked').val();
  
                //To save file with this name
  var file_data = $('#myFile').prop('files')[0];    //Fetch the file
  var form_data = new FormData();
 
  form_data.append("file",file_data);
  form_data.append("address", tender_address);
  form_data.append("city", tender_city);
  form_data.append("title_tender", tender_title);
  form_data.append("text", text);
  form_data.append("i", i);
  form_data.append("i1", i1);
  form_data.append("i2", i2);
  form_data.append("i3", i3);
  form_data.append("price", price);
  form_data.append("date_start", date_start);
  form_data.append("date_finish", date_finish);
  form_data.append("tender_expired", tender_expired);
  form_data.append("username", username);
  form_data.append("phone", phone1);
  form_data.append("showphone", tender_showphone);
  form_data.append("whois", check);
  form_data.append("we_need", radiobutton);
  form_data.append("tender_id", tender_id);

  for (var j = 0; j < checkboxes.length; j++) {
    form_data.append("checkboxes[]", checkboxes[j]);
}


if(tender_address != '' && tender_city != '' && text != '' && tender_title != '' && price != '' && date_start != '' && date_finish != '' && tender_expired != '' && username != '' && phone1 != ''  && check != '' && radiobutton != '')
{
  $.ajax({
    url: "server_tender.php",                      //Server api to receive the file
           type: "POST",
           dataType: 'script',
           cache: false,
           contentType: false,
           processData: false,
           data: form_data,
        success:function(dat2){
          if(dat2==1) { alert("Ваш тендер появится на сайте, после одобрение модератором в течении 24 часов!");
           setTimeout(function(){
           window.location = 'index.php';
          }, 1000) }
          else { alert("Для добавления тендера нужна авторизация");
          window.reload();
        }
        }
  });
}else {
  alert('Заполните все поле!');
  window.reload();
}

})