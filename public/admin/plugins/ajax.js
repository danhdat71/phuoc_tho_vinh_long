let configError = {
    position: 'top',
    title: ``,
    padding: '0',
    background: 'red',
    padding: '0',
    backdrop: '#ffffff00',
    color: '#fff',
    timer: 3000,
    showConfirmButton: false,
}

const headers = {
    'X-CSRF-TOKEN': csrfToken
}

$('#slider-input').change(function() {
    let formData = new FormData($('#wrap-box-file')[0]);
    $.ajax({
        headers: headers,
        xhr: function() {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function(evt) {
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('.loading').css({
                        'width': percentComplete + "%"
                    });
                }
            }, false);

            return xhr;
        },
        url: 'slider',
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        type: 'post',
        success: function(res) {
            console.log(res);
            let html = ``;
            if (res.status == false) {
                res.messages.background.forEach(element => {
                    html += `<h5 style='color:white;'>" ${element} "</h5>`;
                    configError.html = html
                });
                Swal.fire(configError);
            } else {
                location.reload();
            }
        }
    });
});

//Ẩn hiện slider
$('.active-slider').change(function(){
    let status = $(this).prop('checked');
    let id = $(this).attr('data-id');
    $.ajax({
        headers: headers,
        type: "post",
        url: "slider/status",
        data: {
            'id' : id,
            'status' : status == true ? 1 : 0
        },
        dataType: "json",
        success: function (response) {
            if(response){
                console.log("Cập nhật thành công !");
            }
        }
    });
});

//Update content title
$('.content-title').change(function(){
    let title = $(this).val();
    let id = $(this).attr('data-id');
    $.ajax({
        headers: headers,
        type: "post",
        url: "content/title/update",
        data: {
            'title' : title,
            'id' : id
        },
        dataType: "json",
        success: function (response) {
            if(response) console.log("Cập nhật thành công !");
        }
    });
});
//Update status
$('.content-status').change(function(){
    let status = $(this).prop('checked');
    let id = $(this).attr('data-id');
    $.ajax({
        headers: headers,
        type: "post",
        url: "content/status/update",
        data: {
            'status' : status == true ? 1 : 0,
            'id' : id
        },
        dataType: "json",
        success: function (response) {
            if(response) console.log("Cập nhật thành công !");
        }
    });
});
//Update main content
$('.main-content').change(function(){
    let content = CKEDITOR.instances[$(this).attr('name')].getData();
    console.log(content);

    let id = $(this).attr('data-id');
    $.ajax({
        headers: headers,
        type: "post",
        url: "content/status/update",
        data: {
            'status' : status == true ? 1 : 0,
            'id' : id
        },
        dataType: "json",
        success: function (response) {
            if(response) console.log("Cập nhật thành công !");
        }
    });
});

//Update main content
CKEDITOR.on("instanceCreated", function(event) {
    event.editor.on("change", function () {
        let newContent = CKEDITOR.instances[this.name].getData();
        let id = $(`#${this.name}`).attr('data-id');

        $.ajax({
            headers: headers,
            type: "post",
            url: "content/main-content/update",
            data: {
                id : id,
                content : newContent
            },
            dataType: "json",
            success: function (response) {
                if(response) console.log("Ok!");
            }
        });
    });
});
//Udpate image content
$('.content-image').change(function() {
    let _this = $(this);
    let formData = new FormData();
    formData.append('image', $(this)[0].files[0]);
    formData.append('id', $(this).attr('data-id'));
    $.ajax({
        headers: headers,
        url: 'content/image/update',
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        type: 'post',
        success: function(res) {
            console.log(res);
            if(res){
                _this.closest('.col-12').find('img').attr('src', res.messages);
            };
        }
    });
});

//Get chi tiết util
$('.edit-util').click(function(){
    let _this = $(this);
    $.ajax({
        headers: headers,
        type: "get",
        url: `util/${_this.attr('data-id')}/get`,
        dataType: "json",
        success: function (res) {
            console.log(res);
            if(res.status == true){
                $('#id').val(res.messages.id);
                $('#name').val(res.messages.name);
                $('#status').val(res.messages.status);
                $('#number').val(res.messages.number);
                $('#util-image').attr('src', res.messages.thumb_img);
            }else{
                alert(res.messages);
            }
        }
    });
});

$('.util-status').change(function(){
    let status = $(this).prop('checked');
    let id = $(this).attr('data-id');
    $.ajax({
        headers: headers,
        type: "post",
        url: "util/status/update",
        data: {
            'status' : status == true ? 1 : 0,
            'id' : id
        },
        dataType: "json",
        success: function (response) {
            if(response) console.log("Cập nhật thành công !");
        }
    });
});